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
// use Cake\View\View;


class UsersController extends AppController
{

    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout("dashboard");
        $this->loadModel('UserProfile');
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function index()
    {
        $this->viewBuilder()->setLayout("home");
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function dashboard()
    {
    }

    //-----------------------------Admin----Index--------------------------//

    public function usersList()
    {
            $result = $this->Authentication->getIdentity();
            // pr($result);
            // die;
            if ($result->role == '1') {
        $users = $this->paginate($this->Users, [
            'contain' => ['UserProfile']
        ]);
        $status=$this->request->getQuery('status');
        if($status == null){
          
             $users=$this->Users->find('all')->contain(['UserProfile']);
        }else{
            $users=$this->Users->find('all')->contain(['UserProfile'])->where(['status'=>$status]);
        }
        // $this->autoRender=false;
        // $this->layout=false;
        $this->set(compact('users'));
        if($this->request->is('ajax')){
            $this->viewBuilder()->setLayout(null);
            echo $this->render('/element/user_index');
            exit;
        }
      
        $this->set(compact('users'));
}
else{  
    return $this->redirect(['controller'=>'Users','action'=>'dashboard']);
   
       
//        //----------------------------------------------Add--------------------------------------------//

//        public function add()
//        {
//            $this->viewBuilder()->setLayout("home");
   
   
//                $user = $this->Users->newEmptyEntity();
//                if ($this->request->is('post')) {
//                    $user = $this->Users->patchEntity($user, $this->request->getData());
//                      // pr($user);
//                      // die;
//                    if ($this->Users->save($user)) {
//                        echo json_encode(array(
//                            "status" => 1,
//                            "message" => "The User has been saved.",));
//                    }else{
//                        echo json_encode(array(
//                            "status" => 0,
//                            "message" => "The User  could not be saved. Please, try again.",
//                        ));
//                }
//            }
   
//                $this->set(compact('user'));
           
   
    
// }

//     }
}
}

    //----------------------------------------------Add--------------------------------------------//

    public function staffAdd()
    {
        $this->viewBuilder()->setLayout("home");

dd('ghbhvb');
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('ajax')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                  // pr($user);
                  // die;
                if ($this->Users->save($user)) {
                    // $this->Flash->success(__('The user has been saved.'));
                    echo json_encode(array(
                        "status" => 1,
                        "message" => "The User has been saved.",
                    ));
                    exit;
                }else{
                    echo json_encode(array(
                        "status" => 0,
                        "message" => "The User  could not be saved. Please, try again.",
                    ));
                    exit;
            }
        }

            // $this->set(compact('user'));
        

    }
     //----------------------------------------------Login--------------------------------------------//

     public function login(){
        $this->viewBuilder()->setLayout("home");
        
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {
            $email = $this->request->getData('email');
            $users = TableRegistry::get("Users");
            $data = $users->find('all')->contain('UserProfile')->where(['email' => $email])->first();

            $session = $this->getRequest()->getSession();
            $session->write('users_details', $data);
            $result = $this->Authentication->getIdentity();
            if ($result['status']=='1') {
                $this->Flash->error(__('Your Account Deactivate Please Contact Us Customer Care'));
                $redirect = $this->request->getQuery('redirect',['controller' => 'users','action' => 'logout',]);


            }
            else{
                if ($result->role == '1') {
                $redirect = $this->request->getQuery('redirect', ['action' => 'dashboard',]);
                }else{
                 $redirect = $this->request->getQuery('redirect', ['controller' => 'products','action' => 'producthome',]);

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
                return $this->redirect(['action' => 'login']);
            }
            }

    // public function index()
    // {
    //     $users = $this->paginate($this->Users);

    //     $this->set(compact('users'));
    // }


    // public function view($id = null)
    // {
    //     $user = $this->Users->get($id, [
    //         'contain' => ['Users', 'Categories', 'Companies', 'ContactUsReply', 'Contacts', 'Leads', 'Products', 'UserProfile'],
    //     ]);

    //     $this->set(compact('user'));
    // }




    // public function edit($id = null)
    // {
    //     $user = $this->Users->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $user = $this->Users->patchEntity($user, $this->request->getData());
    //         if ($this->Users->save($user)) {
    //             $this->Flash->success(__('The user has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('user'));
    // }


    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $user = $this->Users->get($id);
    //     if ($this->Users->delete($user)) {
    //         $this->Flash->success(__('The user has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
