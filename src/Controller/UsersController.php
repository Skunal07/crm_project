<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Utility\Security;
use App\Controller\View;


class UsersController extends AppController
{

    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout("dashboard");
        $this->loadModel('UserProfile');
        $this->loadModel('Products');
        $this->loadModel('ContactUs');
        $this->loadModel('Categories');
        $this->loadModel('Leads');

        $this->Authentication->addUnauthenticatedActions(['login', 'index']);
    }

    public function index($id = null)
    {
        $this->viewBuilder()->setLayout("home");

        $contactU = $this->ContactUs->newEmptyEntity();
        if ($this->request->is('post')) {
            $contactU = $this->ContactUs->patchEntity($contactU, $this->request->getData());
            $email=$contactU->email;
            $name=$contactU->name;
            if ($this->ContactUs->save($contactU)) {
                $mailer = new Mailer('default');
                $mailer->setTransport('gmail'); //your email configuration name
                $mailer->setFrom(['kunal02chd@gmail.com' => 'Code The Pixel']);
                $mailer->setTo($email);
                $mailer->setEmailFormat('html');
                $mailer->setSubject('Team DoorDekho.com');
                $mailer->deliver("<h3>Thanks Mr/Mrs $name for Contact Us.</h3>
                <p>Your Message has been Submitted Successfully.</p>
                <p>Our Team Contact you Soon.</p><p>For New Update please  <a href='http://localhost:8765/users'>click here</a>.</p>
                ");
                $this->Flash->success(__('The contact u has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact u could not be saved. Please, try again.'));
        }
        $productc=$this->Categories->find('all')->where(['status'=>0]);
        if($id != null){
            $products=$this->Products->find('all')->contain('Categories')->where(['Products.status'=>0 ,'delete_status'=> 0,'category_id'=>$id]);
        }else{
            $products=$this->Products->find('all')->contain('Categories')->where(['Products.status'=>0 ,'delete_status'=> 0]);
        }
        $this->set(compact('products','productc','id','contactU'));

    }

    public function dashboard()
    {
        $contactus=$this->ContactUs->find('all')->where(['notification'=>2 ,'delete_status'=> 0]);
        $totalcontact=$this->ContactUs->find('all')->where(['delete_status'=> 0]);
        $totalwon=$this->Leads->find('all')->where(['stages'=>4,'delete_status'=> 0]);
        $totallost=$this->Leads->find('all')->where(['stages'=>0,'delete_status'=> 0]);
        $totallead=$this->Leads->find('all')->where(['delete_status'=> 0]);
        $i=0;
        foreach($contactus as $a){
            $i++;
        }
        $count=$i;
        $this->set(compact('contactus','count','totalcontact','totallead','totalwon','totallost'));
    }

    //-----------------------------Admin----Index--------------------------//

    public function notification($id = null)
    {

        if ($this->request->is('ajax')) {
            $contactus=$this->ContactUs->find('all')->where(['delete_status'=>'0','id'=>$id])->first();
            $contactus->notification=1;
            if ($this->ContactUs->save($contactus)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The User has been saved.",
                ));
                exit;
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The User  could not be saved. Please, try again.",
            ));
            exit;
            
    }
}
    public function usersList()
    {

        $result = $this->Authentication->getIdentity();
        // pr($result);
        // die;
        if ($result->role == '1') {
            $users = $this->paginate($this->Users->find('all')->contain(['UserProfile'])->where(['role' => 0, 'status' => 0, 'delete_status' => 0]));

            $this->set(compact('users'));
        } else {
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
        }
    }

    //----------------------------------------------Admin---Add---Staff--------------------------------------------//

    public function staffAdd()
    {
        $result = $this->Authentication->getIdentity();
        // pr($result);
        $uid = $result->id;
        // die;
        $this->viewBuilder()->setLayout("home");

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->added_by = $uid;
            $user->users_id = $uid;
            if ($this->Users->save($user)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "staff has been created"
                ));
                die;
            } else {
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Failed to create"
                ));
                die;
            }
        }
    }
    //----------------------------------------------Login--------------------------------------------//

    public function login()
    {
        $this->viewBuilder()->setLayout("login");

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            $email = $this->request->getData('email');
            $users = TableRegistry::get("Users");
            $data = $users->find('all')->contain('UserProfile')->where(['email' => $email])->first();

            $session = $this->getRequest()->getSession();
            $session->write('users_details', $data);
            $result = $this->Authentication->getIdentity();
            if ($result['status'] == '1') {
                $this->Flash->error(__('Your Account Deactivate Please Contact Us Customer Care'));
                $redirect = $this->request->getQuery('redirect', ['controller' => 'users', 'action' => 'logout',]);
            } else {
                if ($result->role == '1') {
                    $redirect = $this->request->getQuery('redirect', ['action' => 'dashboard',]);
                } else {
                    $redirect = $this->request->getQuery('redirect', ['controller' => 'products', 'action' => 'producthome',]);
                }
            }

            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }


    //----------------------------------------------Logout--------------------------------------------//
    
    public function logout()
    {
        $this->viewBuilder()->setLayout("home");
        
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            
            $this->Authentication->logout();
            $session = $this->request->getSession();
            $session->destroy();
            return $this->redirect(['action' => 'index']);
        }
    }
  
    //----------------------------------------------view product-------------------------------------------//

    public function viewProduct($id = null)
    {
        $this->viewBuilder()->setLayout("home");
        $product = $this->Products->get($id, [
            'contain' => ['Users', 'Categories'],
        ]);
        // $totalbuyer=$this->ContactUs->find('all')->where(['Products.status'=>0 ,'delete_status'=> 0,'category_id'=>$id]);

        $this->set(compact('product'));
    }






    //-----------------------------------------DeleteStatus--------------------------------------//

    public function deletestatus($id = null, $delete_status = null)
    {
        if ($this->request->is('ajax')) {
            $user = $this->Users->get($id);
            if ($delete_status == 1)
                $user->delete_status = 0;
            else
                $user->delete_status = 1;

            if ($this->Users->save($user)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The Users has been deleted."
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



    //--------------------------------------Modal Fetch User Detail During Edit----------------------------------//

    public function updateProfile($id = null)
    {
        // $this->Model = $this->loadModel('UserProfile');
        $id = $_GET['id'];
        $user = $this->Users->get($id, [
            'contain' => ['UserProfile']
        ]);
        echo json_encode($user);
        exit;
    }
    //---------------------------------------------Modal Edit Details-------------------------------------------//

    public function editProfile($id = null)
    {
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $id = $this->request->getData('iddd');
            // dd($id);
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);

            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The User has been saved.",
                ));
                exit;

                // return $this->redirect(['action' => 'index']);
            } else {
                echo json_encode(array(
                    "status" => 0,
                    "message" => "The User  could not be saved. Please, try again.",
                ));
                exit;
            }
            $this->set(compact('user'));
        }
    }

    //---------------------------------------------Profile Edit Details-------------------------------------------//

    public function profileEdit($id = null)
    {
        $result = $this->Authentication->getIdentity();
        $uid = $result->id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $fileName2 = $this->request->getData("imageddd");
            $user = $this->Users->get($uid, [
                'contain' => ['UserProfile'],
            ]);
            $productImage = $this->request->getData('user_profile.profile_image');
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $fileSize = $productImage->getSize();
            $data['user_profile']["profile_image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            // print_r($user);
            // die;
            // pr($user);
            // die;
            if ($this->Users->save($user)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    $data['user_profile']["profile_image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "upload/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data['user_profile']["profile_image"] = $fileName;
                    }
                }
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The User has been saved.",
                ));
                exit;
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The User  could not be saved. Please, try again.",
            ));
            exit;
        }
        $users = $this->Users->UserProfile->find('list', ['limit' => 200])->all()->toArray();
        $this->set(compact('user', 'users'));
    }


    //--------------------------------------Loged-In-User-View-Profile----------------------------------//

    public function userProfile($id = null)
    {
        // $this->viewBuilder()->setLayout(null);

        $user = $this->Authentication->getResult();

        if ($user && $user->isValid()) {

            $user = $this->Authentication->getIdentity();
            $id = $user->id;
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);
            $users = $this->request->getData();

            $users['id'] = $id;
            // pr($id);
            // die;


            $this->set(compact('user'));
        } 
    }
}
