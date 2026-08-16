<section id="about" class="border-t border-neutral-200">

    <div class="px-6 mx-auto max-w-7xl py-28 lg:px-8 lg:py-36">

        <div class="grid gap-16 lg:grid-cols-12 lg:gap-20">

            {{-- Section Label --}}
            <div class="lg:col-span-3">

                <p class="text-sm font-medium uppercase tracking-[0.25em] text-neutral-400">
                    About
                </p>

            </div>


            {{-- Content --}}
            <div class="lg:col-span-9">

                <h2 class="max-w-4xl text-3xl font-semibold tracking-tight text-neutral-950 sm:text-4xl lg:text-5xl">
                    Building things that are
                    <span class="text-neutral-400">
                        useful, reliable, and built to last.
                    </span>
                </h2>


                <div class="grid gap-10 mt-10 md:grid-cols-2">

                    <div>
                        <p class="text-lg leading-8 text-neutral-600">
                            {{ $setting?->description }}
                        </p>
                    </div>

                    <div>
                        <p class="text-lg leading-8 text-neutral-600">
                            {{ $setting?->work_description }}
                        </p>
                    </div>

                </div>


                {{-- Small details --}}
                <div class="grid gap-8 pt-8 border-t mt-14 border-neutral-200 sm:grid-cols-3">

                    <div>
                        <p class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400">
                            Based in
                        </p>

                        <p class="mt-2 text-sm font-medium text-neutral-950">
                            {{ $setting?->address }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400">
                            Focus
                        </p>

                        <p class="mt-2 text-sm font-medium text-neutral-950">
                            Laravel · Backend · APIs
                        </p>
                    </div>


                    <div>
                        <p class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400">
                            Currently
                        </p>

                        <p class="mt-2 text-sm font-medium text-neutral-950">
                            Building & learning
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
