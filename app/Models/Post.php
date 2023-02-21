<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'summary',
        'description',
        'image',
        'is_deleted',
        'is_active',
        'create_by',
        'update_by',
    ];

    public function getCategory(){
        return $this->hasOne('App\Models\PostCategory','id','category_id');
    }

    public function getUser(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function getComment(){
        return $this->hasMany('App\Models\PostComment','post_id','id')->with('user_info')->where('is_active','1')->orderBy('id','DESC')->limit(15);
    }
}
