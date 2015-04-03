<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('Activities', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Bots', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('EmailQueue', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ErrorLog', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('JobClock', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Jobs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('OauthConsumer', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('OauthToken', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Queues', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('S3Files', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('SliceConfigs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('SliceJobs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Stats', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Tokens', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('WebcamImages', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->requirePresence('pass_hash', 'create')
            ->notEmpty('pass_hash')
            ->requirePresence('pass_reset_hash', 'create')
            ->notEmpty('pass_reset_hash')
            ->requirePresence('location', 'create')
            ->notEmpty('location')
            ->add('birthday', 'valid', ['rule' => 'date'])
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday')
            ->add('last_active', 'valid', ['rule' => 'datetime'])
            ->requirePresence('last_active', 'create')
            ->notEmpty('last_active')
            ->add('registered_on', 'valid', ['rule' => 'datetime'])
            ->requirePresence('registered_on', 'create')
            ->notEmpty('registered_on')
            ->add('last_notification', 'valid', ['rule' => 'numeric'])
            ->requirePresence('last_notification', 'create')
            ->notEmpty('last_notification')
            ->requirePresence('dashboard_style', 'create')
            ->notEmpty('dashboard_style')
            ->requirePresence('thingiverse_token', 'create')
            ->notEmpty('thingiverse_token')
            ->add('is_admin', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_admin', 'create')
            ->notEmpty('is_admin');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
