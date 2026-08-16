<section class="relative min-h-screen pt-24 overflow-hidden">

    <div class="mx-auto flex min-h-[calc(100vh-6rem)] max-w-7xl items-center px-6 lg:px-8">

        <div class="grid items-center w-full gap-16 lg:grid-cols-2">

            {{-- Content --}}
            <div>

                @if($pageBanner?->title)
                    <p class="mb-6 text-sm font-medium uppercase tracking-[0.3em] text-neutral-500">
                        Laravel Developer
                    </p>

                    <h1 class="max-w-4xl text-5xl font-semibold tracking-[-0.04em] text-neutral-950 sm:text-6xl lg:text-7xl">
                        {{ $pageBanner->title }}
                    </h1>
                @endif

                @if($pageBanner?->description)
                    <p class="max-w-xl mt-8 text-lg leading-8 text-neutral-600">
                        {{ $pageBanner->description }}
                    </p>
                @endif

                <div class="flex flex-wrap gap-4 mt-10">

                    <a
                        href="#work"
                        class="inline-flex items-center rounded-full bg-neutral-950 px-6 py-3.5 text-sm font-medium text-white transition duration-300 hover:-translate-y-0.5 hover:bg-neutral-800"
                    >
                        View my work
                        <span class="ml-3">↗</span>
                    </a>

                    <a
                        href="#contact"
                        class="inline-flex items-center rounded-full border border-neutral-300 px-6 py-3.5 text-sm font-medium text-neutral-900 transition duration-300 hover:border-neutral-950"
                    >
                        Let's talk
                    </a>

                </div>

            </div>

            {{-- Image --}}
            <div class="flex justify-center lg:justify-end">

                @if($pageBanner?->image)

                    <div class="aspect-[4/5] w-full max-w-md overflow-hidden rounded-[2rem] bg-neutral-100">

                        <img
                            src="{{ asset('uploads/' . $pageBanner->image) }}"
                            alt="{{ $pageBanner->title }}"
                            class="object-cover w-full h-full"
                        >

                    </div>

                @else

                    <div class="flex aspect-[4/5] w-full max-w-md items-center justify-center rounded-[2rem] bg-neutral-100">
                        <span class="text-sm text-neutral-400">
                            Your image
                        </span>
                    </div>

                @endif

            </div>

        </div>

    </div>

    {{-- Scroll indicator --}}
    <div class="absolute hidden -translate-x-1/2 bottom-8 left-1/2 md:block">
        <a
            href="#work"
            class="text-xs uppercase tracking-[0.25em] text-neutral-400 hover:text-neutral-950"
        >
            Scroll to explore ↓
        </a>
    </div>

</section>
