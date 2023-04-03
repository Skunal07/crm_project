<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\HasMany $Categories
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\HasMany $Companies
 * @property \App\Model\Table\ContactUsReplyTable&\Cake\ORM\Association\HasMany $ContactUsReply
 * @property \App\Model\Table\ContactsTable&\Cake\ORM\Association\HasMany $Contacts
 * @property \App\Model\Table\LeadsTable&\Cake\ORM\Association\HasMany $Leads
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\UserProfileTable&\Cake\ORM\Association\HasMany $UserProfile
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Categories', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Companies', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('ContactUsReply', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Contacts', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Leads', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'user_id',
        ]);
        // $this->hasMany('Task', [
            
        //     'foreignKey' => 'assigned_by',
        // ]);
        $this->hasOne('UserProfile', [
            'foreignKey' => 'user_id',
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

        // $validator
        //     ->integer('user_id')
        //     ->allowEmptyString('user_id');

        // $validator
        //     ->email('email')
        //     ->requirePresence('email', 'create')
        //     ->notEmptyString('email')
        //     ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);


        // $validator
        //     ->scalar('password')
        //     ->maxLength('password', 255)
        //     ->requirePresence('password', 'create')
        //     ->notEmptyString('password');

        // $validator
        //     ->integer('added_by')
        //     ->allowEmptyString('added_by');

        // $validator
        //     ->scalar('status')
        //     ->notEmptyString('status');

        // $validator
        //     ->dateTime('created_date')
        //     ->notEmptyDateTime('created_date');

        // $validator
        //     ->dateTime('modified_date')
        //     ->allowEmptyDateTime('modified_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
