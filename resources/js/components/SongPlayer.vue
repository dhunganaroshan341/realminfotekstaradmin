<template>

    <div
        class="overflow-hidden rounded-[2rem]
               border border-neutral-200
               bg-neutral-50
               dark:border-neutral-800
               dark:bg-neutral-900"
    >

        <div class="p-8 sm:p-10">

            <div class="flex items-start justify-between gap-6">

                <div>

                    <p
                        class="text-xs font-medium uppercase
                               tracking-[0.2em]
                               text-neutral-400"
                    >
                        Playlist
                    </p>

                    <h2
                        class="mt-4 text-3xl font-semibold tracking-tight text-neutral-950 dark:text-neutral-50"
                    >
                        Things I'm listening to
                    </h2>

                </div>

                <span
                    class="text-sm text-neutral-400"
                >
                    {{ songs.length }} songs
                </span>

            </div>


            <div class="mt-10">

                <button
                    v-for="(song, index) in songs"
                    :key="song.youtube_id"
                    type="button"
                    class="flex items-center justify-between w-full gap-6 px-5 py-5 text-left transition border-t border-neutral-200 dark:border-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-800"
                >

                    <div class="flex items-center gap-5">

                        <span
                            class="w-6 text-xs text-neutral-400"
                        >
                            {{ String(index + 1).padStart(2, '0') }}
                        </span>

                        <div>

                            <p
                                class="font-medium text-neutral-950 dark:text-neutral-50"
                            >
                                {{ song.title }}
                            </p>

                            <p
                                class="mt-1 text-sm text-neutral-500 dark:text-neutral-400"
                            >
                                {{ song.artist }}
                            </p>

                        </div>

                    </div>

                    <span class="text-neutral-400">
                        ↗
                    </span>

                </button>

            </div>

        </div>

    </div>

</template>


<script setup>

defineProps({

    songs: {
        type: Array,
        default: () => [],
    },

});

</script>
