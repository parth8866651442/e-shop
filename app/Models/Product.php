<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'child_category_id',
        'title',
        'slug',
        'summary',
        'description',
        'stock',
        'size',
        'condition',
        'price',
        'discount',
        'is_deleted',
        'is_active',
        'create_by',
        'update_by',
    ];

    public function ProductImages(){
        return $this->hasMany('App\Models\ProductImage','product_id','id')->orderBy('id','ASC');
    }
    
    public function productOneImage(){
        return $this->hasOne('App\Models\ProductImage','product_id','id')->orderBy('id','ASC');
    }

    public function parentCategory(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }

    public function childCategory(){
        return $this->hasOne('App\Models\Category','id','child_category_id');
    }

}
