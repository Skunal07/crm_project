<?php
declare(strict_types=1);

namespace App\Controller;


class LeadsController extends AppController
{ 
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
     public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout("dashboard");
        $this->loadModel('LeadContacts');
        $this->loadModel('Companies');

    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Users','LeadContacts'],
        ];
        $leads = $this->paginate($this->Leads);
        // pr($leads->lead_contacts);
        // die;
        $this->set(compact('leads'));
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
        $uid=$user->id;
        $lead = $this->Leads->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $lead = $this->Leads->patchEntity($lead, $this->request->getData());
            // pr($lead);
            // die;
            $lead->user_id=$uid;
            if ($this->Leads->save($lead)) {
                $this->Flash->success(__('The Lead has been saved.'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "Lead has been created"
                ));
                die;
            }

            $this->Flash->error(__('Failed to save Lead'));

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
           'contain' => ['LeadContacts']
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
            }else{
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
  
}
