<div wire:init='loadMostAnticipated'>
    @foreach($mostAnticipated as $game)
        <div class="game flex">
            <a href="/game">
                <img class="w-16 hover:opacity-75 transition ease-in-out duration-150" 
                src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}" alt="">
            </a>
            <div class="ml-4">
                <a class="text-sm font-semibold leading-tight hover:text-gray-400 mt-8" href="#">{{ $game['name'] }}</a>
                <p class="text-sm text-gray-400 mt-1" href="#">{{ Carbon\Carbon::parse($game['first_release_date'])->format('M d,Y') }}</p>
            </div>
        </div> <!-- end game -->
    @endforeach
</div>
