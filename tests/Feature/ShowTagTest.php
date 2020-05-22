<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Tag;

class ShowTagTest extends TestCase
{
    public function testWithOutAnyFilter()
    {
        Tag::create([
            'name'=>'tag test 1',
            'slug'=>'slug test 1',
            'description'=>'12',
            'photo'=>'photo_test_1.jpg'
        ]);

        $response = $this->getJson('api/tags');
        $response
            ->assertStatus(200)
            ->assertJson(Tag::all()->toArray());
    }

    public function testWithSingleColumnFilter1()
    {
        $response = $this->get('api/tags',[
            'name'=>'tag test 1'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson(Tag::where(['name'=>'tag test 1'])->get()->toArray());
    }

    public function testWithSingleColumnFilter2()
    {
        $response = $this->getJson('api/tags',[
            'name'=>'tag test 12'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([]);
    }

    public function testWithSingleColumnFilter3()
    {
        $response = $this->getJson('api/tags',[
            'slug'=>'slug test 1'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson(
                Tag::where(['slug'=>'slug test 1'])->get()->toArray()
            );
    }

    public function testWithSingleColumnFilter4()
    {
        $response = $this->getJson('api/tags',[
            'slug'=>'slug test 32'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([]);
    }

    public function testWithSingleColumnFilter5()
    {
        $response = $this->getJson('api/tags',[
            'photo'=>'photo_test_1.jpg'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson(
                Tag::where(['photo'=>'12'])->get()->toArray()
            );
    }

    public function testWithSingleColumnFilter6()
    {
        $response = $this->getJson('api/tags',[
            'photo'=>'photo_test_1.png'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([]);
    }

    public function testWithSingleColumnFilter7()
    {
        $response = $this->getJson('api/tags',[
            'description'=>'12',
        ]);
        $response
            ->assertStatus(200)
            ->assertJson(
                Tag::where(['description'=>'photo_test_1.jpg',])->get()->toArray()
            );
    }

    public function testWithSingleColumnFilter8()
    {
        $response = $this->getJson('api/tags',[
            'description'=>'1221',
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([]);
    }

    public function testWithMultieColumnFilter1()
    {
        $response = $this->getJson('api/tags',[
            'name'=>'tag test 1',
            'slug'=>'slug test 1'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson(Tag::where([
                'name'=>'tag test 1',
                'slug'=>'slug test 1'
            ])->get()->toArray());
    }

    public function testWithMultieColumnFilter2()
    {
        $response = $this->getJson('api/tags',[
            'name'=>'tag test 12',
            'slug'=>'slug test 1'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([]);
    }

    public function testWithMultieColumnFilter3()
    {
        $response = $this->getJson('api/tags',[
            'name'=>'tag test 1',
            'slug'=>'slug test 12'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([]);
    }

    public function testWithCompleteDataFilter()
    {
        $response = $this->getJson('api/tags',[
            'name'=>'tag test 1',
            'slug'=>'slug test 1',
            'photo'=>'photo_test_1.jpg',
            'description'=>'12'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson(
                Tag::where([
                    'name'=>'tag test 1',
                    'slug'=>'slug test 1',
                    'photo'=>'photo_test_1.jpg',
                    'description'=>'12',
                ])->get()->toArray()
            );
        Tag::destroy(Tag::all()->pluck('id'));
    }
}
