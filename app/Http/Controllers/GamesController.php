<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $before = Carbon::now()->subMonths(12)->timestamp;
        $current = Carbon::now()->timestamp;
        $soon = Carbon::now()->addMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(12)->timestamp;

        $popularGames = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                    fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, total_rating;

                    where platforms = (45,48,49,130,165,163,6) 
                        & (first_release_date >={$before} & first_release_date < {$after})
                        & total_rating_count > 50
                    ;

                    sort total_rating_count desc;
                    limit 12;
                ",
                "text/plain"
            )->post('https://api.igdb.com/v4/games')->json();

        $recentlyReviewed = Http::withHeaders(config('services.igdb'))
            ->withBody(
                "
                    fields name, cover.url, first_release_date, total_rating_count, total_rating, platforms.abbreviation, rating, rating_count,summary;

                    where platforms = (45,48,49,130,165,163,6) 
                        & (first_release_date >={$before} & first_release_date < {$current})
                        & rating_count > 5
                    ;

                    sort total_rating_count desc;
                    limit 3;
                ",
                "text/plain"
            )->post('https://api.igdb.com/v4/games')->json();

        $mostAnticiapted = Http::withHeaders(config('services.igdb'))
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

        $comingSoon = Http::withHeaders(config('services.igdb'))
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

        return view('games.index')->with(compact('popularGames','recentlyReviewed', 'mostAnticiapted','comingSoon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
