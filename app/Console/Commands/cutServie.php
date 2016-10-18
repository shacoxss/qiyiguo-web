<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\JiebaAnalyse;

class cutServie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cut';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        ini_set('memory_limit', '-1');
        Jieba::init(['mode'=>'test']);
        Finalseg::init();
        JiebaAnalyse::init();
        error_reporting(E_ALL);

        /* Allow the script to hang around waiting for connections. */
        set_time_limit(0);

        /* Turn on implicit output flushing so we see what we're getting
        * as it comes in. */
        ob_implicit_flush();

        $address = '127.0.0.1';
        $port = 10000;

        if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
        }

        if (socket_bind($sock, $address, $port) === false) {
            echo "socket_bind() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
        }

        if (socket_listen($sock, 5) === false) {
            echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
        }

        do {
            if (($msgsock = socket_accept($sock)) === false) {
                echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
                break;
            }
            /* Send instructions. */
            // $msg = "\nWelcome to the PHP Test Server. \n" .
            //     "To quit, type 'quit'. To shut down the server type 'shutdown'.\n";
            // socket_write($msgsock, $msg, strlen($msg));

            do {
                if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
                    echo "socket_read() failed: reason: " . socket_strerror(socket_last_error($msgsock)) . "\n";
                    break 2;
                }
                if (!$buf = trim($buf)) {
                    continue;
                }
                if ($buf == 'quit') {
                    break;
                }
                if ($buf == 'shutdown') {
                    socket_close($msgsock);
                    break 2;
                }
                $t = microtime(true);;
                $talkback = implode(',', Jieba::cut($buf))."\n";
                socket_write($msgsock, $talkback, strlen($talkback));
                $t -= microtime(true);
                echo "$t\n";
            } while (true);
            socket_close($msgsock);
        } while (true);

        socket_close($sock);
    }
}
