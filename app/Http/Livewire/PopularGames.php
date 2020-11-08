<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames() {

        $before = Carbon::now()->subMonths(12)->timestamp;
        $after = Carbon::now()->addMonths(12)->timestamp;

        $this->popularGames = Http::withHeaders(config('services.igdb'))
        ->withBody(
            "
                fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, total_rating;

                where platforms = (45,48,49,130,165,163,6) 
                    & (first_release_date >= {$before} & first_release_date < {$after})
                    & total_rating > 50
                ;

                sort total_rating desc;
                limit 12;
            ",
            "text/plain"
        )->post('https://api.igdb.com/v4/games')->json();
    }

    public function render() {

        return view('livewire.popular-games');
    }
}
