<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LeadContacts Model
 *
 * @property \App\Model\Table\LeadsTable&\Cake\ORM\Association\BelongsTo $Leads
 *
 * @method \App\Model\Entity\LeadContact newEmptyEntity()
 * @method \App\Model\Entity\LeadContact newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LeadContact[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LeadContact get($primaryKey, $options = [])
 * @method \App\Model\Entity\LeadContact findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LeadContact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LeadContact[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LeadContact|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeadContact saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeadContact[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LeadContact[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LeadContact[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LeadContact[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LeadContactsTable extends Table
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

        $this->setTable('lead_contacts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Leads', [
            'foreignKey' => 'lead_id',
            'joinType' => 'INNER',
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
        //     ->integer('lead_id')
        //     ->notEmptyString('lead_id');

        // $validator
        //     ->scalar('contact')
        //     ->maxLength('contact', 50)
        //     ->requirePresence('contact', 'create')
        //     ->notEmptyString('contact');

        // $validator
        //     ->dateTime('created_date')
        //     ->notEmptyDateTime('created_date');

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
        $rules->add($rules->existsIn('lead_id', 'Leads'), ['errorField' => 'lead_id']);

        return $rules;
    }
}
