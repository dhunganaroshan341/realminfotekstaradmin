<header
    class="fixed inset-x-0 top-0 z-50 transition-colors duration-500 border-b border-transparent  dark:border-neutral-900"
>
    <nav class="px-6 py-5 mx-auto max-w-7xl lg:px-8">

        <div class="flex items-center justify-between">


            {{-- =========================================================
                Logo
            ========================================================== --}}
            <a
                href="{{ url('/') }}"
                class="text-lg font-semibold tracking-tight transition-colors duration-300  text-neutral-950 dark:text-neutral-50"
            >
                Roshan<span class="text-neutral-400 dark:text-neutral-600">
                    Dhungana
                </span>
            </a>


            {{-- =========================================================
                Desktop Navigation
            ========================================================== --}}
            <div class="items-center hidden gap-8 md:flex">


                {{-- Work --}}
                <a
                    href="{{ url('/#work') }}"
                    class="text-sm transition-colors duration-300  text-neutral-500 hover:text-neutral-950 dark:text-neutral-400 dark:hover:text-neutral-50"
                >
                    Work
                </a>


                {{-- About --}}
                <a
                    href="{{ url('/#about') }}"
                    class="text-sm transition-colors duration-300  text-neutral-500 hover:text-neutral-950 dark:text-neutral-400 dark:hover:text-neutral-50"
                >
                    About
                </a>


                {{-- Experience --}}
                <a
                    href="{{ url('/#experience') }}"
                    class="text-sm transition-colors duration-300  text-neutral-500 hover:text-neutral-950 dark:text-neutral-400 dark:hover:text-neutral-50"
                >
                    Experience
                </a>


                {{-- Writing --}}
                <a
                    href="{{ route('writing.index') }}"
                    class="
                        text-sm
                        transition-colors
                        duration-300

                        {{ request()->routeIs('writing.*')
                            ? 'font-medium text-neutral-950 dark:text-neutral-50'
                            : 'text-neutral-500 hover:text-neutral-950 dark:text-neutral-400 dark:hover:text-neutral-50'
                        }}
                    "
                >
                    Writing
                </a>


                {{-- Beyond Code --}}
                <a
                    href="{{ route('beyond-code') }}"
                    class="
                        text-sm
                        transition-colors
                        duration-300

                        {{ request()->routeIs('beyond-code')
                            ? 'font-medium text-neutral-950 dark:text-neutral-50'
                            : 'text-neutral-500 hover:text-neutral-950 dark:text-neutral-400 dark:hover:text-neutral-50'
                        }}
                    "
                >
                    Beyond Code
                </a>

            </div>


            {{-- =========================================================
                Right Side
            ========================================================== --}}
            <div class="flex items-center gap-3">


                {{-- Theme Toggle --}}
                <button
                    id="theme-toggle"
                    type="button"
                    class="flex items-center justify-center transition-all duration-300 border rounded-full  w-9 h-9 border-neutral-200 text-neutral-600 hover:bg-neutral-100 hover:text-neutral-950 dark:border-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-900 dark:hover:text-neutral-50"
                    aria-label="Toggle theme"
                    aria-pressed="false"
                >

                    {{-- Light mode icon --}}
                    <svg
                        id="theme-icon-light"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="hidden w-4 h-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3v2.25m6.364 1.386-1.591 1.591M21 12h-2.25m-1.386 6.364-1.591-1.591M12 18.75V21m-6.364-1.386 1.591-1.591M3 12h2.25m1.386-6.364 1.591 1.591M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                        />
                    </svg>


                    {{-- Dark mode icon --}}
                    <svg
                        id="theme-icon-dark"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21.752 15.002A9.718 9.718 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.337.269-2.611.752-3.752A9.753 9.753 0 1 0 21.752 15.002Z"
                        />
                    </svg>

                </button>


                {{-- Contact --}}
                <a
                    href="{{ url('/#contact') }}"
                    class="
                        hidden
                        rounded-full
                        px-5
                        py-2.5
                        text-sm
                        font-medium
                        transition-all
                        duration-300
                        md:inline-flex

                        bg-neutral-950
                        text-white
                        hover:bg-neutral-800

                        dark:bg-neutral-50
                        dark:text-neutral-950
                        dark:hover:bg-neutral-200
                    "
                >
                    Let's talk
                </a>

            </div>

        </div>

    </nav>
</header>
