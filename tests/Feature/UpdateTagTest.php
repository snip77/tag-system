<?php

namespace Tests\Feature;

use App\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTagTest extends TestCase
{
    public function testUpdateName()
    {
        $tag=Tag::create([
            'name'=>'test tag',
            'slug'=>'test slug',
            'photo'=>'1.jpg',
            'description'=>'no desc'
        ]);
        $tag=Tag::first();
        $response = $this->putJson('api/tags/'.$tag->id,[
            'name'=>'updated name'
        ]);
        $response->assertStatus(200)
        ->assertJson(['name'=>'updated name']);
        $tag->delete();
    }

    public function testSlug()
    {
        $tag=Tag::create([
            'name'=>'test tag',
            'slug'=>'test slug',
            'photo'=>'1.jpg',
            'description'=>'no desc'
        ]);
        $response = $this->putJson('api/tags/'.$tag->id,[
            'slug'=>'updated slug'
        ]);
        $response->assertStatus(200)
        ->assertJson(['slug'=>'updated slug']);
        $tag->delete();
    }

    public function testPhoto()
    {
        $tag=Tag::create([
            'name'=>'test tag',
            'slug'=>'test slug',
            'photo'=>'1.jpg',
            'description'=>'no desc'
        ]);
        $response = $this->putJson('api/tags/'.$tag->id,[
            'photo'=>'updated photo'
        ]);
        $response->assertStatus(200)
        ->assertJson(['photo'=>'updated photo']);
        $tag->delete();
    }

    public function testDescription()
    {
        $tag=Tag::create([
            'name'=>'test tag',
            'slug'=>'test slug',
            'photo'=>'1.jpg',
            'description'=>'no desc'
        ]);
        $response = $this->putJson('api/tags/'.$tag->id,[
            'description'=>'updated description'
        ]);
        $response->assertStatus(200)
        ->assertJson(['description'=>'updated description']);
        $tag->delete();
    }

}
