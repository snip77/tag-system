<?php

namespace Tests\Feature;

use App\Article;
use App\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddTagToArticleTest extends TestCase
{
    public function testAttachTagToArticle()
    {
        $article=Article::create([
            'title'=>'test article'
        ]);
        $tag=Tag::create([
            'name'=>'test tag',
            'slug'=>'test slug',
            'photo'=>'1.jpg',
            'description'=>'no desc'
        ]);
        $response=$this->postJson('api/article/'.$article->id.'/'.'insert/'.$tag->id);
        $response->assertStatus(204);
        $tag->delete();
        $article->delete();
    }
}
