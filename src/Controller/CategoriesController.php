<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
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
        $this->loadModel('UserProfile');
        $this->loadModel('Users');        
        $this->loadModel('ContactUs');
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
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users.UserProfile'],
        ];
        $categories = $this->paginate($this->Categories->find('all')->where(['Categories.status' => 0]));

        $this->set(compact('categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Users', 'Products'],
        ]);

        $this->set(compact('category'));
    }

    //-----------------------------------------Add Category--------------------------------------//

    public function addcategory()
    {
        $user = $this->Authentication->getIdentity();
        $uid=$user->id ;
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            $category->user_id=$uid;
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "category name has been created"
                ));
                die;
            }

            $this->Flash->error(__('Failed to save category name'));

            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to create"
            ));
            die;
        }
    }

   
    //-----------------------------------------DeleteStatus--------------------------------------//

    public function deleteStatus($id = null, $delete_status = null)
    {
        if ($this->request->is('ajax')) {
            $user = $this->Categories->get($id);
            if ($delete_status == 1)
                $user->delete_status = 0;
            else
                $user->delete_status = 1;

            if ($this->Categories->save($user)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The Category has been deleted."
                ));
                exit;
            } else {
                echo json_encode(array(
                    "status" => 0,
                    "message" => "The category could not be deleted. Please, try again."
                ));
                exit;
            }
        }
    }
    //--------------------------------------Modal Fetch Lead Detail During Edit----------------------------------//

    public function editCategories($id = null)
    {
        // $this->Model = $this->loadModel('UserProfile');
        $id = $_GET['id'];
        $categories = $this->Categories->get($id, [
            'contain' => []
        ]);
        echo json_encode($categories);
        exit;
    }


    //--------------------------------------After Fetch Edit----------------------------------//
    

    public function editCategory($id = null)
    {
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $id = $this->request->getData('catiddd');
            // dd($id);
            $categories = $this->Categories->get($id, [
                'contain' => [],
            ]);

            $categories = $this->Categories->patchEntity($categories, $data);
            if ($this->Categories->save($categories)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "Categories has been saved.",
                ));
                exit;

                // return $this->redirect(['action' => 'index']);
            } else {
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Category could not be saved. Please, try again.",
                ));
                exit;
            }
        }
    }

    
}
