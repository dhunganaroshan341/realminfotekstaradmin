@if (!empty($posts) && count($posts) > 0)
    <section class="section-3 py-6">
        <div class="container">
            <div class="divider mb-3"></div>
            <h2 class="title-color mb-4 h1">{{ $title ?? 'Blogs & News' }}</h2>

            <div class="position-relative">
                <div class="overflow-hidden">
                    <div id="blogCardSlider" class="d-flex" style="gap: 1rem;">
                        @foreach ($posts as $post)
                            <div class="card border-0 flex-shrink-0 blog-card" style="width: 300px;">
                                <a href="{{ route('blog-detail', ['id' => $post->id]) }}">
                                    @if (!empty($post->postImages[0]->image))
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
                                        style="height: 3rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; font-size: 1.25rem;">
                                        <a href="{{ route('blog-detail', ['id' => $post->id]) }}"
                                            class="text-decoration-none text-dark">
                                            {{ $post->title ?? 'Untitled' }}
                                        </a>
                                    </h1>
                                    <div class="content pt-2 flex-grow-1"
                                        style="height: 5rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                                        <p class="card-text mb-0">
                                            {{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($post->description ?? '')), 100, '...') }}
                                        </p>
                                    </div>
                                    <a href="{{ route('blog-detail', ['id' => $post->id]) }}"
                                        class="btn btn-primary mt-4 align-self-start">
                                        Read More <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Nav Buttons -->
                <button id="prevBtn"
                    class="btn btn-secondary position-absolute top-50 start-0 translate-middle-y z-2 opacity-50">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button id="nextBtn"
                    class="btn btn-secondary position-absolute top-50 end-0 translate-middle-y z-2 opacity-50">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
@endif
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slider = document.getElementById('blogCardSlider');
            const cards = slider.querySelectorAll('.blog-card');
            let currentIndex = 0;
            let cardWidth = cards[0].offsetWidth + 16;

            // Clone first and last few cards for infinite effect
            for (let i = 0; i < 3; i++) {
                const cloneStart = cards[i].cloneNode(true);
                const cloneEnd = cards[cards.length - 1 - i].cloneNode(true);
                slider.appendChild(cloneStart);
                slider.prepend(cloneEnd);
            }

            let totalCards = slider.querySelectorAll('.blog-card').length;
            currentIndex = 3;
            slider.style.transition = 'none';
            slider.style.transform = `translateX(-${cardWidth * currentIndex}px)`;

            function updateSliderPosition(smooth = true) {
                slider.style.transition = smooth ? 'transform 0.5s ease' : 'none';
                slider.style.transform = `translateX(-${cardWidth * currentIndex}px)`;
            }

            function moveNext() {
                currentIndex++;
                updateSliderPosition();

                if (currentIndex >= totalCards - 3) {
                    setTimeout(() => {
                        currentIndex = 3;
                        updateSliderPosition(false);
                    }, 510);
                }
            }

            function movePrev() {
                currentIndex--;
                updateSliderPosition();

                if (currentIndex < 3) {
                    setTimeout(() => {
                        currentIndex = totalCards - 4;
                        updateSliderPosition(false);
                    }, 510);
                }
            }

            document.getElementById('nextBtn').addEventListener('click', moveNext);
            document.getElementById('prevBtn').addEventListener('click', movePrev);

            // Auto Slide
            let interval = setInterval(moveNext, 5000);

            slider.addEventListener('mouseenter', () => clearInterval(interval));
            slider.addEventListener('mouseleave', () => interval = setInterval(moveNext, 5000));

            // Resize observer to fix cardWidth dynamically
            window.addEventListener('resize', () => {
                cardWidth = slider.querySelector('.blog-card').offsetWidth + 16;
                updateSliderPosition(false);
            });
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
