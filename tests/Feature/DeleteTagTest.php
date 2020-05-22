<?php

namespace Tests\Feature;

use App\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTagTest extends TestCase
{
    public function testDeleteTag()
    {
        $tag=Tag::first();
        $count=Tag::count();
        $response = $this->DeleteJson('api/tags/'.$tag->id,[
            'name'=>'updated name'
        ]);
        $response->assertStatus(204);
        $this->assertTrue($count==Tag::count()+1);
    }
}
