<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'product_id',
        'name',
        'image',
        'qty',
        'price',
        'session_id',
        'category_id'
    ];

}
