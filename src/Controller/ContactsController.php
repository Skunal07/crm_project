<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

     public function beforeFilter($event)
     {
         parent::beforeFilter($event);
         $this->viewBuilder()->setLayout("dashboard");
         $this->loadModel('Companies');
         
            }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies', 'Users.UserProfile'],
        ];
        $contacts = $this->paginate($this->Contacts);
        $companies = $this->Companies->find('all');


        $this->set(compact('contacts','companies'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => ['Companies', 'Users'],
        ]);

        $this->set(compact('contact'));
    }

    
    // public function add()
    // {
    //     $contact = $this->Contacts->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
    //         if ($this->Contacts->save($contact)) {
    //             $this->Flash->success(__('The contact has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The contact could not be saved. Please, try again.'));
    //     }
    //     $companies = $this->Contacts->Companies->find('list', ['limit' => 200])->all();
    //     $users = $this->Contacts->Users->find('list', ['limit' => 200])->all();
    //     $this->set(compact('contact', 'companies', 'users'));
    // }

    public function addcontact()
    {
        $user = $this->Authentication->getIdentity();
        $uid=$user->id ;
        $contact = $this->Contacts->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            $contact->user_id=$uid;
            if ($this->Contacts->save($contact)) {


                $this->Flash->success(__('company has been created'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "company name has been created"
                ));
                die;
            }

            $this->Flash->error(__('Failed to save company name'));

            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to create"
            ));
            die;
        }
    }
 
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $companies = $this->Contacts->Companies->find('list', ['limit' => 200])->all();
        $users = $this->Contacts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('contact', 'companies', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
