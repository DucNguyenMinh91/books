<?php

declare(strict_types=1);
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoriesTable extends Table
{
    /**
     * @param array $config
     */
    public function initialize(array $config): void
    {

        parent::initialize($config);
        $this->setTable('categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->hasMany('Books',[
            'foreignKey' => 'category_id',
        ]);
    }

    /**
     * 
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
        ->scalar('name')
        ->maxLength('name',100)
        ->requirePresence('name','create')
        ->notEmptyString('name');
        return $validator;
    }
}
