<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 * @method \App\Model\Entity\Company[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController
{
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout("dashboard");
        $this->loadModel('UserProfile');
        

    }

  //--------------------------------------Company List----------------------------------//
  public function index()
    {
        $this->paginate = [
            'contain' => ['Users.UserProfile'],
        ];
        $companies = $this->paginate($this->Companies);
        // echo '<pre>';print_r($companies);die;
        $this->set(compact('companies'));
    }

 

  //--------------------------------------Add Company Using Ajax----------------------------------//

  public function addcompany()
    {
        $user = $this->Authentication->getIdentity();
        $uid=$user->id ;
        $company = $this->Companies->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            $company->user_id=$uid;
            if ($this->Companies->save($company)) {


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

  //--------------------------------------Modal Fetch Company Detail During Edit----------------------------------//

  public function editCompany($id = null)
  {
      // $this->Model = $this->loadModel('UserProfile');
      $id = $_GET['id'];
      $company = $this->Companies->get($id, [
          'contain' => []
      ]);
      echo json_encode($company);
      exit;
  }

   //--------------------------------------Edit Company Modal----------------------------------//

   public function companyEdit($id = null)
   {
       if ($this->request->is('ajax')) {
           $data = $this->request->getData();
           $id = $this->request->getData('companyiddd');
           // dd($data);
           $company = $this->Companies->get($id, [
               'contain' => [],
           ]);
           $company = $this->Companies->patchEntity($company, $this->request->getData());
           if ($this->Companies->save($company)) {
              
                   echo json_encode(array(
                       "status" => 1,
                       "message" => "The Comapny has been saved.",
                   ));
                   exit;
           }else{
           echo json_encode(array(
               "status" => 0,
               "message" => "The  Comapny not be saved. Please, try again.",
           ));
           exit;
       }
       }
   }
  
//-----------------------------------------DeleteStatus--------------------------------------//

public function deleteCompany($id = null, $delete_status = null)
{
    if ($this->request->is('ajax')) {
        $user = $this->Companies->get($id);
        if ($delete_status == 1)
            $user->delete_status = 0;
        else
            $user->delete_status = 1;

        if ($this->Companies->save($user)) {
            echo json_encode(array(
                "status" => 1,
                "message" => "The Company has been deleted."
            ));
            exit;
        } else {
            echo json_encode(array(
                "status" => 0,
                "message" => "The Company could not be deleted. Please, try again."
            ));
            exit;
        }
    }
}
}
