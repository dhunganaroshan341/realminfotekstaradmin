@extends('frontend.layout.main')

@section('title', 'Writing — Roshan')

@section('content')

    {{-- Header --}}
    <section class="border-b border-neutral-200">

        <div class="px-6 pt-20 pb-24 mx-auto max-w-7xl lg:px-8 lg:pb-32 lg:pt-28">

            <div class="grid gap-8 lg:grid-cols-12 lg:gap-16">

                <div class="lg:col-span-3">

                    <p class="text-sm font-medium uppercase tracking-[0.25em] text-neutral-400">
                        Writing
                    </p>

                </div>

                <div class="lg:col-span-9">

                    <h1 class="max-w-5xl text-4xl font-semibold tracking-tight text-neutral-950 sm:text-5xl lg:text-7xl">

                        Things I've learned,
                        <span class="text-neutral-400">
                            built and figured out.
                        </span>

                    </h1>

                    <p class="max-w-2xl mt-8 text-lg leading-8 text-neutral-600">

                        Notes about software engineering, Laravel,
                        architecture, open source and lessons from
                        building real systems.

                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- Featured --}}
    @if($featuredPost)

        <section class="border-b border-neutral-200">

            <div class="px-6 py-20 mx-auto max-w-7xl lg:px-8 lg:py-28">

                <p class="text-xs font-medium uppercase tracking-[0.25em] text-neutral-400">
                    Featured
                </p>

                <article class="group mt-8 overflow-hidden rounded-[2rem] bg-neutral-100">

                    <div class="grid lg:grid-cols-2">

                        {{-- Image --}}
                        <div class="min-h-[320px] overflow-hidden bg-neutral-200 lg:min-h-[500px]">

                            @if($featuredPost->postImages->first())

                                <img
                                    src="{{ asset('storage/' . $featuredPost->postImages->first()->image) }}"
                                    alt="{{ $featuredPost->title }}"
                                    class="object-cover w-full h-full transition duration-700 group-hover:scale-105"
                                >

                            @else

                                <div class="flex items-center justify-center h-full">

                                    <span class="text-xs uppercase tracking-[0.25em] text-neutral-400">
                                        Writing
                                    </span>

                                </div>

                            @endif

                        </div>


                        {{-- Content --}}
                        <div class="flex flex-col justify-between p-8 sm:p-10 lg:p-14">

                            <div>

                                @if($featuredPost->category)

                                    <p class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400">
                                        {{ $featuredPost->category->title }}
                                    </p>

                                @endif

                                <h2 class="mt-8 text-4xl font-semibold tracking-tight text-neutral-950 sm:text-5xl">

                                    {{ $featuredPost->title }}

                                </h2>

                                <p class="max-w-xl mt-6 text-base leading-8 text-neutral-600">

                                    {{ Str::limit(strip_tags($featuredPost->description), 220) }}

                                </p>

                            </div>


                            <div class="mt-12">

                                <div class="flex items-center justify-between pt-6 border-t border-neutral-300">

                                    <span class="text-sm text-neutral-500">
                                        {{ $featuredPost->created_at->format('M Y') }}
                                    </span>

                                    <a
                                        href="{{ route('writing.show', $featuredPost) }}"
                                        class="inline-flex items-center gap-3 text-sm font-medium group/link text-neutral-950"
                                    >

                                        Read article

                                        <span class="transition-transform duration-300 group-hover/link:translate-x-1">
                                            →
                                        </span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </article>

            </div>

        </section>

    @endif


    {{-- Articles --}}
    <section>

        <div class="px-6 py-20 mx-auto max-w-7xl lg:px-8 lg:py-28">

            <div class="grid gap-16 lg:grid-cols-12">

                {{-- Category --}}
                <aside class="lg:col-span-3">

                    <p class="text-xs font-medium uppercase tracking-[0.25em] text-neutral-400">
                        Topics
                    </p>

                    <div class="mt-6 space-y-3">

                        @foreach($categories as $category)

                            <div class="flex items-center justify-between text-sm">

                                <span class="text-neutral-600">
                                    {{ $category->title }}
                                </span>

                                <span class="text-neutral-400">
                                    {{ $category->post_count }}
                                </span>

                            </div>

                        @endforeach

                    </div>

                </aside>


                {{-- Posts --}}
                <div class="lg:col-span-9">

                    <div class="divide-y divide-neutral-200">

                        @foreach($posts as $post)

                            <article class="py-8 group first:pt-0">

                                <div class="grid gap-6 sm:grid-cols-12 sm:items-center">

                                    <div class="sm:col-span-2">

                                        <p class="text-sm text-neutral-400">
                                            {{ $post->created_at->format('M Y') }}
                                        </p>

                                    </div>


                                    <div class="sm:col-span-7">

                                        @if($post->category)

                                            <p class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400">
                                                {{ $post->category->title }}
                                            </p>

                                        @endif

                                        <h2 class="mt-3 text-xl font-semibold tracking-tight text-neutral-950 sm:text-2xl">

                                            {{ $post->title }}

                                        </h2>

                                        <p class="mt-3 text-sm leading-7 text-neutral-600">

                                            {{ Str::limit(strip_tags($post->description), 150) }}

                                        </p>

                                    </div>


                                    <div class="sm:col-span-3 sm:flex sm:justify-end">

                                        <a
                                            href="{{ route('writing.show', $post) }}"
                                            class="inline-flex items-center gap-2 text-sm font-medium text-neutral-950"
                                        >

                                            Read

                                            <span>
                                                ↗
                                            </span>

                                        </a>

                                    </div>

                                </div>

                            </article>

                        @endforeach

                    </div>


                    <div class="mt-12">

                        {{ $posts->links() }}

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
