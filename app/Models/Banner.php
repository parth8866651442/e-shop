<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'child_category_id',
        'image',
        'is_deleted',
        'is_active',
        'create_by',
        'update_by',
    ];

    public function parentCategory(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }

    public function childCategory(){
        return $this->hasOne('App\Models\Category','id','child_category_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'is_deleted',
        'is_active',
        'create_by',
        'update_by',
        'created_at',
        'updated_at',
    ];
}
