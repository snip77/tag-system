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
        $tag=Tag::create([
            'name'=>'tag test 1',
            'slug'=>'slug test 1',
            'description'=>'12',
            'photo'=>'photo_test_1.jpg'
        ]);
        $count=Tag::count();
        $response = $this->DeleteJson('api/tags/'.$tag->id);
        $response->assertStatus(204);
        $this->assertTrue($count==Tag::count()+1);
    }
}
