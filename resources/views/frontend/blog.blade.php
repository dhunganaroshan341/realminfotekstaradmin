@extends('frontend.layout.main')
@section('content')

    <section class="hero-small">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active"
                    style="background-image: url({{ $pageBanner->image ? asset('uploads/' . $pageBanner->image) : asset('assets/images/banner1.jpg') }}) ;">
                    <div class="hero-small-background-overlay"></div>
                    <div class="container h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div class="col-md-12">
                                <div class="block text-center">
                                    <h1 class="mb-3 mt-3 text-center">
                                        {{ $pageBanner->title ?? 'Blog & News' }}
                                        @if (isset($category_title) && $category_title != '')
                                            &nbsp;<i class="fa-solid fa-angle-right"></i>&nbsp;
                                            <span class="">{{ $category_title }}</span>
                                        @endif
                                    </h1>

                                    <p>{{ $pageBanner->description ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-3 py-5 position-relative">
        @include('components.search-blog-component')
        <div class="container">
            <div class="cards">
                <div class="row">
                    @if (isset($posts) && count($posts))
                        @foreach ($posts as $post)
                            <div class="col-md-4 mb-4">
                                <div class="card border-0 h-100">
                                    @if (!empty($post->postImages) && isset($post->postImages[0]->image))
                                        <img src="{{ asset('uploads/' . $post->postImages[0]->image) }}"
                                            class="card-img-top" alt="Post Image">
                                    @else
                                        <img src="{{ asset('assets/images/default-blog.jpg') }}" class="card-img-top"
                                            alt="Default Image">
                                    @endif
                                    <div class="card-body p-3">
                                        <h1 class="card-title mt-2">
                                            <a
                                                href="{{ route('blog-detail', $post->id ?? 0) }}">{{ $post->title ?? 'Untitled' }}</a>
                                        </h1>
                                        <div class="content pt-2">
                                            <p class="card-text">
                                                {!! \Illuminate\Support\Str::limit($post->description ?? 'No description available.', 100, '...') !!}
                                            </p>
                                        </div>
                                        <a href="{{ route('blog-detail', $post->id ?? 0) }}" class="btn btn-primary mt-4">
                                            Details <i class="fa-solid fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p class="text-muted">No blog posts available at the moment.</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </section>

@endsection
