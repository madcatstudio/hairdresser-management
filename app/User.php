<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'number', 'birthdate', 'phone', 'email', 'note', 'password',
    ];

    protected $username = 'number';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['birthdate'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin()
    {
        return $this->roles()->where('role_id', 1)->first();
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class)->orderBy('date', 'desc');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class)->orderBy('date', 'desc');
    }
    
    public function setEmailAttribute($value) {
        if ( empty($value) ) { // will check for empty string, null values, see php.net about it
            $this->attributes['email'] = NULL;
        } else {
            $this->attributes['email'] = $value;
        }
    }

    public function setPhoneAttribute($value) {
        if ( empty($value) ) { // will check for empty string, null values, see php.net about it
            $this->attributes['phone'] = NULL;
        } else {
            $this->attributes['phone'] = $value;
        }
    }

    public function setBirthdateAttribute($value) {
        if ( empty($value) ) { // will check for empty string, null values, see php.net about it
            $this->attributes['birthdate'] = NULL;
        } else {
            $this->attributes['birthdate'] = $value;
        }
    }

    public function setNoteAttribute($value) {
        if ( empty($value) ) { // will check for empty string, null values, see php.net about it
            $this->attributes['note'] = NULL;
        } else {
            $this->attributes['note'] = $value;
        }
    }

    public function setAvatarAttribute($value) {
        if ( empty($value) ) { // will check for empty string, null values, see php.net about it
            $this->attributes['avatar'] = NULL;
        } else {
            $this->attributes['avatar'] = $value;
        }
    }

}
