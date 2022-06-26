<?php

    namespace App\Console\Commands;

    use Illuminate\Console\Command;
    use Illuminate\Support\Facades\Http;

    class FetchGames extends Command
    {

        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'games:fetch';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Command description';

        /**
         * Execute the console command.
         *
         * @return int
         */
        public function handle()
        {
            $req = Http::withHeaders([
                'Client-ID' => 'lvx8bx341tm02wmkjwc8qesgvq8dhv',
                'Authorization' => 'Bearer efe78u9ta33m1rn6v91rznmjpe3vee',
            ]);
            $resp = $req->withBody('fields *;', 'text/plain')
                        ->post('https://api.igdb.com/v4/games');
            $popularGameIds = $resp->json();
            dump($popularGameIds);
        }

    }
