<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable =['title', 'description', 'country', 'cover'];

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'movie_genre');
    }
}
