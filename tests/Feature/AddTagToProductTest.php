<?php

namespace Tests\Feature;

use App\Product;
use App\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddTagToProductTest extends TestCase
{

    public function testAttachTagToArticle()
    {
        $article=Product::create([
            'name'=>'test product'
        ]);
        $tag=Tag::create([
            'name'=>'test tag',
            'slug'=>'test slug',
            'photo'=>'1.jpg',
            'description'=>'no desc'
        ]);
        $response=$this->postJson('api/product/'.$article->id.'/'.'insert/'.$tag->id);
        $response->assertStatus(204);
        $tag->delete();
        $article->delete();
    }
}
