<?php

    namespace App\Http\Livewire;

    use Illuminate\Support\Facades\Http;
    use Livewire\Component;

    class SearchDropdown extends Component
    {

        public string $search = '';
        public array $searchResults = [];

        public function render()
        {
            if(strlen($this->search) >= 2) {
                $this->searchResults = Http::withHeaders([
                    'Client-ID' => 'lvx8bx341tm02wmkjwc8qesgvq8dhv',
                    'Authorization' => 'Bearer efe78u9ta33m1rn6v91rznmjpe3vee',
                ])->withBody("search \"{$this->search}\";
                                      fields name, cover.url, slug;
                                      limit 10;", 'text/plain')->post('https://api.igdb.com/v4/games')->json();
            }

            return view('livewire.search-dropdown');
        }

    }
