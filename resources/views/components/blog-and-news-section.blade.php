@if (isset($posts) || !empty($posts))


    <section class="section-3 py-6">
        <div class="container">
            <div class="divider mb-3"></div>
            <h2 class="title-color mb-4 h1">{{ $title ?? 'Blogs & News' }}</h2>

            <div class="position-relative">
                <div class="overflow-hidden">
                    <div id="blogCardSlider" class="d-flex transition-all"
                        style="gap: 1rem; transition: transform 0.5s ease;">
                        @if (!isset($posts) || empty($posts))
                            <div class="carousel-item active">
                                <div class="text-center">
                                    <p class="text-muted">No New Posts available at the moment.</p>
                                </div>
                            </div>
                        @else
                            @foreach ($posts as $post)
                                <div class="card border-0 flex-shrink-0 blog-card">
                                    <a href="{{ route('blog-detail', ['id' => $post->id]) }}">
                                        @if (isset($post->postImages[0]) && !empty($post->postImages[0]->image))
                                            <img src="{{ asset('uploads/' . $post->postImages[0]->image) }}"
                                                class="card-img-top img-fluid" alt=""
                                                style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('assets/images/default-blog.jpg') }}"
                                                class="card-img-top img-fluid" alt=""
                                                style="height: 200px; object-fit: cover;">
                                        @endif
                                    </a>

                                    <div class="card-body p-3 d-flex flex-column">
                                        <h1 class="card-title-blog mt-2 mb-2"
                                            style="
                    height: 3rem;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    font-size: 1.25rem;">
                                            <a href="{{ route('blog-detail', ['id' => $post->id]) }}"
                                                class="text-decoration-none text-dark">
                                                {{ $post->title ?? 'Untitled' }}
                                            </a>
                                        </h1>
                                        <div class="content pt-2 flex-grow-1"
                                            style="
                    height: 5rem;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    display: -webkit-box;
                    -webkit-line-clamp: 4;
                    -webkit-box-orient: vertical;">
                                            <p class="card-text mb-0">
                                                {!! Str::limit($post->description ?? '', 100, '...') !!}
                                            </p>
                                        </div>
                                        <a href="{{ route('blog-detail', ['id' => $post->id]) }}"
                                            class="btn btn-primary mt-4 align-self-start">
                                            Read More <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button id="prevBtn"
                    class="btn btn-secondary position-absolute top-50 start-0 translate-middle-y z-1 opacity-50">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button id="nextBtn"
                    class="btn btn-secondary position-absolute top-50 end-0 translate-middle-y z-1 opacity-50">
                    <i class="fa fa-chevron-right"></i>
                </button>

            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            const slider = document.getElementById('blogCardSlider');
            const cards = slider.querySelectorAll('.blog-card');
            const totalCards = cards.length;

            let currentIndex = 1; // start at 1 (since we'll clone first and last)
            let cardWidth = cards[0].offsetWidth + 16;

            // Clone first and last cards
            const firstClone = cards[0].cloneNode(true);
            const lastClone = cards[totalCards - 1].cloneNode(true);
            slider.appendChild(firstClone);
            slider.insertBefore(lastClone, cards[0]);

            // Set initial position
            slider.style.transform = `translateX(-${cardWidth * currentIndex}px)`;

            function updateSliderPosition(smooth = true) {
                slider.style.transition = smooth ? 'transform 0.5s ease-in-out' : 'none';
                slider.style.transform = `translateX(-${cardWidth * currentIndex}px)`;
            }

            function moveNext() {
                currentIndex++;
                updateSliderPosition();

                if (currentIndex === totalCards + 1) {
                    setTimeout(() => {
                        currentIndex = 1;
                        updateSliderPosition(false);
                    }, 510);
                }
            }

            function movePrev() {
                currentIndex--;
                updateSliderPosition();

                if (currentIndex === 0) {
                    setTimeout(() => {
                        currentIndex = totalCards;
                        updateSliderPosition(false);
                    }, 510);
                }
            }

            document.getElementById('nextBtn').addEventListener('click', moveNext);
            document.getElementById('prevBtn').addEventListener('click', movePrev);

            // Auto slide
            let autoSlideInterval = setInterval(moveNext, 4000);

            // Pause on hover
            slider.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
            slider.addEventListener('mouseleave', () => {
                autoSlideInterval = setInterval(moveNext, 4000);
            });

            window.addEventListener('resize', () => {
                cardWidth = slider.querySelector('.blog-card').offsetWidth + 16;
                updateSliderPosition(false);
            });
        </script>
    @endpush


    @push('styles')
        <style>
            .blog-card {
                width: 100%;
                max-width: calc(33.333% - 0.66rem);
                flex: 0 0 auto;
            }

            #blogCardSlider {
                transition: transform 0.5s ease-in-out;
            }

            @media (max-width: 768px) {
                .blog-card {
                    max-width: 100%;
                }
            }
        </style>
    @endpush
@endif
