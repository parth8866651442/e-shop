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
        return Category::where(['parent_id'=>$id,'is_deleted'=>0])->orderBy('id','ASC')->pluck('title','id');
    }
}
