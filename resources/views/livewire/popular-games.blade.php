<div wire:init='loadPopularGames' class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
    @forelse ($popularGames as $game)
        <div class="game mx-auto mt-8">
            <div class="relative inline-block">
                <a href="/game">
                    <img class="w-48 hover:opacity-75 transition ease-in-out duration-150" src="{{ Str::replaceFirst('thumb', 'cover_big',$game['cover']['url']) }}" alt="">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        {{ round($game['total_rating']) }}%
                    </div>
                </div>
            </div>
            <a class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8" href="#">{{ $game['name'] }}</a>
            <div class="text-gray-400 mt-1">
                @foreach($game['platforms'] as $platform)
                    @if(array_key_exists('abbreviation', $platform))
                        {{ $platform['abbreviation'] }}, 
                    @endif
                @endforeach
            </div>
        </div>
        @empty
            <div class="spinner mt-8"></div>
    @endforelse
</div> <!-- end popular games -->