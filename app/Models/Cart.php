<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=['user_id','product_id','order_id','quantity','amount','price','status'];

    public function productLimit()
    {
        return $this->belongsTo('App\Models\Product','product_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id', 'id');
    }
    public function order(){
        return $this->belongsTo('App\Models\Order','order_id','id');
    }
}
