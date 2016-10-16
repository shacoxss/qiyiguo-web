<?php

namespace App\Console\Commands;

//require dirname(__FILE__).'/../Crawler/LiveCrawler.php';
//require dirname(__FILE__).'/../Lives/Douyu.php';
use Illuminate\Console\Command;
use App\Console\Lives\Douyu;
use App\Console\Crawler\LiveCrawler;

class refreshLives extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'live:refresh {--debug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'refresh the lives info';

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
        $douyu = new Douyu;
        $pool = new \Pool(18, LiveCrawler::class, [$douyu]);
        //dd(serialize(new LiveCrawler($douyu)));
        $pool->submit(new LiveCrawler($douyu));
        // $t = microtime(true);
        // $pool = new \Pool(18, \Worker::class, []);
        // //dd(serialize(new LiveCrawler($douyu)));
        // $pool->submit((new \Threaded));
        
        // foreach(range(0,10) as $i) {
        //     try{
        //         //$pool->submit(new LiveCrawler($douyu));
        //     } catch (RuntimeException $e) {
        //         //who care
        //     }
        // }

        // try{
        //     $pool->shutdown();
        // } catch (RuntimeException $e) {
        //     //who care
        //     print_r($e);
        // }

        // echo microtime(true) - $t;
    }
}
