<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $guarded = [];
    public function permissionsChildren()
    {
    	return $this->hasMany(Permission::class,'parentID');
    }
}
