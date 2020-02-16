<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\sorteo;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It runs the countdown at the specified day and hour, to play the lottery';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $rand = rand(00,99);
        $sorteo= new sorteo();
        $sorteo->winner($rand);
    }
}
