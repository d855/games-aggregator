<?php

    namespace App\Http\Controllers;

    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Str;

    class GamesController extends Controller
    {

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return view('index');
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function show($slug)
        {
            $game = Http::withHeaders([
                'Client-ID' => 'lvx8bx341tm02wmkjwc8qesgvq8dhv',
                'Authorization' => 'Bearer efe78u9ta33m1rn6v91rznmjpe3vee',
            ])->withBody("fields name, cover.url, first_release_date, platforms.abbreviation, rating, slug, involved_companies.company.name, genres.name, total_rating, 
                                summary, websites.*, videos.*, screenshots.*, similar_games.cover.url, similar_games.name, similar_games.rating, 
                                similar_games.platforms.abbreviation, similar_games.slug; where slug=\"{$slug}\";",
                'text/plain')->post('https://api.igdb.com/v4/games')->json();

            abort_if(! $game, 404);

            return view('show', [
                'game' => $this->formatGameForView($game[0])
            ]);
        }

        private function formatGameForView($game){
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'genres' => collect($game['genres'])->pluck('name')->implode(', '),
                'involvedCompanies' => $game['involved_companies'][0]['company']['name'],
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
                'memberRating' => array_key_exists('rating', $game) ? round($game['rating']) : 'N/A',
                'criticRating' => array_key_exists('total_rating', $game) ? round($game['total_rating']) : 'N/A',
                'trailer' => 'https://youtube.com/watch/'.$game['videos'][0]['video_id'],
                'screenshots' => collect($game['screenshots'])->map(function ($screenshot) {
                    return [
                        'big' => Str::replace('thumb', 'screenshot_big', $screenshot['url']),
                        'huge' => Str::replace('thumb', 'screenshot_huge', $screenshot['url']),
                    ];
                })->take(9),
                'similarGames' => collect($game['similar_games'])->map(function ($game) {
                    return collect($game)->merge([
                        'coverImageUrl' => array_key_exists('cover', $game) ? Str::replaceFirst('thumb', 'cover_big',
                            $game['cover']['url']) : 'https://via.placeholder.com/264x352',
                        'rating' => isset($game['rating']) ? round($game['rating']) : null,
                        'platforms' => array_key_exists('platforms', $game) ? collect($game['platforms'])->pluck('abbreviation')->implode(', ') : null,
                    ]);
                })->take(6),
            ])->toArray();
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }

    }
