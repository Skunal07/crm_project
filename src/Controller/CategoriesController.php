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

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
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

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $users = $this->Categories->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('category', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
