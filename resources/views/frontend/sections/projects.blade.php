<section
    id="work"
    class="transition-colors duration-500 bg-white border-t  border-neutral-200 text-neutral-950 dark:border-neutral-800 dark:bg-neutral-950 dark:text-neutral-50"
>

    <div class="px-6 mx-auto max-w-7xl py-28 lg:px-8 lg:py-36">


        {{-- ============================================================
            Section Header
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
                    Selected Work
                </p>

            </div>


            <div class="lg:col-span-9">

                <h2
                    class="max-w-4xl text-3xl font-semibold tracking-tight  text-neutral-950 sm:text-4xl lg:text-5xl dark:text-neutral-50"
                >
                    Systems I've built,

                    <span
                        class=" text-neutral-400 dark:text-neutral-600"
                    >
                        problems I've solved.
                    </span>

                </h2>


                <p
                    class="max-w-2xl mt-6 text-lg leading-8  text-neutral-600 dark:text-neutral-400"
                >
                    A selection of applications and platforms I've worked on,
                    from business CMS platforms to complex operational systems.
                </p>

            </div>

        </div>


        {{-- ============================================================
            Projects
        ============================================================= --}}
        <div class="mt-20 space-y-6">

            @foreach($projects as $project)

                @if($loop->first)

                    {{-- ====================================================
                        Featured Project
                    ===================================================== --}}
                    <article
                        class="
                            group
                            overflow-hidden
                            rounded-[2rem]
                            bg-neutral-100
                            transition-colors
                            duration-500

                            dark:bg-neutral-900
                        "
                    >

                        <div class="grid lg:grid-cols-2">


                            {{-- =================================================
                                Project Preview
                            ================================================== --}}
                            <div
                                class="
                                    relative
                                    min-h-[360px]
                                    overflow-hidden
                                    bg-neutral-200
                                    lg:min-h-[520px]

                                    dark:bg-neutral-800
                                "
                            >

                                @if($project->image)

                                    <img
                                        src="{{ asset('storage/' . $project->image) }}"
                                        alt="{{ $project->title }}"
                                        class="object-cover w-full h-full transition duration-700  group-hover:scale-105"
                                    >

                                @else

                                    <div
                                        class="flex items-center justify-center h-full "
                                    >

                                        <div class="text-center">

                                            <p
                                                class="
                                                    text-xs
                                                    font-medium
                                                    uppercase
                                                    tracking-[0.25em]
                                                    text-neutral-400

                                                    dark:text-neutral-500
                                                "
                                            >
                                                Featured Project
                                            </p>

                                            <p
                                                class="mt-3 text-sm  text-neutral-500 dark:text-neutral-400"
                                            >
                                                Project Preview
                                            </p>

                                        </div>

                                    </div>

                                @endif

                            </div>


                            {{-- =================================================
                                Featured Content
                            ================================================== --}}
                            <div
                                class="flex flex-col justify-between p-8  sm:p-10 lg:p-14"
                            >

                                <div>

                                    {{-- Meta --}}
                                    <div class="flex items-center justify-between">

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
                                            01
                                        </span>

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
                                            Current Project
                                        </span>

                                    </div>


                                    {{-- Title --}}
                                    <h3
                                        class="max-w-lg mt-16 text-4xl font-semibold tracking-tight  text-neutral-950 sm:text-5xl dark:text-neutral-50"
                                    >
                                        {{ $project->title }}
                                    </h3>


                                    {{-- Description --}}
                                    <p
                                        class="max-w-xl mt-6 text-base leading-8  text-neutral-600 dark:text-neutral-400"
                                    >
                                        {{ $project->short_description }}
                                    </p>

                                </div>


                                {{-- =================================================
                                    Project Meta + Link
                                ================================================== --}}
                                <div class="mt-16">

                                    <div class="grid grid-cols-2 gap-8">


                                        {{-- Role --}}
                                        <div>

                                            <p
                                                class="
                                                    text-xs
                                                    font-medium
                                                    uppercase
                                                    tracking-[0.2em]
                                                    text-neutral-400

                                                    dark:text-neutral-500
                                                "
                                            >
                                                Role
                                            </p>

                                            <p
                                                class="mt-2 text-sm font-medium  text-neutral-950 dark:text-neutral-100"
                                            >
                                                {{ $project->role }}
                                            </p>

                                        </div>


                                        {{-- Type --}}
                                        <div>

                                            <p
                                                class="
                                                    text-xs
                                                    font-medium
                                                    uppercase
                                                    tracking-[0.2em]
                                                    text-neutral-400

                                                    dark:text-neutral-500
                                                "
                                            >
                                                Type
                                            </p>

                                            <p
                                                class="mt-2 text-sm font-medium  text-neutral-950 dark:text-neutral-100"
                                            >
                                                Web Platform
                                            </p>

                                        </div>

                                    </div>


                                    {{-- Project Link --}}
                                    <div
                                        class="pt-6 mt-10 border-t  border-neutral-300 dark:border-neutral-700"
                                    >

                                        <a
                                            href="#"
                                            class="flex items-center justify-between text-sm font-medium  text-neutral-950 group/link dark:text-neutral-50"
                                        >

                                            <span>
                                                View project
                                            </span>


                                            <span
                                                class="flex items-center justify-center w-10 h-10 transition duration-300 border rounded-full  border-neutral-300 group-hover/link:-translate-y-1 group-hover/link:translate-x-1 group-hover/link:border-neutral-950 dark:border-neutral-700 dark:group-hover/link:border-neutral-300"
                                            >
                                                ↗
                                            </span>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </article>


                @else

                    {{-- ====================================================
                        Other Projects
                    ===================================================== --}}
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

                            dark:border-neutral-800
                            dark:bg-neutral-950
                            dark:hover:border-neutral-600
                        "
                    >

                        <div
                            class="grid gap-8  lg:grid-cols-12 lg:items-center"
                        >


                            {{-- Number --}}
                            <div class="lg:col-span-1">

                                <span
                                    class="
                                        text-xs
                                        font-medium
                                        tracking-[0.2em]
                                        text-neutral-400

                                        dark:text-neutral-500
                                    "
                                >
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>

                            </div>


                            {{-- Title + Description --}}
                            <div class="lg:col-span-6">

                                <h3
                                    class="text-2xl font-semibold tracking-tight  text-neutral-950 dark:text-neutral-50"
                                >
                                    {{ $project->title }}
                                </h3>


                                <p
                                    class="max-w-xl mt-3 text-sm leading-7  text-neutral-600 dark:text-neutral-400"
                                >
                                    {{ $project->short_description }}
                                </p>

                            </div>


                            {{-- Role --}}
                            <div class="lg:col-span-2">

                                <p
                                    class="
                                        text-xs
                                        font-medium
                                        uppercase
                                        tracking-[0.2em]
                                        text-neutral-400

                                        dark:text-neutral-500
                                    "
                                >
                                    Role
                                </p>


                                <p
                                    class="mt-2 text-sm font-medium  text-neutral-950 dark:text-neutral-100"
                                >
                                    {{ $project->role }}
                                </p>

                            </div>


                            {{-- Arrow --}}
                            <div class="lg:col-span-3 lg:flex lg:justify-end">

                                <a
                                    href="#"
                                    class="inline-flex items-center gap-3 text-sm font-medium  text-neutral-950 group/link dark:text-neutral-50"
                                >

                                    View project


                                    <span
                                        class="flex items-center justify-center w-10 h-10 transition duration-300 border rounded-full  border-neutral-300 group-hover/link:translate-x-1 group-hover/link:border-neutral-950 dark:border-neutral-700 dark:group-hover/link:border-neutral-300"
                                    >
                                        ↗
                                    </span>

                                </a>

                            </div>

                        </div>

                    </article>

                @endif

            @endforeach

        </div>


        {{-- ============================================================
            Bottom
        ============================================================= --}}
        <div
            class="flex justify-between pt-8 mt-12 border-t  border-neutral-200 dark:border-neutral-800"
        >

            <p
                class="text-sm  text-neutral-500 dark:text-neutral-400"
            >
                More projects coming soon.
            </p>


            <span
                class="text-sm  text-neutral-400 dark:text-neutral-500"
            >
                {{ $projects->count() }} selected
            </span>

        </div>

    </div>

</section>
