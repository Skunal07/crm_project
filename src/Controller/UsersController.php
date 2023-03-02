<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\View;


class UsersController extends AppController
{

    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout("dashboard");
        $this->loadModel('UserProfile');
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


    // public function add()
    // {
    //     $user = $this->Users->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $user = $this->Users->patchEntity($user, $this->request->getData());
    //         if ($this->Users->save($user)) {
    //             $this->Flash->success(__('The user has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
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
