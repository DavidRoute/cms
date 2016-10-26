<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $uploads = '/images/';

    protected $fillable = ['file'];

    // public function users() {
    // 	return $this->hasMany('App\User');
    // }

    #User Photo Accessor
    public function getFileAttribute($photo) {
    	return $this->uploads . $photo;
    }  

}
