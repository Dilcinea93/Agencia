<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\client;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class lotteryTest extends TestCase
{

    use RefreshDatabase;
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
     *
     * @test
     */
    // public function it_does_the_request()
    // {
    //     $response = $this->get('/solicitar');

    //     $response->assertStatus(200);
    // }
    /**
     *
     * @test
     */
    // public function it_downloads_the_ticket()
    // {
    //     $response = $this->get('/descargar-ticket');
        
    //     $response->assertStatus(200);
    // }
    /**
     *
     * @test
     */
    public function it_saves_the_billing()
    {
         $this->withoutExceptionHandling();
        $response = $this->post('/comprar',[
            'name'=>'YOHANA',
            'phone'=>'5465',
            'email'=>'ajskas.com'
        ]);
        /*
        como que out of range el telefono vale?
        */
        $response->assertStatus(200);
    }
/**
     *
     * @test
     */
    public function it_creates_new_event()
    {
        $response=$this->post('/nuevoevento',[
            'name'=>'combodelimpieza',
            'lottery'=>'zulia',
            'date'=>'15 de diciembre',
            'time'=>'2pm',
            'award'=>'desinfectante, jabon, cloro, champu',
        ]);
        //Probar que guarda
        // $response->assertDatabaseHas('sorteo',[
        //     'name'=>'combodelimpieza',
        //     'lottery'=>'zulia',
        //     'date'=>'15 de diciembre',
        //     'time'=>'2pm',
        //     'award'=>'desinfectante, jabon, cloro, champu',
        // ]);
        // $this->withoutExceptionHandling();
        // $response->assertStatus(302);
    }


/**
     *
     * @test
     */
public function it_loads_the_homepage()
    {
        $response=$this->post('/home');
        //$this->assertViewHas('ventas');
        // $response->assertStatus(405);
    }

   
}
