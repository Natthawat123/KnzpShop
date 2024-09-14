<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    // protected $foreignKey = 'product_id';
    protected $allowedFields = [
        'user_id',
        'product_id',
        'quantity'
    ];
}