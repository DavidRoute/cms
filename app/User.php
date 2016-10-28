<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Carbon\Carbon;

class User extends Authenticatable
{    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Role');        
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    #Accessor For created_at & updated_at
    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->diffForHumans();    
    }   

    #Mutator For Password, Name & Email
    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt( trim($password));
    }

    public function setNameAttribute($name) {
        $this->attributes['name'] = trim($name);
    }

    public function setEmailAttribute($email) {
        $this->attributes['email'] = trim($email);
    }


}
