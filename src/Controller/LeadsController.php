<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class LeadsController extends AppController

{


    public function index($id = null)
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $this->paginate = [
            'contain' => ['Users.UserProfile', 'LeadContacts'],
        ];
        // $id = $this->request->getQuery('user_id');
        if ($user->role == 1) {
            if ($id != null) {

                $leads = $this->Leads->find('all')->contain(['Users.UserProfile', 'LeadContacts'])->where(['stages' => $id]);

                // dd($leads);
            } else {
                $leads = $this->paginate($this->Leads);
            }
        } else {
            if ($id != null) {

                $leads = $this->Leads->find('all')->contain(['Users.UserProfile', 'LeadContacts'])->where(['stages' => $id, 'Leads.user_id' => $uid]);

                // dd($leads);
            } else {
                $leads = $this->Leads->find('all')->contain(['Users.UserProfile', 'LeadContacts'])->where(['Leads.user_id' => $uid]);
            }
        }

        $this->set(compact('leads'));
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            //$this->layout = false;
            $this->viewBuilder()->setLayout(null);
            $this->render('/element/flash/lead');
        }
    }


    public function view($id = null)
    {
        $lead = $this->Leads->get($id, [
            'contain' => ['Users', 'LeadContacts'],
        ]);

        $this->set(compact('lead'));
    }

    //------------------------------------------------------Add Lead-------------------------------------------------------//

    public function addLead()
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $lead = $this->Leads->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $lead = $this->Leads->patchEntity($lead, $this->request->getData());
            // pr($lead);
            // die;
            $lead->user_id = $uid;
            if ($this->Leads->save($lead)) {

                $this->Flash->success(__('The Lead has been saved.'));
                $this->autoRender = false;
                $this->viewBuilder()->setLayout(null);

                $this->render('/element/flash/lead');


                echo json_encode(array(
                    "status" => 1,
                    "message" => "Lead has been created"
                ));
                die;
            }

            // $this->Flash->error(__('Failed to save Lead'));

            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to create Lead"
            ));
            die;
        }
    }

    //--------------------------------------Modal Fetch Lead Detail During Edit----------------------------------//

    public function editLead($id = null)
    {
        // $this->Model = $this->loadModel('UserProfile');
        $id = $_GET['id'];
        $lead = $this->Leads->get($id, [
            'contain' => ['LeadContacts', 'Users.UserProfile']
        ]);
        echo json_encode($lead);
        exit;
    }

    //--------------------------------------Edit Lead Modal----------------------------------//
    public function leadEdit($id = null)
    {
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $id = $this->request->getData('leadid');
            // dd($data);
            $lead = $this->Leads->get($id, [
                'contain' => ['LeadContacts'],
            ]);
            $lead = $this->Leads->patchEntity($lead, $this->request->getData());
            if ($this->Leads->save($lead)) {

                echo json_encode(array(
                    "status" => 1,
                    "message" => "The Lead has been saved.",
                ));
                exit;
            } else {
                echo json_encode(array(
                    "status" => 0,
                    "message" => "The Lead could not be saved. Please, try again.",
                ));
                exit;
            }
            $this->set(compact('lead'));
        }
    }


    //-----------------------------------------DeleteStatus--------------------------------------//

    public function deleteStatus($id = null, $delete_status = null)
    {
        if ($this->request->is('ajax')) {
            $user = $this->Leads->get($id);
            if ($delete_status == 1)
                $user->delete_status = 0;
            else
                $user->delete_status = 1;

            if ($this->Leads->save($user)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The Lead has been deleted."
                ));
                exit;
            } else {
                echo json_encode(array(
                    "status" => 0,
                    "message" => "The User could not be deleted. Please, try again."
                ));
                exit;
            }
        }
    }

    public function export()
    {
        $this->setResponse($this->getResponse()->withDownload('my-file.csv'));

        $data = $this->Leads->find('all')->contain(['LeadContacts'])->where(['delete_status' => 0]);
        $_serialize = 'data';
        $_header = ['ID', 'Name', 'Added by', 'Price', 'Worked Title', 'Contact'];
        $_extract = ['id', 'name', 'user_id', 'price', 'work_title', 'lead_contact.contact'];

        $this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set(compact('data', '_serialize', '_header', '_extract'));
    }



    public function import()
    {
        if ($this->request->is('ajax')) {
            // dd($_FILES);
            $tmpFileName = $_FILES['importcsv']['tmp_name'];
            $this->viewBuilder()->setClassName("Json");
            $row = 1;
            if (($handle = fopen($tmpFileName, "r")) !== FALSE) {
                while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $data = [
                        // 'id' => $row[0],
                        'name' => $row[1],
                        'user_id' => $row[2],
                        'price' => $row[3],
                        'work_title' => $row[4],
                        'lead_contact.contact' => $row[5],
                    ];

                    $lead = $this->Leads->newEntity($data);
                    // $data = ['lead_contact.lead_id' => 16];
                }
                // foreach($data as $d){

                // }
                dd($data);
                if ($this->Leads->save($lead)) {
                    echo json_encode(array(
                        "status" => 1,
                        "message" => "The Lead has been inserted."
                    ));
                    exit;
                }
                fclose($handle);
            }
            // dd($handle);
            // dd($csvFile);

            // $csv = array_map('str_getcsv', file($csvFile));
            // dd($csv);
            // foreach ($csv as $row) {
            //     $data = [
            //         // 'id' => $row[0],
            //         'user_id' => $row[1],
            //         'company_id' => $row[2],
            //         'name' => $row[3],
            //         'price' => $row[4],

            //     ];
            //     $this->Leads->newEntity($data);
            //     $this->Leads->save($this->Users->newEntity);
            // }
            // $this->Flash->success('CSV imported successfully.');
        }
    }
}
