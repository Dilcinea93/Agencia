<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DB;
use App\client;
use App\Event;
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
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
     public function test_it_loads_the_new_events_page()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/events/event');

        $response->assertStatus(200);
    }

/**
     * A basic feature test example.
     *
     * @test
     */
    public function it_register_the_event(){
        $this->withoutExceptionHandling();
        $this->post('events/event',['id_user'=>1,'name'=>'celulares','description'=>'Ganarás un celular de última generación','lottery'=>'zulia','date'=>'2006-05-14','time'=>'4pm','award'=>'galletas'])->assertRedirect('home');

        $this->assertDatabaseHas('event',['id_user'=>1,'name'=>'celulares','description'=>'Ganarás un celular de última generación','lottery'=>'zulia','date'=>'2006-05-14','time'=>'4pm','award'=>'galletas']);
    }


/**
     * A basic feature test example.
     *
     * @test
     */
    public function it_updates_the_event(){

    $this->withoutExceptionHandling();
        $event= factory(Event::class)->create();
        $this->put("/events/event/{$event->id}",['id_user'=>1,'name'=>'celulares','description'=>'Ganarás un celular de última generacion','lottery'=>'zulia','date'=>'2006-05-14','time'=>'4pm','award'=>'galletas'])->assertRedirect('/events/');
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function it_deletes_the_event(){
        $this->withoutExceptionHandling();
        $event= factory(event::class)->create();
        $this->delete("/events/event/{$event->id}",['name'=>'celulares','lottery'=>'zulia','date'=>'2006-05-14','time'=>'4pm','award'=>'galletas'])->assertRedirect(url('events'));
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function it_loads_the_edit_page(){
        $event= factory(event::class)->create();
        $response = $this->get('/events/event/{$event->id}/edit');
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function it_loads_the_info_page(){
        
        $this->withoutExceptionHandling();
        $event= factory(event::class)->create();
        $response = $this->get('/events/event/{$event->id}');
        $response->assertStatus(200);
    }
    
    /**
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
