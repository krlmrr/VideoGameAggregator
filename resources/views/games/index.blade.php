@extends('layouts.layout')

@section('title')
    Games
@endsection

@section('content')

    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>

        <livewire:popular-games>

        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Released</h2>

                <livewire:recently-released>

            </div>

            <aside class="right-sidebar flex flex-row flex-wrap lg:flex-col w-full lg:w-1/4 mt-8 lg:mt-0 px-4 lg:mx-0 ">
                <div class="most-anticiapted-container space-y-10 mb-0 lg:mb-8">
                    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>

                    <livewire:most-anticipated>

                </div>
                
                <div class="most-anticiapted-container mt-8 space-y-10">
                    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Coming Soon</h2>
                    
                    <livewire:coming-soon>

                </div><!-- end coming soon -->
            </aside>
        </div>
    </div> <!-- end container -->
@endsection