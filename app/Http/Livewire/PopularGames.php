<?php

    namespace App\Http\Livewire;

    use Carbon\Carbon;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Str;
    use Livewire\Component;

    class PopularGames extends Component
    {

        public array $popularGames = [];

        public function loadPopularGames()
        {

            $before = Carbon::now()->subMonths(2)->timestamp;
            $after = Carbon::now()->addMonths(2)->timestamp;

            $popularGamesUnformatted = Cache::remember('popular-games', 7, function () use ($before, $after) {
                return Http::withHeaders([
                    'Client-ID' => 'lvx8bx341tm02wmkjwc8qesgvq8dhv',
                    'Authorization' => 'Bearer efe78u9ta33m1rn6v91rznmjpe3vee',
                ])->withBody("fields name, cover.url, first_release_date, platforms.abbreviation, rating, slug;
                                  where platforms = (48,49,130,6,9,14)
                                  & (first_release_date >= {$before}
                                  & first_release_date < {$after});
                                  sort rating desc;
                                  where rating != null;
                                  limit 12;", 'text/plain')->post('https://api.igdb.com/v4/games')->json();
            });

            $this->popularGames = $this->formatForView($popularGamesUnformatted);

            collect($this->popularGames)->filter(function ($game) {
                return $game['rating'];
            })->each(function ($game) {
                $this->emit('gameWithRating', [
                    'slug' => $game['slug'],
                    'rating' => $game['rating'] / 100
                ]);
            });

        }

        private function formatForView($games)
        {
            return collect($games)->map(function ($game) {
                return collect($game)->merge([
                    'coverImageUrl' => Str::replacefirst('thumb', 'cover_big', $game['cover']['url']) ,
                    'rating' => isset($game['rating']) ? round($game['rating']) : null,
                    'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', ')
                ]);
            })->toArray();
        }

        public function render()
        {
            return view('livewire.popular-games');
        }

    }
