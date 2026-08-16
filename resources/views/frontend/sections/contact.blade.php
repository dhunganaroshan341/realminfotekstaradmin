<section id="contact" class="border-t border-neutral-200">

    <div class="px-6 mx-auto max-w-7xl py-28 lg:px-8 lg:py-36">

        <div class="grid gap-16 lg:grid-cols-12 lg:gap-20">

            {{-- Intro --}}
            <div class="lg:col-span-7">

                <p class="text-sm font-medium uppercase tracking-[0.25em] text-neutral-400">
                    Get in touch
                </p>

                <h2 class="max-w-4xl mt-8 text-5xl font-semibold tracking-tight text-neutral-950 sm:text-6xl lg:text-7xl">

                    Let's build
                    <span class="text-neutral-400">
                        something useful.
                    </span>

                </h2>

                <p class="max-w-xl mt-8 text-lg leading-8 text-neutral-600">

                    Have a project, an idea, or simply want to talk
                    about technology and building things?

                    I'd love to hear from you.

                </p>


                {{-- Direct email --}}
                @if($setting?->email)

                    <div class="mt-10">

                        <p class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400">
                            Email
                        </p>

                        <a
                            href="mailto:{{ $setting->email }}"
                            class="inline-flex items-center gap-3 mt-3 text-lg font-medium group text-neutral-950"
                        >

                            {{ $setting->email }}

                            <span class="transition-transform duration-300 group-hover:-translate-y-1 group-hover:translate-x-1">
                                ↗
                            </span>

                        </a>

                    </div>

                @endif

            </div>


            {{-- Form --}}
            <div class="lg:col-span-5">

                <form
                    action="{{ route('store.contact-us') }}"
                    method="POST"
                    class="space-y-8"
                >

                    @csrf


                    {{-- Name --}}
                    <div>

                        <label
                            for="name"
                            class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400"
                        >
                            Name
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            placeholder="Your name"
                            required
                            class="w-full px-0 py-3 mt-3 text-base bg-transparent border-0 border-b outline-none border-neutral-300 text-neutral-950 placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-0"
                        >

                        @error('name')

                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Email --}}
                    <div>

                        <label
                            for="email"
                            class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400"
                        >
                            Email
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            required
                            class="w-full px-0 py-3 mt-3 text-base bg-transparent border-0 border-b outline-none border-neutral-300 text-neutral-950 placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-0"
                        >

                        @error('email')

                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Subject --}}
                    <div>

                        <label
                            for="subject"
                            class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400"
                        >
                            Subject
                        </label>

                        <input
                            id="subject"
                            name="subject"
                            type="text"
                            value="{{ old('subject') }}"
                            placeholder="What would you like to talk about?"
                            class="w-full px-0 py-3 mt-3 text-base bg-transparent border-0 border-b outline-none border-neutral-300 text-neutral-950 placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-0"
                        >

                        @error('subject')

                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Message --}}
                    <div>

                        <label
                            for="message"
                            class="text-xs font-medium uppercase tracking-[0.2em] text-neutral-400"
                        >
                            Message
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            placeholder="Tell me a little about your idea..."
                            required
                            class="w-full px-0 py-3 mt-3 text-base bg-transparent border-0 border-b outline-none resize-none border-neutral-300 text-neutral-950 placeholder:text-neutral-400 focus:border-neutral-950 focus:ring-0"
                        >{{ old('message') }}</textarea>

                        @error('message')

                            <p class="mt-2 text-xs text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="inline-flex items-center gap-4 py-4 text-sm font-medium text-white transition rounded-full group bg-neutral-950 px-7 hover:bg-neutral-800"
                    >

                        Send message

                        <span class="transition-transform duration-300 group-hover:-translate-y-1 group-hover:translate-x-1">
                            ↗
                        </span>

                    </button>

                </form>

            </div>

        </div>


        {{-- Social links --}}
        <div class="pt-8 mt-24 border-t border-neutral-200">

            <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">

                <p class="text-sm text-neutral-500">
                    Find me elsewhere
                </p>


                <div class="flex flex-wrap gap-x-7 gap-y-3">

                    @if($setting?->github_url)

                        <a
                            href="{{ $setting->github_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-sm font-medium transition text-neutral-950 hover:text-neutral-500"
                        >
                            GitHub ↗
                        </a>

                    @endif


                    @if($setting?->instagram_url)

                        <a
                            href="{{ $setting->instagram_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-sm font-medium transition text-neutral-950 hover:text-neutral-500"
                        >
                            Instagram ↗
                        </a>

                    @endif


                    @if($setting?->linkedin_url)

                        <a
                            href="{{ $setting->linkedin_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-sm font-medium transition text-neutral-950 hover:text-neutral-500"
                        >
                            LinkedIn ↗
                        </a>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>
