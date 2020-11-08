<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon() {
        $current = Carbon::now()->timestamp;
        $soon = Carbon::now()->addMonths(2)->timestamp;

        $this->comingSoon = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                    fields name, cover.url, first_release_date, total_rating_count, total_rating, platforms.abbreviation, rating, rating_count, summary, hypes;

                    where platforms = (45,48,49,130,165,163,6) 
                        & (first_release_date > {$current} & first_release_date < {$soon})
                        & hypes > 10
                    ;

                    sort first_release_date asc;
                    limit 3;
                ",
                "text/plain"
            )->post('https://api.igdb.com/v4/games')->json();
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
