<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Event;
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
     /**
     * A basic feature test example.
     *
     * @test
     */
public function it_loads_index_page(){
    $this->withoutExceptionHandling();
    $this->get('events/event')->assertStatus(200);
}

/**
     * A basic feature test example.
     *
     * @test
     */
public function it_loads_the_home_page(){
    $this->withoutExceptionHandling();
    $this->get('home')->assertStatus(200);
}

}

