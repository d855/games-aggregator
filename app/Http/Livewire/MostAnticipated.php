<?php

    namespace App\Http\Livewire;

    use Carbon\Carbon;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Str;
    use Livewire\Component;

    class MostAnticipated extends Component
    {

        public array $mostAnticipated = [];

        public function loadMostAnticipated()
        {
            $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;
            $current = Carbon::now()->timestamp;

            $mostAnticipatedUnformatted = Cache::remember('most-anticipated', 7,
                function () use ($afterFourMonths, $current) {
                    return Http::withHeaders([
                        'Client-ID' => 'lvx8bx341tm02wmkjwc8qesgvq8dhv',
                        'Authorization' => 'Bearer efe78u9ta33m1rn6v91rznmjpe3vee',
                    ])->withBody("fields name, cover, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary;
                                  where platforms = (48,49,130,6,9,14)
                                  & (first_release_date >= {$current}
                                  & first_release_date < {$afterFourMonths});
                                  sort rating desc;
                                  where cover != null;
                                  limit 4;", 'text/plain')->post('https://api.igdb.com/v4/games')->json();
                });

            $this->mostAnticipated = $this->formatForView($mostAnticipatedUnformatted);
        }


        private function formatForView($games)
        {
            return collect($games)->map(function ($game) {
                return collect($game)->merge([
                    'coverImageUrl' => Str::replacefirst('thumb', 'cover_small', $game['cover']['url']) ,
                    'release_date' => Carbon::parse($game['first_release_date'])->format('d M, Y')
                ]);
            })->toArray();
        }

        public function render()
        {
            return view('livewire.most-anticipated');
        }

    }
