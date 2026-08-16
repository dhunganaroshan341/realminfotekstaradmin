@extends('frontend.layout.main')

@section('title', 'Projects — Roshan')

@section('content')

    <section class="border-b border-neutral-200">

        <div class="px-6 pt-20 pb-24 mx-auto max-w-7xl lg:px-8 lg:pb-32 lg:pt-28">

            <div class="grid gap-8 lg:grid-cols-12 lg:gap-16">

                <div class="lg:col-span-3">

                    <p class="text-sm font-medium uppercase tracking-[0.25em] text-neutral-400">
                        Projects
                    </p>

                </div>


                <div class="lg:col-span-9">

                    <h1 class="max-w-5xl text-4xl font-semibold tracking-tight text-neutral-950 sm:text-5xl lg:text-7xl">

                        A collection of
                        <span class="text-neutral-400">
                            things I've built.
                        </span>

                    </h1>

                    <p class="max-w-2xl mt-8 text-lg leading-8 text-neutral-600">

                        From business CMS platforms to mobility systems
                        and multi-branch applications, these are some of
                        the projects I've worked on throughout my journey.

                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- Projects --}}
    <section>

        <div class="px-6 py-20 mx-auto max-w-7xl lg:px-8 lg:py-28">

            <div class="space-y-6">

                @foreach($projects as $project)

                    <article class="group overflow-hidden rounded-[2rem] bg-neutral-100">

                        <div class="grid lg:grid-cols-12">

                            {{-- Image --}}
                            <div class="relative min-h-[280px] overflow-hidden bg-neutral-200 lg:col-span-5 lg:min-h-[380px]">

                                @if($project->image)

                                    <img
                                        src="{{ asset('storage/' . $project->image) }}"
                                        alt="{{ $project->title }}"
                                        class="object-cover w-full h-full transition duration-700 group-hover:scale-105"
                                    >

                                @else

                                    <div class="flex items-center justify-center h-full">

                                        <div class="text-center">

                                            <p class="text-xs font-medium uppercase tracking-[0.25em] text-neutral-400">
                                                Project
                                            </p>

                                            <p class="mt-3 text-sm text-neutral-500">
                                                Preview coming soon
                                            </p>

                                        </div>

                                    </div>

                                @endif

                            </div>


                            {{-- Content --}}
                            <div class="flex flex-col justify-between p-8 sm:p-10 lg:col-span-7 lg:p-14">

                                <div>

                                    <div class="flex items-center justify-between">

                                        <span class="text-xs font-medium tracking-[0.2em] text-neutral-400">
                                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </span>

                                        @if($project->is_featured)

                                            <span class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400">
                                                Featured
                                            </span>

                                        @endif

                                    </div>


                                    <h2 class="mt-12 text-3xl font-semibold tracking-tight text-neutral-950 sm:text-4xl">

                                        {{ $project->title }}

                                    </h2>


                                    <p class="max-w-2xl mt-6 text-base leading-8 text-neutral-600">

                                        {{ $project->description }}

                                    </p>

                                </div>


                                <div class="mt-12">

                                    <div class="flex flex-wrap gap-x-12 gap-y-6">

                                        <div>

                                            <p class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400">
                                                Role
                                            </p>

                                            <p class="mt-2 text-sm font-medium text-neutral-950">
                                                {{ $project->role }}
                                            </p>

                                        </div>


                                        @if($project->project_url)

                                            <div>

                                                <p class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400">
                                                    Website
                                                </p>

                                                <a
                                                    href="{{ $project->project_url }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    class="inline-flex items-center gap-2 mt-2 text-sm font-medium text-neutral-950"
                                                >
                                                    Visit project ↗
                                                </a>

                                            </div>

                                        @endif


                                        @if($project->github_url)

                                            <div>

                                                <p class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400">
                                                    Source
                                                </p>

                                                <a
                                                    href="{{ $project->github_url }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    class="inline-flex items-center gap-2 mt-2 text-sm font-medium text-neutral-950"
                                                >
                                                    GitHub ↗
                                                </a>

                                            </div>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>

        </div>

    </section>

@endsection
