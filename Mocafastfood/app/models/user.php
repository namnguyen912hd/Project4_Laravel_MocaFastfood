<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $guarded = [];
    public function roles(){
    	return $this->belongsToMany(Role::class, 'role_user', 'user_id','role_id')->withTimestamps();

    }

  
}

