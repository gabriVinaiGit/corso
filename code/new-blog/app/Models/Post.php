<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public $directory = "/images/";
    use SoftDeletes;
    // protected $table = 'posts';
    // protected $primaryKey = 'post_id'

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'content',
        'path'
    ];

    //function utilizzata per SEARCH USER BY ID AS PARAMETERS nel file web.php
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //

    public function photos(){
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public static function scopeLatestName($query){
        return $query->orderBy('id', 'desc')->get();
    }

    public function getPathAttribute($value){
        return $this->directory. $value;
    }
}
