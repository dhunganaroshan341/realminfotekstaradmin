@extends('frontend.layout.main')

@section('title', 'Songs — Roshan')

@section('content')

<section
    id="songs-app"
    data-songs='@json($songs)'
    class="min-h-screen transition-colors duration-300 bg-white border-b border-neutral-200 text-neutral-950 dark:border-neutral-800 dark:bg-neutral-950 dark:text-neutral-50"
>

    <div class="px-6 py-20 mx-auto max-w-7xl lg:px-8 lg:py-28">

        {{-- Hero --}}
        <div class="max-w-4xl">

            <p class="text-sm font-medium uppercase tracking-[0.25em]
                      text-neutral-400 dark:text-neutral-500">
                Songs
            </p>

            <h1 class="mt-8 text-5xl font-semibold tracking-tight text-neutral-950 sm:text-6xl lg:text-8xl dark:text-neutral-50">

                Things I've been

                <span class="text-neutral-400 dark:text-neutral-600">
                    listening to.
                </span>

            </h1>

            <p class="max-w-2xl mt-8 text-lg leading-8 text-neutral-600 dark:text-neutral-400">

                A small collection of songs that keep me company
                while coding, learning, thinking and wandering.

            </p>

        </div>


        {{-- Player --}}
        <div id="music-player" class="mt-20">
        </div>


        {{-- YouTube API player --}}
        <div
            id="youtube-player"
            class="fixed w-px h-px overflow-hidden pointer-events-none
                   -left-[9999px] -top-[9999px]"
            aria-hidden="true"
        ></div>

    </div>

</section>

@endsection

@push('scripts')

    <script src="https://www.youtube.com/iframe_api"></script>

    @vite('resources/js/songs.js')

@endpush
