@extends('layouts.layout')

@section('title')
    Games
@endsection

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
            @for ($i = 1; $i <= 12; $i++)
                <div class="game mx-auto mt-8">
                    <div class="relative inline-block">
                        <a href="/game">
                            <img class="w-48 hover:opacity-75 transition ease-in-out duration-150" src="/assets/resident.jpg" alt="">
                        </a>
                        <div class="absolute right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: 60px">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                80%
                            </div>
                        </div>
                        <a class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8" href="#">Resident Evil 3</a>
                        <div class="text-gray-400 mt-1">PS4</div>
                    </div>
                </div>
            @endfor
        </div> <!-- end popular games -->

        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
                <div class="recently-reviewed-container space-y-12 mt-8">
                    @for($i=1; $i <= 3; $i++)
                        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                            <div class="relative flex-none">
                                <a href="/game">
                                    <img class="w-48 hover:opacity-75 transition ease-in-out duration-150" src="/assets/resident.jpg" alt="">
                                </a>
                                <div class="absolute right-0 w-16 h-16 bg-gray-900 rounded-full" style="right:-20px; bottom: -20px">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        80%
                                    </div>
                                </div>
                            </div>
                            <div class="ml-6">
                                <a class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4" href="/game">Resident Evil 3</a>
                                <div class="text-gray-400 mt-1">PS4</div>
                                <p class="mt-4 text-gray-400 hidden lg:block">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt cumque ipsum excepturi aperiam numquam similique, dicta ullam voluptas. Repellat vel eaque iste vero sequi quibusdam soluta, quo neque consequatur mollitia temporibus. Saepe, quam esse. Tempore dicta assumenda sit temporibus, corporis cum repudiandae.
                                </p>
                            </div>
                        </div> <!-- end card -->
                    @endfor
                </div><!-- end recently review -->
            </div>

            <aside class="right-sidebar w-full lg:w-1/4 mt-8 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticiapted</h2>
                <div class="most-anticiapted-container space-y-10 mt-8 mb-8">
                    @for($i=1; $i <= 4; $i++)
                        <div class="game flex">
                            <a href="/game">
                                <img class="w-16 hover:opacity-75 transition ease-in-out duration-150" src="/assets/resident.jpg" alt="">
                            </a>
                            <div class="ml-4">
                                <a class="text-sm font-semibold leading-tight hover:text-gray-400 mt-8" href="#">Resident Evil 3</a>
                                <p class="text-sm text-gray-400 mt-1" href="#">Sept 16,2020</p>
                            </div>
                                
                        </div> <!-- end game -->
                    @endfor
                </div>
    
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Coming Soon</h2>
                <div class="most-anticiapted-container space-y-10 mt-8">
                    @for($i=1; $i <= 4; $i++)
                        <div class="game mx-auto flex">
                            <a href="/game">
                                <img class="w-16 hover:opacity-75 transition ease-in-out duration-150" src="/assets/resident.jpg" alt="">
                            </a>
                            <div class="ml-4">
                                <a class="text-sm font-semibold leading-tight hover:text-gray-400 mt-8" href="#">Resident Evil 3</a>
                                <p class="text-sm text-gray-400 mt-1" href="#">Sept 16,2020</p>
                            </div>
                        </div> <!-- end game -->
                    @endfor
                </div><!-- end coming soon -->
            </aside>
        </div> <!-- end flex box -->
    </div> <!-- end container -->
@endsection