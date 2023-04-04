<?php

declare(strict_types=1);

namespace App\Controller;


class TaskController extends AppController
{

    public function index()
    {   
        if( $this->Authentication->getIdentity()){
            $user = $this->Authentication->getIdentity();
            $uid = $user->id;
        }else{
          return  $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }


        if ($user->role == 1) {
            $task =$this->Task->find('all')->contain(['Users.UserProfile', 'Assigned.UserProfile','TaskAssigned'])->order(["Task.id"=>"DESC"])->all();

            $users = $this->paginate($this->Users->find('all')->contain(['UserProfile'])->where(['role' => 0, 'status' => 0, 'delete_status' => 0]));
        } else {
            $task =$this->Task->find('all')->contain(['Users.UserProfile', 'Assigned.UserProfile','TaskAssigned'])->where(['Task.user_id' => $uid])->order(["Task.id"=>"DESC"])->all();

            $users = $this->paginate($this->Users->find('all')->contain(['UserProfile'])->where(['role' => 0, 'status' => 0, 'delete_status' => 0]));
        }
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
                
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Failed to Add Task"
                ));
                die;
            }else{

                echo json_encode(array(
                    "status" => 1,
                    "message" => "Task has been Added"
                ));
                die;
            }
        
        }
    }



}
