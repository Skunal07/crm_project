<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContactUs Model
 *
 * @method \App\Model\Entity\ContactU newEmptyEntity()
 * @method \App\Model\Entity\ContactU newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ContactU[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContactU get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContactU findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ContactU patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContactU[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContactU|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContactU saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContactU[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContactU[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContactU[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ContactU[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContactUsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contact_us');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasOne('Payments', [
            'foreignKey' => 'contact_us_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 10)
            ->allowEmptyString('phone');

        $validator
            ->scalar('query_type')
            ->maxLength('query_type', 50)
            ->requirePresence('query_type', 'create')
            ->notEmptyString('query_type');

        $validator
            ->scalar('message')
            ->maxLength('message', 350)
            ->allowEmptyString('message');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        return $validator;
    }
}
