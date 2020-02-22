<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\sorteo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class lotteryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_it_loads_the_new_events_page()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/events');

        $response->assertStatus(200);
    }
/**************** TESTING THE EVENTS ***************/
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function it_register_the_event(){
        $this->withoutExceptionHandling();
        $this->post('/events',['name'=>'celulares','description'=>'Ganarás un celular de última generación','lottery'=>'zulia','date'=>'2006-05-14','time'=>'4pm','award'=>'galletas'])->assertRedirect('home');

        $this->assertDatabaseHas('event',['name'=>'celulares','description'=>'Ganarás un celular de última generación','lottery'=>'zulia','date'=>'2006-05-14','time'=>'4pm','award'=>'galletas']);
    }

     /**
     * A basic feature test example.
     *
     * @test
     */
public function it_loads_index_page(){
    $this->withoutExceptionHandling();
    $this->get('events')->assertStatus(200);
}
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function it_updates_the_event(){

    $this->withoutExceptionHandling();
        $event= factory(sorteo::class)->create();
        $this->put("/events/{$event->id}",['name'=>'celulares','description'=>'Ganarás un celular de última generacion','lottery'=>'zulia','date'=>'2006-05-14','time'=>'4pm','award'=>'galletas'])->assertRedirect('/events/');
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function it_deletes_the_event(){
        $this->withoutExceptionHandling();
        $event= factory(sorteo::class)->create();
        $this->delete("/events/{$event->id}",['name'=>'celulares','lottery'=>'zulia','date'=>'2006-05-14','time'=>'4pm','award'=>'galletas'])->assertRedirect(route('destroy'));
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function it_loads_the_edit_page(){
        $response = $this->get('/events/{$event->id}/edit');
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function it_loads_the_info_page(){
        $response = $this->get('/events/{$event->id}');
        $response->assertStatus(200);
    }
/**************** TESTING THE EVENTS ***************/
}

