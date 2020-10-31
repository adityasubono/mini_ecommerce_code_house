<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'invoice',
        'customer_id',
        'customer_name',
        'customer_phone',
        'customer_address',
        'customer_email',
        'status',
        'payment_method',
        'subtotal',
        'date'
    ];
}
