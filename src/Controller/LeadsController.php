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
                $leads = $this->Leads->find('all')->contain(['Users.UserProfile', 'LeadContacts']);
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
        $_header = ['ID', 'Name',  'Price', 'Worked Title', 'Contact'];
        $_extract = ['id', 'name', 'price', 'work_title', 'lead_contact.contact'];
        
        $this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set(compact('data', '_serialize', '_header', '_extract'));
    }
    public function sampleCsv()
    {
        $this->setResponse($this->getResponse()->withDownload('format.csv'));
        // $data = [];
        $data = [['ID', 'Name', 'Price', 'Worked Title', 'Contact']];
    
        $this->set(compact('data'));
        $this->viewBuilder()
            ->setClassName('CsvView.Csv')
            ->setOptions([
                'serialize' => 'data',             
            ]);
    }



    public function import()
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        // dd($uid);
        if ($this->request->is('post')) {
            $tmpFileName = $_FILES['importcsv']['tmp_name'];
            $data = [];
            $counter = 0;
            if (($handle = fopen($tmpFileName, "r")) !== FALSE) {
                // $headers = fgetcsv($handle);
                while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $counter++;
                    if($counter == 1){
                        continue;
                    }
                    $data[] = [

                        'name' => $row[1],
                        'user_id'=>$uid,
                        'price' => $row[2],
                        'work_title' => $row[3],
                        'lead_contact' => ['contact' => $row[4]],
                    ];
                }   
                $counter--;
                fclose($handle);
            }
            // dd($data);
            $lead = $this->Leads->newEntities($data);
            // dd($lead->user_id);
            // foreach ($data as $val){
            // $lead = $this->Leads->patchEntities($lead, $data);
            if ($this->Leads->saveMany($lead)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "$counter Leads has been save.",
                    "count" => $counter,
                ));
                exit;
            }else{
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Lead has not been save."
                ));
                exit;
            }
            
            
        }
    }
}
