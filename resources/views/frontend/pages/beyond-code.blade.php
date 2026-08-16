@extends('frontend.layout.main')

@section('title', 'Beyond Code — Roshan')

@section('content')

    {{-- ============================================================
        Hero
    ============================================================= --}}
    <section
        class="bg-white border-b border-neutral-200 dark:border-neutral-800 dark:bg-neutral-950"
    >

        <div class="px-6 pt-20 mx-auto max-w-7xl pb-28 lg:px-8 lg:pb-40 lg:pt-32">

            <div class="grid gap-10 lg:grid-cols-12 lg:gap-16">

                <div class="lg:col-span-3">

                    <p
                        class="
                            text-sm
                            font-medium
                            uppercase
                            tracking-[0.25em]
                            text-neutral-400
                            dark:text-neutral-500
                        "
                    >
                        Beyond Code
                    </p>

                </div>

                <div class="lg:col-span-9">

                    <h1
                        class="max-w-5xl text-5xl font-semibold tracking-tight text-neutral-950 sm:text-6xl lg:text-8xl dark:text-neutral-50"
                    >

                        There is more to me

                        <span class="text-neutral-400 dark:text-neutral-600">
                            than software.
                        </span>

                    </h1>

                    <p
                        class="max-w-2xl mt-8 text-lg leading-8 text-neutral-600 dark:text-neutral-400"
                    >
                        When I'm not building software, I like to explore
                        photography, music, sketching and the small things
                        that make life interesting.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- ============================================================
        Photography
    ============================================================= --}}
    <section
        class="bg-white border-b border-neutral-200 dark:border-neutral-800 dark:bg-neutral-950"
    >

        <div class="px-6 mx-auto max-w-7xl py-28 lg:px-8 lg:py-36">

            <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">

                <div class="lg:col-span-3">

                    <p
                        class="
                            text-sm
                            font-medium
                            uppercase
                            tracking-[0.25em]
                            text-neutral-400
                            dark:text-neutral-500
                        "
                    >
                        Photography
                    </p>

                </div>

                <div class="lg:col-span-9">

                    <h2
                        class="max-w-3xl text-3xl font-semibold tracking-tight text-neutral-950 sm:text-4xl dark:text-neutral-50"
                    >
                        Sometimes I slow down
                        and just observe.
                    </h2>

                    <p
                        class="max-w-2xl mt-6 text-base leading-8 text-neutral-600 dark:text-neutral-400"
                    >
                        Photography gives me a reason to pay attention
                        to things I might otherwise walk past.
                    </p>


                    {{-- Cloud video --}}
                    <div
                        class="
                            mt-12
                            overflow-hidden
                            rounded-[2rem]
                            bg-neutral-100
                            dark:bg-neutral-900
                        "
                    >

                        <video
                            class="object-cover w-full aspect-video"
                            autoplay
                            muted
                            loop
                            playsinline
                            preload="metadata"
                        >
                            <source
                                src="{{ asset('assets/videos/clouds-timelapse.mp4') }}"
                                type="video/mp4"
                            >
                        </video>

                    </div>

                    <p
                        class="
                            mt-4
                            text-xs
                            uppercase
                            tracking-[0.2em]
                            text-neutral-400
                            dark:text-neutral-500
                        "
                    >
                        Clouds · Timelapse
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- ============================================================
        Music
    ============================================================= --}}
    <section
        class="border-b border-neutral-200 bg-neutral-50 dark:border-neutral-800 dark:bg-neutral-900"
    >

        <div class="px-6 mx-auto max-w-7xl py-28 lg:px-8 lg:py-36">

            <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">

                <div class="lg:col-span-3">

                    <p
                        class="
                            text-sm
                            font-medium
                            uppercase
                            tracking-[0.25em]
                            text-neutral-400
                            dark:text-neutral-500
                        "
                    >
                        Music
                    </p>

                </div>

                <div class="lg:col-span-9">

                    <h2
                        class="max-w-3xl text-3xl font-semibold tracking-tight text-neutral-950 sm:text-4xl dark:text-neutral-50"
                    >
                        Things I listen to
                        while building things.
                    </h2>

                    <p
                        class="max-w-2xl mt-6 text-base leading-8 text-neutral-600 dark:text-neutral-400"
                    >
                        Music is usually somewhere in the background
                        when I'm coding, learning or just thinking.
                    </p>

                    <div class="mt-10">

                        <a
                            href="{{ route('songs') }}"
                            class="inline-flex items-center gap-3 text-sm font-medium group text-neutral-950 dark:text-neutral-50"
                        >

                            Explore my playlist

                            <span
                                class="transition-transform duration-300 group-hover:translate-x-1"
                            >
                                ↗
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ============================================================
        Sketching
    ============================================================= --}}
    <section
        class="bg-white border-b border-neutral-200 dark:border-neutral-800 dark:bg-neutral-950"
    >

        <div class="px-6 mx-auto max-w-7xl py-28 lg:px-8 lg:py-36">

            <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">

                <div class="lg:col-span-3">

                    <p
                        class="
                            text-sm
                            font-medium
                            uppercase
                            tracking-[0.25em]
                            text-neutral-400
                            dark:text-neutral-500
                        "
                    >
                        Sketching
                    </p>

                </div>

                <div class="lg:col-span-9">

                    <h2
                        class="max-w-3xl text-3xl font-semibold tracking-tight text-neutral-950 sm:text-4xl dark:text-neutral-50"
                    >
                        Making things without
                        worrying about whether they're useful.
                    </h2>

                    <p
                        class="max-w-2xl mt-6 text-base leading-8 text-neutral-600 dark:text-neutral-400"
                    >
                        Drawing gives me a completely different way
                        of thinking. No APIs, no database schemas,
                        no requirements — just observation and practice.
                    </p>


                    <div class="grid gap-4 mt-12 sm:grid-cols-2">

                        <div
                            class="
                                flex
                                aspect-square
                                items-center
                                justify-center
                                rounded-[2rem]
                                bg-neutral-100
                                dark:bg-neutral-900
                            "
                        >

                            <span
                                class="
                                    text-xs
                                    uppercase
                                    tracking-[0.2em]
                                    text-neutral-400
                                    dark:text-neutral-500
                                "
                            >
                                Sketch
                            </span>

                        </div>

                        <div
                            class="
                                flex
                                aspect-square
                                items-center
                                justify-center
                                rounded-[2rem]
                                bg-neutral-100
                                dark:bg-neutral-900
                            "
                        >

                            <span
                                class="
                                    text-xs
                                    uppercase
                                    tracking-[0.2em]
                                    text-neutral-400
                                    dark:text-neutral-500
                                "
                            >
                                More coming
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ============================================================
        Closing
    ============================================================= --}}
    <section
        class="bg-white dark:bg-neutral-950"
    >

        <div class="px-6 mx-auto max-w-7xl py-28 lg:px-8 lg:py-40">

            <div class="max-w-4xl">

                <p
                    class="text-3xl font-medium leading-tight tracking-tight text-neutral-950 sm:text-4xl lg:text-5xl dark:text-neutral-50"
                >
                    Curiosity is probably the thing
                    that connects all of it.
                </p>

                <p
                    class="max-w-2xl mt-8 text-base leading-8 text-neutral-600 dark:text-neutral-400"
                >
                    Whether I'm debugging a backend system, learning
                    an instrument, taking a photograph or sketching
                    something — I'm usually trying to understand
                    how things work.
                </p>

            </div>

        </div>

    </section>

@endsection
