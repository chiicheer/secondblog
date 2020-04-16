<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function posts(){ //←hasManyの時は複数形にする!!

    	return $this->hasMany('App\Post');
    }
}
