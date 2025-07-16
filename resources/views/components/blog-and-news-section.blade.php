@if (!empty($posts) && count($posts) > 0)
    <section class="mt-4 section-3 py-6">
        <div class="container">
            <div class="divider mb-3"></div>
            <h2 class="title-color mb-4 h1 text-center">{{ $title ?? 'Blogs & News' }}</h2>

            <div class="position-relative">
                <div class="my-slider">
                    @foreach ($posts as $post)
                        <div class="card border-0 blog-card">
                            <a href="{{ url('/blog-detail/' . $post->id) }}">
                                <img src="{{ isset($post->post_images[0]) ? asset('uploads/' . $post->post_images[0]->image) : asset('assets/images/default-blog.jpg') }}"
                                    class="card-img-top img-fluid" style="height: 200px; object-fit: cover;"
                                    alt="{{ $post->title }}">
                            </a>
                            <div class="card-body p-3 d-flex flex-column">
                                <h4 class="card-title-blog mt-2 mb-2">
                                    <a href="{{ url('/blog-detail/' . $post->id) }}"
                                        class="text-decoration-none text-dark">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <div class="content pt-2 flex-grow-1 d-none d-md-block">
                                    <p class="card-text mb-0">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($post->description), 100) }}
                                    </p>
                                </div>
                                <a href="{{ url('/blog-detail/' . $post->id) }}"
                                    class="btn btn-primary mt-auto align-self-start">
                                    Read More <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="btn btn-secondary blog-prev position-absolute top-50 start-0 translate-middle-y z-2">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button class="btn btn-secondary blog-next position-absolute top-50 end-0 translate-middle-y z-2">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
@endif
