<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = [
        'categori_id',
        'name',
        'slug',
        'info_product',
        'benefits',
        'image',
        'price',
        'discount',
        'stock',
        'volume',
        'weight'];
}
