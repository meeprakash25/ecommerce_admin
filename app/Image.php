<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $uploads = '/images/category/';
    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getNameAttribute($name)
    {
        return $this->uploads.$name;
    }
}
