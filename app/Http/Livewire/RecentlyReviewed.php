<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public array $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $this->recentlyReviewed = Cache::remember('recenetly-reviewed', 7, function () use ($current, $before)  {
            return Http::withHeaders([
                'Client-ID' => 'lvx8bx341tm02wmkjwc8qesgvq8dhv',
                'Authorization' => 'Bearer efe78u9ta33m1rn6v91rznmjpe3vee',
            ])->withBody("fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary;
                                  where platforms = (48,49,130,6,9,14)
                                  & (first_release_date >= {$before}
                                  & first_release_date < {$current}
                                  & rating_count > 5);
                                  sort rating desc;
                                  limit 3;", 'text/plain')->post('https://api.igdb.com/v4/games')->json();
        });
    }
    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
