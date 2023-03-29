<?php

declare(strict_types=1);

namespace App\Controller;


class TaskController extends AppController
{

    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Users'],
        // ];
        $task = $this->paginate($this->Task);

        $users = $this->paginate($this->Users->find('all')->contain(['UserProfile'])->where(['role' => 0, 'status' => 0, 'delete_status' => 0]));

        $this->set(compact('task','users'));

    }

    // public function showUser()
    // {
    //     if ($this->request->is('ajax')) {
    //         $this->autoRender = false;
    //         $users = $this->paginate($this->Users->find('all')->contain(['UserProfile'])->where(['role' => 0, 'status' => 0, 'delete_status' => 0]));
    //         echo json_encode($users);
    //         // $this->set(compact('users'));
    //     }
    //     // dd($users);
    //     // exit;
    // }

    public function addTask()
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $task = $this->Task->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $task = $this->Task->patchEntity($task, $this->request->getData());
            $task->user_id = $uid;
            if ($this->Task->save($task)) {


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



    public function add()
    {
        $task = $this->Task->newEmptyEntity();
        if ($this->request->is('post')) {
            $task = $this->Task->patchEntity($task, $this->request->getData());
            if ($this->Task->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $users = $this->Task->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('task', 'users'));
    }

    public function edit($id = null)
    {
        $task = $this->Task->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Task->patchEntity($task, $this->request->getData());
            if ($this->Task->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $users = $this->Task->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('task', 'users'));
    }
    function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Task->get($id);
        if ($this->Task->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
