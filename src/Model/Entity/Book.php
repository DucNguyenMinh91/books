<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Book extends Entity
{
    protected $_accessible = [
        'category_id' => true,
        'book_img' => true,
        'title' => true,
        'slug' => true,
        'summary' => true,
        'isbn_no' => true,
        'auther' => true,
        'total_qty' => true,
        'available_qty' => true,
        'created_at' => true,
        'category' => true,
        'records' => true,
    ];
}