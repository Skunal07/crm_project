<?php

declare(strict_types=1);

namespace App\Controller;


class TaskController extends AppController
{

    public function index()
    {
       
        $task =$this->Task->find('all')->contain(['Users.UserProfile', 'Assigned.UserProfile','TaskAssigned'])->order(["Task.id"=>"DESC"])->all();

        $users = $this->paginate($this->Users->find('all')->contain(['UserProfile'])->where(['role' => 0, 'status' => 0, 'delete_status' => 0]));
        
        // dd($task);
        $this->set(compact('task','users'));

    }

    public function addTask()
    {
        $user = $this->Authentication->getIdentity();

        $uid = $user->id;
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            
            $data_save= array();
            
            foreach($data['user_id'] as $datas){
                $data_save[] += $datas;
            }

            $i = 0;
            foreach($data_save as $datass){
                $task = $this->Task->newEmptyEntity();
                $task->user_id = $datass;
                $task->assigned_by = $uid;
                $this->Task->save($task);
                
                $taskassigned = $this->TaskAssigned->newEmptyEntity();
                $taskassigned->task_id = $task->id;
                $taskassigned->task_name = $data['task_assigned']['task_name'];
                if(!$data['task_assigned']['due_date'] == ''){

                    $taskassigned->due_date = $data['task_assigned']['due_date'];
                }
                $this->TaskAssigned->save($taskassigned);
                $i++;
            }
            if($i=0){
                $this->Flash->error(__('Failed to save company name'));
                
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Failed to create"
                ));
                die;
            }else{

                $this->Flash->success(__('company has been created'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "company name has been created"
                ));
                die;
            }
        
        }
    }



    public function add()
    {
        $task = $this->Task->newEmptyEntity();
        if ($this->request->is('post')) {

            dd($this->request->getData());
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
