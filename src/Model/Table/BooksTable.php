<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BooksTable extends Table
{
    /**
     * ini function
     * @param array $config
     */
    public function initialize(array $config): void
    {

        parent::initialize($config);
        $this->setTable('books');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Records', [
            'foreignKey' => 'book_id',
        ]);
    }

    /**
     * create validation
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('category_id')
            ->requirePresence('category_id', 'create')
            ->notEmptyString('category_id');

        $validator
            ->scalar('book_img')
            ->maxLength('book_img', 100)
            ->requirePresence('book_img', 'create')
            ->notEmptyString('book_img');

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 100)
            ->allowEmptyString('slug');

        $validator
            ->scalar('summary')
            ->requirePresence('summary', 'create')
            ->notEmptyString('summary');

        $validator
            ->scalar('isbn_no')
            ->maxLength('isbn_no', 100)
            ->requirePresence('isbn_no', 'create')
            ->notEmptyString('isbn_no');

        $validator
            ->scalar('auther')
            ->maxLength('auther', 100)
            ->requirePresence('auther', 'create')
            ->notEmptyString('auther');

        $validator
            ->integer('total_qty')
            ->requirePresence('total_qty', 'create')
            ->notEmptyString('total_qty');

        $validator
            ->integer('available_qty')
            ->requirePresence('available_qty', 'create')
            ->notEmptyString('available_qty');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        return $validator;
    }

    /**
     * create rules
     */
    public function buildRules(RulesChecker $rules) : RulesChecker 
    {
        $rules->add($rules->existsIn('category_id','Categories'), ['errorField'=> 'category_id']);
        return $rules;

    }
}
