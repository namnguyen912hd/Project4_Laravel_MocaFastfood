<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = ['name', 'parentdID', 'slug'];
}
