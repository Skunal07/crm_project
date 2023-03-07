<?php

declare(strict_types=1);

namespace App\Controller;


class CategoriesController extends AppController
{
   
    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users.UserProfile'],
        ];
        $categories = $this->paginate($this->Categories->find('all')->where(['Categories.delete_status' => 0]));

        $this->set(compact('categories'));
    }

    //-----------------------------------------Add Category--------------------------------------//

    public function addcategory()
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            $category->user_id = $uid;
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
            'contain' => ['Users.UserProfile']
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
