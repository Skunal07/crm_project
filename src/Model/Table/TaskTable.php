<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class TaskTable extends Table
{
   
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('task');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Assigned', [
            'className' => 'Users',
            'foreignKey' => 'assigned_by',
        ]);
        $this->hasMany('TaskAssigned', [
            'foreignKey' => 'task_id',
        ]);
        $this->hasOne('TaskAssigned');
    }

  
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->integer('user_id')
        //     ->allowEmptyString('user_id');

        // $validator
        //     ->integer('assigned_by')
        //     ->allowEmptyString('assigned_by');

        // $validator
        //     ->scalar('status')
        //     ->notEmptyString('status');

        // $validator
        //     ->scalar('delete_status')
        //     ->notEmptyString('delete_status');

        // $validator
        //     ->dateTime('created_date')
        //     ->notEmptyDateTime('created_date');

        // $validator
        //     ->dateTime('modified_date')
        //     ->notEmptyDateTime('modified_date');

        return $validator;
    }

    
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
