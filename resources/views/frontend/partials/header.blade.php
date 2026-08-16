<header class="fixed inset-x-0 top-0 z-50">
    <nav class="px-6 py-6 mx-auto max-w-7xl lg:px-8">

        <div class="flex items-center justify-between">

            {{-- Logo --}}
            <a
                href="{{ url('/') }}"
                class="text-lg font-semibold tracking-tight text-neutral-950"
            >
                Roshan<span class="text-neutral-400">Dhungana</span>
            </a>


            {{-- Desktop Navigation --}}
            <div class="items-center hidden gap-8 md:flex">

                <a
                    href="#work"
                    class="text-sm transition text-neutral-600 hover:text-neutral-950"
                >
                    Work
                </a>

                <a
                    href="#about"
                    class="text-sm transition text-neutral-600 hover:text-neutral-950"
                >
                    About
                </a>

                <a
                    href="#experience"
                    class="text-sm transition text-neutral-600 hover:text-neutral-950"
                >
                    Experience
                </a>

                {{-- <a
                    href="#contact"
                    class="text-sm transition text-neutral-600 hover:text-neutral-950"
                >
                    Contact
                </a> --}}
                <a
                    href="{{ route('writing.index') }}"
                    class="text-sm transition text-neutral-600 hover:text-neutral-950"
                >
                    writing
                </a>

            </div>


            {{-- Contact Button --}}
            <a
                href="#contact"
                class="hidden rounded-full bg-neutral-950 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-neutral-800 md:inline-flex"
            >
                Let's talk
            </a>

        </div>

    </nav>
</header>
