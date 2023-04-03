<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class TaskAssignedTable extends Table
{
   
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('task_assigned');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('task', [
            'foreignKey' => 'task_id',
        ]);
    }

   
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->integer('task_id')
        //     ->allowEmptyString('task_id');

        // $validator
        //     ->scalar('task_name')
        //     ->maxLength('task_name', 250)
        //     ->allowEmptyString('task_name');

        // $validator
        //     ->dateTime('due_date')
        //     ->allowEmptyDateTime('due_date');

        // $validator
        //     ->dateTime('create_at')
        //     ->notEmptyDateTime('create_at');

        return $validator;
    }
}
