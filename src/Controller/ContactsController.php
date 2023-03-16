<?php

declare(strict_types=1);

namespace App\Controller;


class ContactsController extends AppController
{

    public function index()
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $this->paginate = [
            'contain' => ['Companies', 'Users.UserProfile'],

        ];
        if ($user->role == 1) {
            $contacts = $this->paginate($this->Contacts);
            $companies = $this->Companies->find('all');
        } else {
            $contacts = $this->Contacts->find('all')->contain(['Companies', 'Users.UserProfile'])->where(['Contacts.user_id' => $uid])->order(['Contacts.id' => 'DESC']);
            $companies = $this->Companies->find('all');
        }



        $this->set(compact('contacts', 'companies'));
    }


    public function view($id = null)
    {

        $contact = $this->Contacts->get($id, [
            'contain' => ['Companies', 'Users'],
        ]);

        $this->set(compact('contact'));
    }


    //--------------------------------------Modal Fetch User Detail During Edit----------------------------------//

    public function editContact($id = null)
    {
        // $this->Model = $this->loadModel('UserProfile');
        $id = $_GET['id'];
        $user = $this->Contacts->get($id, [
            'contain' => ['Companies', 'Users.UserProfile']
        ]);
        echo json_encode($user);
        exit;
    }


    //---------------------------------------------Modal Edit Details-------------------------------------------//

    public function contactEdit($id = null)
    {
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $id = $this->request->getData('contiddd');
            // dd($id);
            $contact = $this->Contacts->get($id, [
                'contain' => [],
            ]);

            $contact = $this->Contacts->patchEntity($contact, $data);
            if ($this->Contacts->save($contact)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "Contact has been saved.",
                ));
                exit;

                // return $this->redirect(['action' => 'index']);
            } else {
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Contact  could not be saved. Please, try again.",
                ));
                exit;
            }
        }
    }

    //---------------------------------------------Add Modal Using Ajax----------------------------------------//

    public function addcontact()
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $contact = $this->Contacts->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            $contact->user_id = $uid;
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

    //-----------------------------------------DeleteStatus--------------------------------------//

    public function deleteContact($id = null, $delete_status = null)
    {
        if ($this->request->is('ajax')) {
            $user = $this->Contacts->get($id);
            if ($user->delete_status == 1)
                $user->delete_status = 0;
            else
                $user->delete_status = 1;

            if ($this->Contacts->save($user)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The Contact has been deleted."
                ));
                exit;
            } else {
                echo json_encode(array(
                    "status" => 0,
                    "message" => "The Contact could not be deleted. Please, try again."
                ));
                exit;
            }
        }
    }
}
