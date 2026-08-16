<section
    id="open-source"
    class="transition-colors duration-500 bg-white border-t  border-neutral-200 text-neutral-950 dark:border-neutral-800 dark:bg-neutral-950 dark:text-neutral-50"
>

    <div class="px-6 mx-auto max-w-7xl py-28 lg:px-8 lg:py-36">


        {{-- ============================================================
            Header
        ============================================================= --}}
        <div class="grid gap-8 lg:grid-cols-12 lg:gap-16">

            {{-- Label --}}
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
                    Open Source
                </p>

            </div>


            {{-- Heading --}}
            <div class="lg:col-span-9">

                <h2
                    class="max-w-4xl text-3xl font-semibold tracking-tight  text-neutral-950 sm:text-4xl lg:text-5xl dark:text-neutral-50"
                >
                    Tools I build for

                    <span
                        class=" text-neutral-400 dark:text-neutral-600"
                    >
                        other developers.
                    </span>

                </h2>


                <p
                    class="max-w-2xl mt-6 text-lg leading-8  text-neutral-600 dark:text-neutral-400"
                >
                    I enjoy turning useful ideas into reusable software
                    that can live beyond a single application.
                </p>

            </div>

        </div>


        {{-- ============================================================
            Packages
        ============================================================= --}}
        <div class="mt-20 space-y-4">

            @foreach($openSource as $package)

                <article
                    class="
                        group
                        rounded-[2rem]
                        border
                        border-neutral-200
                        bg-white
                        p-8
                        transition
                        duration-300

                        hover:border-neutral-400

                        sm:p-10
                        lg:p-12

                        dark:border-neutral-800
                        dark:bg-neutral-950
                        dark:hover:border-neutral-600
                    "
                >

                    <div
                        class="grid gap-10  lg:grid-cols-12 lg:items-center"
                    >


                        {{-- =================================================
                            Package Information
                        ================================================== --}}
                        <div class="lg:col-span-7">

                            {{-- Package Label --}}
                            <div class="flex items-center gap-3">

                                <span
                                    class="
                                        text-xs
                                        font-medium
                                        uppercase
                                        tracking-[0.2em]
                                        text-neutral-400

                                        dark:text-neutral-500
                                    "
                                >
                                    Package
                                </span>


                                <span
                                    class=" text-neutral-300 dark:text-neutral-700"
                                >
                                    /
                                </span>


                                <span
                                    class="text-xs  text-neutral-400 dark:text-neutral-500"
                                >
                                    {{ $package['package'] }}
                                </span>

                            </div>


                            {{-- Package Name --}}
                            <h3
                                class="mt-6 text-3xl font-semibold tracking-tight  text-neutral-950 sm:text-4xl dark:text-neutral-50"
                            >
                                {{ $package['name'] }}
                            </h3>


                            {{-- Description --}}
                            <p
                                class="max-w-2xl mt-5 text-base leading-7  text-neutral-600 dark:text-neutral-400"
                            >
                                {{ $package['description'] }}
                            </p>

                        </div>


                        {{-- =================================================
                            Meta
                        ================================================== --}}
                        <div class="lg:col-span-5 lg:flex lg:justify-end">

                            <div class="w-full max-w-sm">


                                {{-- Technologies --}}
                                <div class="flex flex-wrap gap-2">

                                    @foreach($package['technologies'] as $technology)

                                        <span
                                            class="px-4 py-2 text-xs font-medium rounded-full  bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-300"
                                        >
                                            {{ $technology }}
                                        </span>

                                    @endforeach

                                </div>


                                {{-- Links --}}
                                <div
                                    class="flex items-center gap-6 pt-6 mt-8 border-t  border-neutral-200 dark:border-neutral-800"
                                >

                                    {{-- GitHub --}}
                                    <a
                                        href="{{ $package['github_url'] }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-flex items-center gap-2 text-sm font-medium  text-neutral-950 group/link dark:text-neutral-50"
                                    >

                                        GitHub

                                        <span
                                            class="transition-transform duration-300  group-hover/link:translate-x-1"
                                        >
                                            ↗
                                        </span>

                                    </a>


                                    {{-- Packagist --}}
                                    <a
                                        href="{{ $package['packagist_url'] }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-flex items-center gap-2 text-sm font-medium  text-neutral-950 group/link dark:text-neutral-50"
                                    >

                                        Packagist

                                        <span
                                            class="transition-transform duration-300  group-hover/link:translate-x-1"
                                        >
                                            ↗
                                        </span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>
