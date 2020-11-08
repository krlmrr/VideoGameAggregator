<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated() {

        $current = Carbon::now()->timestamp;

        $this->mostAnticipated = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                    fields name, cover.url, first_release_date, total_rating_count, total_rating, platforms.abbreviation, rating, rating_count, summary, hypes;

                    where platforms = (45,48,49,130,165,163,6) 
                        & (first_release_date >={$current})
                        & hypes > 50
                    ;

                    sort hypes desc;
                    limit 6;
                ",
                "text/plain"
            )->post('https://api.igdb.com/v4/games')->json();

    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
