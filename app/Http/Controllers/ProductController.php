<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function store(Product $product, Tag $tag)
    {
        $product->tags()->attach($tag);
        return Response::make("", 204);
    }
}
