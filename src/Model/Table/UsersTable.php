<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->hasMany('Records', [
            'foreignKey' => 'user_id',
        ]);

    }

    public function validationDefault(Validator $validator): Validator
    {

        $validator->scalar('username')
        ->maxLength('username',100)
        ->requirePresence('username','create')
        ->notEmptyString('username');

        $validator->scalar('password')
        ->maxLength('password',100)
        ->requirePresence('password','create')
        ->notEmptyString('password');

        $validator->scalar('profile_img')
        ->maxLength('profile_img',255)
        ->requirePresence('profile_img','create')
        ->notEmptyString('profile_img');

        $validator->scalar('role')
        ->maxLength('role',20)
        ->requirePresence('role','create')
        ->notEmptyString('role');

        $validator->email('email')
        ->requirePresence('email','create')
        ->notEmptyString('email');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        return $rules;
    }
}