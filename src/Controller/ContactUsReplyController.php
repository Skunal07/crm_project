<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ContactUsReply Controller
 *
 * @property \App\Model\Table\ContactUsReplyTable $ContactUsReply
 * @method \App\Model\Entity\ContactUsReply[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactUsReplyController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        $this->loadComponent('Authentication.Authentication');

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadModel('ContactUs');
        $contactus=$this->ContactUs->find('all')->where(['notification'=>2 ,'delete_status'=> 0]);
        $i=0;
        foreach($contactus as $a){
            $i++;
        }
        $count=$i;
        $this->set(compact('contactus','count'));
       
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $contactUsReply = $this->paginate($this->ContactUsReply);

        $this->set(compact('contactUsReply'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact Us Reply id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactUsReply = $this->ContactUsReply->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('contactUsReply'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactUsReply = $this->ContactUsReply->newEmptyEntity();
        if ($this->request->is('post')) {
            $contactUsReply = $this->ContactUsReply->patchEntity($contactUsReply, $this->request->getData());
            if ($this->ContactUsReply->save($contactUsReply)) {
                $this->Flash->success(__('The contact us reply has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact us reply could not be saved. Please, try again.'));
        }
        $users = $this->ContactUsReply->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('contactUsReply', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Us Reply id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactUsReply = $this->ContactUsReply->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactUsReply = $this->ContactUsReply->patchEntity($contactUsReply, $this->request->getData());
            if ($this->ContactUsReply->save($contactUsReply)) {
                $this->Flash->success(__('The contact us reply has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact us reply could not be saved. Please, try again.'));
        }
        $users = $this->ContactUsReply->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('contactUsReply', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Us Reply id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactUsReply = $this->ContactUsReply->get($id);
        if ($this->ContactUsReply->delete($contactUsReply)) {
            $this->Flash->success(__('The contact us reply has been deleted.'));
        } else {
            $this->Flash->error(__('The contact us reply could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
