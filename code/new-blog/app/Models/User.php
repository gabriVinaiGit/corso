<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //function utilizzata per SEARCH USER BY ID AS PARAMETERS nel file web.php
    public function post(){
        return $this->hasOne('App\Models\Post');
    }

    //function per SEARCH POST WITH ID = 1 nel file web.php
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    //function per PRINT USER ROLE BY ID nel file web.php
    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');;
    }

    // to customize tables name and column follow the format below
    // public function roles(){
    //     return $this->belongsToMany('App\Models\Role', 'user_role', 'role_id');
    // }

    public function photos(){
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function getNameAttribute($value){
        return ucfirst($value);
        //return strtoupper($value);
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = strtoupper($value);
    }
}
