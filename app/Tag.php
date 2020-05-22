<?php

namespace App;

use App\Product;
use App\Article;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }
}
