<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InserTagTest extends TestCase
{

    public function testWithOuteAnyData()
    {
        $response = $this->post('api/tags');
        $response->assertStatus(422);
    }

    public function testWithOutCompleteData1()
    {
        $response = $this->post('api/tags',[
            'name'=>'tag test 1'
        ]);
        $response->assertStatus(422);
    }

    public function testWithOutCompleteData2()
    {
        $response = $this->post('api/tags',[
            'name'=>'tag test 1',
            'slug'=>'slug test 1'
        ]);
        $response->assertStatus(422);
    }

    public function testWithOutCompleteData3()
    {
        $response = $this->post('api/tags',[
            'name'=>'tag test 1',
            'slug'=>'slug test 1',
            'photo'=>'photo_test_1.jpg'
        ]);
        $response->assertStatus(422);
    }

    public function testWithCompleteDatasas()
    {
        $response = $this->post('api/tags',[
            'name'=>'tag test 1',
            'slug'=>'slug test 1',
            'description'=>'12',
            'photo'=>'photo_test_1.jpg'
        ]);
        $response->assertStatus(201);
    }
}
