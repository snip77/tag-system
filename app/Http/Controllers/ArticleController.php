<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ArticleController extends Controller
{
    public function store(Article $article, Tag $tag)
    {
        $article->tags()->attach($tag);
        return Response::make("", 204);
    }
}
