<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * LeadContacts Controller
 *
 * @property \App\Model\Table\LeadContactsTable $LeadContacts
 * @method \App\Model\Entity\LeadContact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeadContactsController extends AppController
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
        $this->loadModel('UserProfile');
        $this->loadModel('Users');
        $contactus=$this->ContactUs->find('all')->where(['notification'=>2 ,'delete_status'=> 0]);
        $i=0;
        foreach($contactus as $a){
            $i++;
        }
        $count=$i;
        $result = $this->Authentication->getIdentity();
        $uid=$result->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);
        $this->set(compact('contactus', 'count','user'));
       
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Leads'],
        ];
        $leadContacts = $this->paginate($this->LeadContacts);

        $this->set(compact('leadContacts'));
    }

    /**
     * View method
     *
     * @param string|null $id Lead Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leadContact = $this->LeadContacts->get($id, [
            'contain' => ['Leads'],
        ]);

        $this->set(compact('leadContact'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leadContact = $this->LeadContacts->newEmptyEntity();
        if ($this->request->is('post')) {
            $leadContact = $this->LeadContacts->patchEntity($leadContact, $this->request->getData());
            if ($this->LeadContacts->save($leadContact)) {
                $this->Flash->success(__('The lead contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead contact could not be saved. Please, try again.'));
        }
        $leads = $this->LeadContacts->Leads->find('list', ['limit' => 200])->all();
        $this->set(compact('leadContact', 'leads'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lead Contact id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leadContact = $this->LeadContacts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leadContact = $this->LeadContacts->patchEntity($leadContact, $this->request->getData());
            if ($this->LeadContacts->save($leadContact)) {
                $this->Flash->success(__('The lead contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lead contact could not be saved. Please, try again.'));
        }
        $leads = $this->LeadContacts->Leads->find('list', ['limit' => 200])->all();
        $this->set(compact('leadContact', 'leads'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lead Contact id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leadContact = $this->LeadContacts->get($id);
        if ($this->LeadContacts->delete($leadContact)) {
            $this->Flash->success(__('The lead contact has been deleted.'));
        } else {
            $this->Flash->error(__('The lead contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
