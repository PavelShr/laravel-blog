<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'preview_image', 'post_text',
    ];

    public function comments()
    {
//        return $this->hasMany('App\Comment');
    }

    public function author()
    {
        return $this->hasOne(User::class);
    }
}
