import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    const app = document.getElementById('songs-app');
    const playerContainer = document.getElementById('music-player');

    if (!app || !playerContainer) {
        return;
    }

    const songs = JSON.parse(app.dataset.songs);

    let currentIndex = 0;
    let youtubePlayer = null;

    /*
    |--------------------------------------------------------------------------
    | Render
    |--------------------------------------------------------------------------
    */

    function render() {

        playerContainer.innerHTML = `

            <div class="
                overflow-hidden
                rounded-[2rem]
                border
                border-neutral-200
                bg-neutral-50
                dark:border-neutral-800
                dark:bg-neutral-900
            ">

                <div class="grid lg:grid-cols-2">


                    <div class="p-8 sm:p-10">

                        <div class="flex items-center justify-between">

                            <p class="
                                text-xs
                                font-medium
                                uppercase
                                tracking-[0.25em]
                                text-neutral-400
                            ">
                                Playlist
                            </p>

                            <span class="
                                text-xs
                                text-neutral-400
                            ">
                                ${songs.length} songs
                            </span>

                        </div>


                        <h2 class="
                            mt-8
                            text-3xl
                            font-semibold
                            tracking-tight
                            text-neutral-950
                            dark:text-neutral-50
                        ">
                            Things I'm listening to
                        </h2>


                        <div class="mt-10 space-y-2">

                            ${songs.map((song, index) => `

                                <button
                                    type="button"
                                    data-song-index="${index}"
                                    class="
                                        song-item
                                        flex
                                        w-full
                                        items-center
                                        gap-5
                                        rounded-2xl
                                        p-4
                                        text-left
                                        transition
                                        hover:bg-neutral-100
                                        dark:hover:bg-neutral-800
                                    "
                                >

                                    <span class="
                                        song-number
                                        w-8
                                        text-xs
                                        font-medium
                                        text-neutral-400
                                    ">
                                        ${String(index + 1).padStart(2, '0')}
                                    </span>


                                    <span class="flex-1">

                                        <span class="
                                            block
                                            text-sm
                                            font-medium
                                            text-neutral-950
                                            dark:text-neutral-50
                                        ">
                                            ${song.title}
                                        </span>

                                        <span class="
                                            mt-1
                                            block
                                            text-xs
                                            text-neutral-500
                                            dark:text-neutral-400
                                        ">
                                            ${song.artist}
                                        </span>

                                    </span>


                                    <span class="
                                        text-neutral-400
                                    ">
                                        ↗
                                    </span>

                                </button>

                            `).join('')}

                        </div>

                    </div>



                    <div class="
                        flex
                        min-h-[400px]
                        flex-col
                        justify-between
                        bg-neutral-100
                        p-8
                        dark:bg-neutral-800
                        sm:p-10
                    ">

                        <div>

                            <p class="
                                text-xs
                                font-medium
                                uppercase
                                tracking-[0.25em]
                                text-neutral-400
                            ">
                                Now Playing
                            </p>


                            <h3
                                id="current-song-title"
                                class="
                                    mt-8
                                    text-3xl
                                    font-semibold
                                    tracking-tight
                                    text-neutral-950
                                    dark:text-neutral-50
                                "
                            >
                                ${songs[0]?.title ?? 'No songs'}
                            </h3>


                            <p
                                id="current-song-artist"
                                class="
                                    mt-2
                                    text-sm
                                    text-neutral-500
                                    dark:text-neutral-400
                                "
                            >
                                ${songs[0]?.artist ?? ''}
                            </p>

                        </div>


                        <div>

                            <button
                                id="play-button"
                                type="button"
                                class="
                                    inline-flex
                                    items-center
                                    gap-3
                                    rounded-full
                                    bg-neutral-950
                                    px-6
                                    py-3
                                    text-sm
                                    font-medium
                                    text-white
                                    transition
                                    hover:bg-neutral-800
                                    dark:bg-white
                                    dark:text-neutral-950
                                    dark:hover:bg-neutral-200
                                "
                            >
                                <span id="play-icon">
                                    ▶
                                </span>

                                <span id="play-text">
                                    Play
                                </span>

                            </button>


                            <p class="
                                mt-5
                                max-w-sm
                                text-xs
                                leading-6
                                text-neutral-400
                            ">
                                Start playback when you're ready.
                                Your browser may require a click before
                                audio can begin.
                            </p>

                        </div>

                    </div>

                </div>

            </div>
        `;

        attachEvents();
    }


    /*
    |--------------------------------------------------------------------------
    | YouTube Player
    |--------------------------------------------------------------------------
    */

    window.onYouTubeIframeAPIReady = function () {

        youtubePlayer = new YT.Player('youtube-player', {

            height: '1',
            width: '1',

            videoId: songs[0]?.youtube_id,

            playerVars: {
                autoplay: 0,
                controls: 0,
                rel: 0,
                modestbranding: 1
            },

            events: {

                onReady: () => {
                    console.log('YouTube player ready');
                },

                onStateChange: handlePlayerStateChange

            }

        });

    };


    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */

    function attachEvents() {

        const playButton = document.getElementById('play-button');

        playButton?.addEventListener('click', () => {

            if (!youtubePlayer) {
                console.warn('YouTube player is not ready yet.');
                return;
            }

            const state = youtubePlayer.getPlayerState();

            if (state === YT.PlayerState.PLAYING) {

                youtubePlayer.pauseVideo();

                updatePlayButton(false);

            } else {

                youtubePlayer.playVideo();

                updatePlayButton(true);

            }

        });


        document.querySelectorAll('.song-item').forEach(button => {

            button.addEventListener('click', () => {

                const index = Number(button.dataset.songIndex);

                playSong(index);

            });

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Play Song
    |--------------------------------------------------------------------------
    */

    function playSong(index) {

    if (!songs[index] || !youtubePlayer) {
        return;
    }

    currentIndex = index;

    const song = songs[index];

    youtubePlayer.loadVideoById({
        videoId: song.youtube_id,
        startSeconds: 0
    });

    document.getElementById('current-song-title').textContent =
        song.title;

    document.getElementById('current-song-artist').textContent =
        song.artist;

    highlightSong(index);
}


    /*
    |--------------------------------------------------------------------------
    | Player State
    |--------------------------------------------------------------------------
    */

 function handlePlayerStateChange(event) {

    switch (event.data) {

        case YT.PlayerState.PLAYING:

            updatePlayButton(true);

            break;


        case YT.PlayerState.PAUSED:

            updatePlayButton(false);

            break;


        case YT.PlayerState.ENDED:

            playNext();

            break;


        case YT.PlayerState.CUED:

            console.log('Song loaded:', songs[currentIndex].title);

            youtubePlayer.playVideo();

            break;

    }

}


    /*
    |--------------------------------------------------------------------------
    | Next Song
    |--------------------------------------------------------------------------
    */

function playNext() {

    const nextIndex =
        (currentIndex + 1) % songs.length;

    console.log(
        'Playing next:',
        songs[nextIndex].title,
        songs[nextIndex].youtube_id
    );

    playSong(nextIndex);
}


    /*
    |--------------------------------------------------------------------------
    | UI
    |--------------------------------------------------------------------------
    */

    function updatePlayButton(isPlaying) {

        const icon = document.getElementById('play-icon');
        const text = document.getElementById('play-text');

        if (!icon || !text) {
            return;
        }

        icon.textContent = isPlaying ? 'Ⅱ' : '▶';
        text.textContent = isPlaying ? 'Pause' : 'Play';
    }


    function highlightSong(index) {

        document.querySelectorAll('.song-item').forEach((item, i) => {

            if (i === index) {

                item.classList.add(
                    'bg-neutral-100',
                    'dark:bg-neutral-800'
                );

            } else {

                item.classList.remove(
                    'bg-neutral-100',
                    'dark:bg-neutral-800'
                );

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Start
    |--------------------------------------------------------------------------
    */

    render();

});
