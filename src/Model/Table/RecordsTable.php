<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class RecordsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('records');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('book_name')
            ->maxLength('book_name', 100)
            ->requirePresence('book_name', 'create')
            ->notEmptyString('book_name');

        $validator
            ->integer('book_id')
            ->requirePresence('book_id', 'create')
            ->notEmptyString('book_id');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->dateTime('borrow_date')
            ->notEmptyDateTime('borrow_date');

        $validator
            ->dateTime('return_date')
            ->notEmptyDateTime('return_date');

        $validator
            ->scalar('is_returned')
            ->maxLength('is_returned', 10)
            ->requirePresence('is_returned', 'create')
            ->notEmptyString('is_returned');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('book_id', 'Books'), ['errorField' => 'book_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}