<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'user_shipping_id',
        'coupon_id',
        'order_number',
        'items_count',
        'sub_total',
        'coupon_amount',
        'shipping_amount',
        'total_amount',
        'payment_method',
        'payment_status',
        'status',
    ];
}
