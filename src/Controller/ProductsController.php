<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
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
        $this->loadModel('ContactUs');
        $contactus=$this->ContactUs->find('all')->where(['notification'=>2 ,'delete_status'=> 0]);
        $i=0;
        foreach($contactus as $a){
            $i++;
        }
        $count=$i;
        $this->set(compact('contactus','count'));
       
    }
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout("dashboard");
        $this->loadModel('Categories');

        $this->loadModel('Users');
        $this->loadModel('UserProfile');

    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users.UserProfile', 'Categories'],
        ];
        $products = $this->paginate($this->Products);

        $categories = $this->Categories->find('all')->where(['status' => 0]);

        $this->set(compact('products', 'categories'));

    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Users', 'Categories'],
        ]);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addproduct()
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        // $product = $this->Products->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $data = $this->request->getData();
        //     $productImage = $this->request->getData('product_image');
        //     $fileName = $productImage->getClientFilename();

        //     $fileSize = $productImage->getSize();
        //     $data["product_image"] = $fileName;
        //     $data["user_id"] = $uid;
        //     $product = $this->Products->patchEntity($product, $data);
        //     $response = $this->Products->save($product);
        //     dd($response);
        //     if ($this->Products->save($product)) {
        //         $hasFileError = $productImage->getError();

        //         if ($hasFileError > 0) {
        //             $data["product_image"] = "";
        //         } else {
        //             $fileType = $productImage->getClientMediaType();

        //             if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
        //                 $imagePath = WWW_ROOT . "img/" . $fileName;
        //                 $productImage->moveTo($imagePath);
        //                 $data["product_image"] = $fileName;
        //             }
        //         }
        //         echo json_encode(array(
        //             "status" => 1,
        //             "message" => "The User has been saved.",
        //         ));
        //         exit;
        //     }
        //     echo json_encode(array(
        //         "status" => 0,
        //         "message" => "The User  could not be saved. Please, try again.",
        //     ));
        //     exit;
        // }
        // $this->set(compact('user'));

        $addproduct = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $picture = $this->request->getData('product_image');
            $filename = $picture->getClientFilename();
            $data['product_image'] = $filename;
            $addproduct = $this->Products->patchEntity($addproduct, $data);
            // dd($addproduct);
            $addproduct['user_id'] = $uid;
            if ($this->Products->save($addproduct)) {
                $hasfileerror = $picture->getError();
                if ($hasfileerror > 0) {
                    $data['product_image'] = '';
                } else {
                    $filetype = $picture->getClientMediaType();
                    if ($filetype == 'image/png' || $filetype == 'image/jpeg' || $filetype == 'image/jpg') {
                        $imagepath = WWW_ROOT . 'img/' . $filename;
                        $picture->moveTo($imagepath);
                        $data['product_image'] = $filename;
                    }
                }
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The Product has been saved.",
                ));
                exit;
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The Product  could not be saved. Please, try again.",
            ));
            exit;
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $users = $this->Products->Users->find('list', ['limit' => 200])->all();
        $categories = $this->Products->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'users', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
