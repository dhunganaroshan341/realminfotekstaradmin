@if (!empty($posts) && count($posts) > 0)
    <section class="mt-4 section-3 py-6">
        <div class="container">
            <div class="divider mb-3"></div>
            <h2 class="title-color mb-4 h1">{{ $title ?? 'Blogs & News' }}</h2>

            <div class="position-relative overflow-hidden">
                <div id="blogSliderWrapper" class="overflow-hidden w-100">
                    <div id="blogCardSlider" class="d-flex" style="gap: 1rem;"></div>
                </div>

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

    @push('styles')
        <style>
            .blog-card {
                flex: 0 0 calc((100% - 2rem) / 3);
                max-width: calc((100% - 2rem) / 3);
            }

            @media (max-width: 768px) {
                .blog-card {
                    flex: 0 0 100%;
                    max-width: 100%;
                }
            }

            .card-body .card-title-blog {
                height: 3rem;
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }

            .card-body .content {
                height: 5rem;
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const posts = @json($posts);
                const slider = document.getElementById('blogCardSlider');
                let index = 0;
                let cardWidth = 0;
                let visibleCount = window.innerWidth <= 768 ? 1 : 3;
                let totalCards = posts.length;

                // Helper: create blog card
                function createCard(post) {
                    const div = document.createElement('div');
                    div.classList.add('card', 'border-0', 'flex-shrink-0', 'blog-card');
                    div.innerHTML = `
                        <a href="/blog-detail/${post.id}">
                            <img src="${post.post_images?.[0]?.image ? '/uploads/' + post.post_images[0].image : '{{ asset('assets/images/default-blog.jpg') }}'}"
                                class="card-img-top img-fluid"
                                style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body p-3 d-flex flex-column">
                            <h1 class="card-title-blog mt-2 mb-2">
                                <a href="/blog-detail/${post.id}" class="text-decoration-none text-dark">
                                    ${post.title || 'Untitled'}
                                </a>
                            </h1>
                            <div class="content pt-2 flex-grow-1 d-none d-md-block">
                                <p class="card-text mb-0 ">${post.description?.replace(/(<([^>]+)>)/gi, "").substring(0, 100) || ''}...</p>
                            </div>
                            <a href="/blog-detail/${post.id}" class="btn btn-primary mt-4 align-self-start">
                                Read More <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>`;
                    return div;
                }

                function renderSlider() {
                    // Clear
                    slider.innerHTML = "";

                    // Clone last few cards to start
                    for (let i = totalCards - visibleCount; i < totalCards; i++) {
                        slider.appendChild(createCard(posts[i]));
                    }

                    // Main cards
                    posts.forEach(post => {
                        slider.appendChild(createCard(post));
                    });

                    // Clone first few cards to end
                    for (let i = 0; i < visibleCount; i++) {
                        slider.appendChild(createCard(posts[i]));
                    }

                    cardWidth = slider.querySelector('.blog-card').offsetWidth + 16;
                    slider.style.transform = `translateX(-${cardWidth * visibleCount}px)`;
                }

                function move(direction = 1) {
                    index += direction;
                    slider.style.transition = 'transform 0.5s ease';
                    slider.style.transform = `translateX(-${cardWidth * (index + visibleCount)}px)`;

                    // Reset at edges
                    setTimeout(() => {
                        if (index >= totalCards) {
                            index = 0;
                            slider.style.transition = 'none';
                            slider.style.transform = `translateX(-${cardWidth * visibleCount}px)`;
                        }
                        if (index < 0) {
                            index = totalCards - 1;
                            slider.style.transition = 'none';
                            slider.style.transform = `translateX(-${cardWidth * (index + visibleCount)}px)`;
                        }
                    }, 510);
                }

                document.getElementById('nextBtn').addEventListener('click', () => move(1));
                document.getElementById('prevBtn').addEventListener('click', () => move(-1));

                let auto = setInterval(() => move(1), 5000);
                slider.addEventListener('mouseenter', () => clearInterval(auto));
                slider.addEventListener('mouseleave', () => auto = setInterval(() => move(1), 5000));

                window.addEventListener('resize', () => {
                    visibleCount = window.innerWidth <= 768 ? 1 : 3;
                    renderSlider();
                });

                renderSlider();
            });
        </script>
    @endpush
@endif
