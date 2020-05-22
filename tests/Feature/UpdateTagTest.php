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
        $tag=Tag::first();
        $response = $this->putJson('api/tags/'.$tag->id,[
            'name'=>'updated name'
        ]);
        $response->assertStatus(200)
        ->assertJson(['name'=>'updated name']);
    }

    public function testSlug()
    {
        $tag=Tag::first();
        $response = $this->putJson('api/tags/'.$tag->id,[
            'slug'=>'updated slug'
        ]);
        $response->assertStatus(200)
        ->assertJson(['slug'=>'updated slug']);
    }

    public function testPhoto()
    {
        $tag=Tag::first();
        $response = $this->putJson('api/tags/'.$tag->id,[
            'photo'=>'updated photo'
        ]);
        $response->assertStatus(200)
        ->assertJson(['photo'=>'updated photo']);
    }

    public function testDescription()
    {
        $tag=Tag::first();
        $response = $this->putJson('api/tags/'.$tag->id,[
            'description'=>'updated description'
        ]);
        $response->assertStatus(200)
        ->assertJson(['description'=>'updated description']);
    }

}
