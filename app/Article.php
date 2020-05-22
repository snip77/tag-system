<?php

namespace App;

use App\Tag;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
