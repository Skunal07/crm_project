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
    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users.UserProfile', 'Categories'],
        ];
        $products =$this->Products->find('all')->contain(['Users.UserProfile', 'Categories'])->order(["Products.id"=>"DESC"]);

        $categories = $this->Categories->find('all')->where(['delete_status' => 0]);

        $this->set(compact('products', 'categories'));
    }


    public function view($id = null)
    {
        $id = $_GET['id'];
        $product = $this->Products->get($id, [
            'contain' => ['Users.UserProfile', 'Categories'],
        ]);

        echo json_encode($product);
        exit;
        // $this->set(compact('product'));
    }


    public function addproduct()
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
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

    public function edit($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $fileName2 = $this->request->getData("imagedd");
            $id = $this->request->getData("iddd");
            // $userid = $this->request->getData("useridd");
            $product = $this->Products->get($id, [
                'contain' => [],
            ]);
            $productImage = $this->request->getData('product_image');
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $data['product_image'] = $fileName;

            $product = $this->Products->patchEntity($product, $data);
            if ($this->Products->save($product)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    $data["image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
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
                "message" => "The Product could not be saved. Please, try again.",
            ));
            exit;
        }
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $product->delete_status = 1;
        if ($this->Products->save($product)) {
            echo json_encode(array(
                "status" => 1,
                "message" => "The Product has been Deleted",
            ));
            exit;
        } else {
            echo json_encode(array(
                "status" => 0,
                "message" => "The Product could not be Deleted. Please, try again.",
            ));
            exit;
        }
    }
}
