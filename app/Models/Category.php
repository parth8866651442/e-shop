<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'image',
        'is_parent',
        'parent_id',
        'is_deleted',
        'is_active',
        'create_by',
        'update_by',
    ];

    public static function getChildByParentID($id){
        return Category::where(['parent_id'=>$id,'is_active'=>1,'is_deleted'=>0])->orderBy('id','ASC')->pluck('title','id');
    }

    public function getChildCategory(){
        return $this->hasMany('App\Models\Category','parent_id','id')->where(['is_active'=>1,'is_deleted'=>0]);
    }

    public static function getAllParentWithChild(){
        return Category::with('getChildCategory')->where(['is_parent'=>1,'is_active'=>1,'is_deleted'=>0])->orderBy('title','ASC')->get();
    }

    public function products(){
        return $this->hasMany('App\Models\Product','category_id','id')->where(['is_active'=>1,'is_deleted'=>0]);
    }
}
