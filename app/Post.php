<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content',
        'author',
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function types() {
        return $this->belongsToMany('App\Type');
    }
}
