<section
    id="experience"
    class="transition-colors duration-500 bg-white border-t  border-neutral-200 text-neutral-950 dark:border-neutral-800 dark:bg-neutral-950 dark:text-neutral-50"
>

    <div class="px-6 mx-auto max-w-7xl py-28 lg:px-8 lg:py-36">


        {{-- ============================================================
            Header
        ============================================================= --}}
        <div class="grid gap-8 lg:grid-cols-12 lg:gap-16">

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
                    Experience
                </p>

            </div>


            <div class="lg:col-span-9">

                <h2
                    class="max-w-4xl text-3xl font-semibold tracking-tight  text-neutral-950 sm:text-4xl lg:text-5xl dark:text-neutral-50"
                >
                    Places I've worked,

                    <span
                        class=" text-neutral-400 dark:text-neutral-600"
                    >
                        systems I've helped build.
                    </span>

                </h2>


                <p
                    class="max-w-2xl mt-6 text-lg leading-8  text-neutral-600 dark:text-neutral-400"
                >
                    My professional journey has taken me from building
                    content-driven websites to working on larger
                    business and operational systems.
                </p>

            </div>

        </div>


        {{-- ============================================================
            Experience
        ============================================================= --}}
        <div class="mt-20">


            {{-- ========================================================
                Peakora Tech
            ========================================================= --}}
            <article
                class="grid gap-8 py-10 border-t  border-neutral-200 lg:grid-cols-12 lg:gap-16 dark:border-neutral-800"
            >

                {{-- Date --}}
                <div class="lg:col-span-3">

                    <p
                        class="text-sm font-medium  text-neutral-950 dark:text-neutral-100"
                    >
                        2025 — Present
                    </p>


                    <p
                        class="mt-2 text-sm  text-neutral-400 dark:text-neutral-500"
                    >
                        Kathmandu, Nepal
                    </p>

                </div>


                {{-- Content --}}
                <div class="lg:col-span-9">

                    <div
                        class="flex flex-col justify-between gap-3  sm:flex-row sm:items-start"
                    >

                        <div>

                            <h3
                                class="text-2xl font-semibold tracking-tight  text-neutral-950 dark:text-neutral-50"
                            >
                                Peakora Tech
                            </h3>


                            <p
                                class="mt-1 text-sm  text-neutral-500 dark:text-neutral-400"
                            >
                                Laravel Developer
                            </p>

                        </div>


                        {{-- Current --}}
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
                            Current
                        </span>

                    </div>


                    <p
                        class="max-w-2xl mt-6 text-base leading-8  text-neutral-600 dark:text-neutral-400"
                    >
                        Building backend systems and APIs for business
                        applications, including a multi-branch restaurant
                        platform with ordering, reservations, payments,
                        notifications and staff operations.
                    </p>


                    {{-- Technologies --}}
                    <div class="flex flex-wrap gap-2 mt-8">

                        @foreach([
                            'Laravel',
                            'PHP',
                            'MySQL',
                            'REST APIs',
                            'Sanctum',
                            'Payments'
                        ] as $technology)

                            <span
                                class="px-4 py-2 text-xs font-medium rounded-full  bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-300"
                            >
                                {{ $technology }}
                            </span>

                        @endforeach

                    </div>

                </div>

            </article>


            {{-- ========================================================
                Realminfotech
            ========================================================= --}}
            <article
                class="grid gap-8 py-10 border-t  border-neutral-200 lg:grid-cols-12 lg:gap-16 dark:border-neutral-800"
            >

                {{-- Date --}}
                <div class="lg:col-span-3">

                    <p
                        class="text-sm font-medium  text-neutral-950 dark:text-neutral-100"
                    >
                        2024 — 2025
                    </p>


                    <p
                        class="mt-2 text-sm  text-neutral-400 dark:text-neutral-500"
                    >
                        Kathmandu, Nepal
                    </p>

                </div>


                {{-- Content --}}
                <div class="lg:col-span-9">

                    <h3
                        class="text-2xl font-semibold tracking-tight  text-neutral-950 dark:text-neutral-50"
                    >
                        Realminfotech
                    </h3>


                    <p
                        class="mt-1 text-sm  text-neutral-500 dark:text-neutral-400"
                    >
                        Laravel Developer
                    </p>


                    <p
                        class="max-w-2xl mt-6 text-base leading-8  text-neutral-600 dark:text-neutral-400"
                    >
                        Worked on Laravel-based CMS platforms and
                        business applications across different domains,
                        including hospitality, education, travel,
                        commercial spaces and other content-driven systems.
                    </p>


                    {{-- Technologies --}}
                    <div class="flex flex-wrap gap-2 mt-8">

                        @foreach([
                            'Laravel',
                            'PHP',
                            'MySQL',
                            'REST APIs',
                            'CMS'
                        ] as $technology)

                            <span
                                class="px-4 py-2 text-xs font-medium rounded-full  bg-neutral-100 text-neutral-600 dark:bg-neutral-800 dark:text-neutral-300"
                            >
                                {{ $technology }}
                            </span>

                        @endforeach

                    </div>

                </div>

            </article>


        </div>

    </div>

</section>
