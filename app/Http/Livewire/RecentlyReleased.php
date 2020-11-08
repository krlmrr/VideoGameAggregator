<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecentlyReleased extends Component
{
    public $recentlyReleased = [];

    public function loadRecentlyReleased() {

        $lastMonths = Carbon::now()->subMonths(3)->timestamp;
        $current = Carbon::now()->timestamp;

        $this->recentlyReleased = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                    fields name, cover.url, first_release_date, total_rating_count, total_rating, platforms.abbreviation, rating, rating_count,summary;

                    where platforms = (45,48,49,130,165,163,6) 
                        & (first_release_date >={$lastMonths} & first_release_date < {$current})
                        & total_rating_count > 30
                    ;

                    sort first_release_date desc;
                    limit 3;
                ",
                "text/plain"
            )->post('https://api.igdb.com/v4/games')->json();
    }

    public function render() {
        return view('livewire.recently-released');
    }
}
