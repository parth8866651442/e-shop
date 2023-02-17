<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'phone',
        'email',
        'pincode',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'landmark',
        'alternatePhone',
    ];

    public function getIDByStateDetail(){
        return $this->hasOne('App\Models\State','id','state');
    }
}
