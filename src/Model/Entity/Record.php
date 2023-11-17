<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Record extends Entity 
{
    'book_name' => true,
    'book_id' => true,
    'user_id' => true,
    'borrow_date' => true,
    'return_date' => true,
    'is_returned' => true,
    'book' => true,
    'user' => true,
}