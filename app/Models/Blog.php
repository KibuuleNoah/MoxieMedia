<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = ["title","content","tags","read_time"];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sample_comments()
    {
        return $this->hasMany(Comment::class)->latest()->limit(3);

    }
}
