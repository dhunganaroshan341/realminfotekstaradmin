<section
    id="contact"
    class="transition-colors duration-500 bg-white border-t  border-neutral-200 text-neutral-950 dark:border-neutral-800 dark:bg-neutral-950 dark:text-neutral-50"
>

    <div class="px-6 mx-auto max-w-7xl py-28 lg:px-8 lg:py-36">

        {{-- ============================================================
            Header
        ============================================================= --}}
        <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">

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
                    Contact
                </p>

            </div>


            {{-- Main Content --}}
            <div class="lg:col-span-9">

                <h2
                    class="max-w-4xl text-4xl font-semibold tracking-tight  text-neutral-950 sm:text-5xl lg:text-6xl dark:text-neutral-50"
                >
                    Have a project in mind?

                    <span
                        class=" text-neutral-400 dark:text-neutral-600"
                    >
                        Let's talk.
                    </span>
                </h2>


                <p
                    class="max-w-2xl mt-6 text-lg leading-8  text-neutral-600 dark:text-neutral-400"
                >
                    Whether you're building a product, need help with
                    a Laravel application, or simply want to talk about
                    an idea, I'd be happy to hear from you.
                </p>


                {{-- ========================================================
                    Contact Grid
                ========================================================= --}}
                <div class="grid gap-12 mt-16 md:grid-cols-2">


                    {{-- ====================================================
                        Contact Information
                    ===================================================== --}}
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
                            Get in touch
                        </p>


                        {{-- Email --}}
                        @if($setting?->email)

                            <div class="mt-6">

                                <a
                                    href="mailto:{{ $setting->email }}"
                                    class="text-xl font-medium tracking-tight transition-colors  text-neutral-950 hover:text-neutral-500 dark:text-neutral-100 dark:hover:text-neutral-400"
                                >
                                    {{ $setting->email }}
                                </a>

                            </div>

                        @endif


                        {{-- Location --}}
                        @if($setting?->address)

                            <p
                                class="mt-3 text-sm  text-neutral-500 dark:text-neutral-400"
                            >
                                {{ $setting->address }}
                            </p>

                        @endif


                        {{-- Social Links --}}
                        <div class="flex flex-wrap gap-5 mt-8">

                            @if($setting?->github_url)

                                <a
                                    href="{{ $setting->github_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 text-sm font-medium transition-colors  text-neutral-950 hover:text-neutral-500 dark:text-neutral-100 dark:hover:text-neutral-400"
                                >
                                    GitHub
                                    <span>↗</span>
                                </a>

                            @endif


                            @if($setting?->facebook_url)

                                <a
                                    href="{{ $setting->facebook_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 text-sm font-medium transition-colors  text-neutral-950 hover:text-neutral-500 dark:text-neutral-100 dark:hover:text-neutral-400"
                                >
                                    Facebook
                                    <span>↗</span>
                                </a>

                            @endif


                            @if($setting?->instagram_url)

                                <a
                                    href="{{ $setting->instagram_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 text-sm font-medium transition-colors  text-neutral-950 hover:text-neutral-500 dark:text-neutral-100 dark:hover:text-neutral-400"
                                >
                                    Instagram
                                    <span>↗</span>
                                </a>

                            @endif

                        </div>

                    </div>


                    {{-- ====================================================
                        CTA
                    ===================================================== --}}
                    <div
                        class="
                            flex
                            flex-col
                            justify-between
                            rounded-[2rem]
                            bg-neutral-100
                            p-8

                            dark:bg-neutral-900
                        "
                    >

                        <div>

                            <p
                                class="text-sm font-medium  text-neutral-950 dark:text-neutral-100"
                            >
                                Start a conversation
                            </p>


                            <p
                                class="max-w-md mt-3 text-sm leading-7  text-neutral-600 dark:text-neutral-400"
                            >
                                Tell me a little about what you're
                                building and what you're trying to solve.
                            </p>

                        </div>


                        {{-- Email Button --}}
                        @if($setting?->email)

                            <a
                                href="mailto:{{ $setting->email }}"
                                class="inline-flex items-center justify-between w-full gap-4 px-5 py-4 mt-10 text-sm font-medium text-white transition duration-300 rounded-full  bg-neutral-950 hover:bg-neutral-800 dark:bg-neutral-50 dark:text-neutral-950 dark:hover:bg-neutral-200"
                            >

                                <span>
                                    Send me an email
                                </span>

                                <span>
                                    ↗
                                </span>

                            </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- ============================================================
            Bottom Statement
        ============================================================= --}}
        <div
            class="pt-10 mt-24 border-t  border-neutral-200 dark:border-neutral-800"
        >

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <p
                    class="text-sm  text-neutral-500 dark:text-neutral-400"
                >
                    Open to interesting projects and conversations.
                </p>


                <a
                    href="mailto:{{ $setting?->email }}"
                    class="inline-flex items-center gap-2 text-sm font-medium transition-colors  text-neutral-950 hover:text-neutral-500 dark:text-neutral-100 dark:hover:text-neutral-400"
                >
                    {{ $setting?->email }}

                    <span>
                        ↗
                    </span>
                </a>

            </div>

        </div>

    </div>

</section>
