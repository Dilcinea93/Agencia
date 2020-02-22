<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DB;
use App\client;
use App\sorteo;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {$this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);
    }/**
     * A basic feature test example.
     *
     * @test void
     */
    public function it_saves_the_bill(){
         //$this->withoutExceptionHandling();


         $this->post('/comprar',
            ['cedula'=>'332435','name'=>'victor','email'=>'sadas@sdf.co','phone'=>'342','id_num'=>'4']);
         $this->assertDatabaseHas('client',['cedula'=>'332435','name'=>'victor','email'=>'sadas@sdf.co','phone'=>'342','id_num'=>'4']);

    }

    /**
     * A basic feature test example.
     *
     * @test void
     */
}
