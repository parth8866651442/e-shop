<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'size',
        'price',
        'quantity',
    ];

    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id')->select('id','title','slug','summary','condition','price','discount');
    }
}
