<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whislist extends Model
{
    use HasFactory;
    protected $table = 'whislists';
    protected $fillable = [
        'product_id',
        'user_id',
        'category_id',
        'name',
        'qty',
        'price',
        'image'
    ];
}
