@extends('frontend.layout.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/blog/vendor.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/blog/app.min.css') }}" />
    <style>
        .section-title {
            font-size: .875rem;
            line-height: 1.5;
            text-align: center;
            margin: 0 0 15px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: .5px;
            color: var(--realm-blue);
            position: relative;
        }

        .section-title::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--realm-yellow-dark);
            margin-top: -1px;
        }

        .btn-primary {
            background-color: var(--realm-blue);
            color: var(--realm-yellow);
        }

        .btn:hover {
            color: var(--bs-btn-hover-color);
            background-color: var(--realm-blue-light);
            border-color: var(--realm-yellow);
        }

        a {
            color: var(--realm-blue-light);
            text-decoration: none;
        }

        a:hover {
            color: var(--realm-yellow);
            text-decoration: none;
        }

        .divider {
            width: 40px;
            height: 5px;
            background: var(--realm-yellow-dark);
        }

        .post-title a {
            color: var(--realm-blue-dark);
        }
    </style>
@endpush

@section('content')
    {{-- Hero Banner Section --}}
    <section class="hero-small">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background-image: url({{ $pageBanner->image ? asset('uploads/' . $pageBanner->image) : asset('assets/images/default-blog.jpg') }});">
                    <div class="hero-small-background-overlay"></div>
                    <div class="container h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div class="col-md-12">
                                <div class="block text-center">
                                    <h1 class="mb-3 mt-3 text-center">Blog & News</h1>
                                    <p>{{ $processedDescription ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Blog Details Section --}}
    <div id="content" class="content">
        <div class="container">
            <div class="row gx-lg-5">
                <div class="col-lg-9">
                    <div class="post-detail section-container">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">{{ optional($post->category)->title }}</li>
                        </ul>
                        <h4 class="post-title text-realm-blue">
                            {{ $post->title }}
                        </h4>
                        <div class="post-by">
                            Posted By <a href="#">admin</a>
                            <span class="divider">|</span> {{ $post->created_at->format('Y-m-d') }}
                            <span class="divider">|</span>
                            @foreach ($post->tags ?? ['News'] as $tag)
                                <a href="#">{{ $tag }}</a>
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach

                        </div>

                        @foreach ($detail->postImages as $postImage)
                            <div class="post-image">
                                <div class="post-image-cover"
                                    style="background-image: url('{{ asset('uploads/' . $postImage->image) }}')"></div>
                            </div>
                        @endforeach

                        <div class="post-desc">
                            <p>{{ $post->description }}</p>
                        </div>
                    </div>

                    {{-- Comments Section --}}
                    {{-- <div class="section-container">
                        <h4 class="section-title"><span>All Comments ({{ $comments->count() }})</span></h4>
                        <ul class="comment-list">
                            @foreach ($comments as $comment)
                                <li>
                                    <div class="comment-avatar"><i class="fa fa-user"></i></div>
                                    <div class="comment-container">
                                        <div class="comment-author">
                                            {{ $comment->name ?? 'Anonymous' }}
                                            <span class="comment-date">
                                                on <span class="underline">{{ $comment->created_at->format('d') }}</span>
                                                at <span class="underline">{{ $comment->created_at->format('H:i') }}</span>
                                            </span>
                                        </div>
                                        <div class="comment-content">
                                            {{ $comment->content }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div> --}}

                    {{-- Add Comment Form --}}
                    {{-- <div class="section-container">
                        <h4 class="section-title"><span>Add a Comment</span></h4>
                        <div class="alert alert-warning mb-4 mt-4 f-s-13">
                            Comments are moderated and may not appear immediately. Please be patient.
                        </div>

                        <form class="form-horizontal" id="addComment">
                            @csrf
                            <input type="hidden" name="commentable_id" value="{{ $detail->id }}">
                            <input type="hidden" name="commentable_type" value="App\Models\Post">

                            <div class="mb-3 row">
                                <label class="col-form-label col-md-2 text-md-right">Your Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" required />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-md-2 text-md-right">Your Email <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="email" required />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-md-2 text-md-right">Comment <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="content" rows="6" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10 offset-md-2">
                                    <button type="submit" class="btn btn-primary btn-lg w-300px">Submit Comment</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>

                {{-- Sidebar --}}
                <div class="col-lg-3">
                    <div class="section-container">
                        <div class="input-group sidebar-search">
                            <input type="text" id="storySearchInput" class="form-control"
                                placeholder="Search Our Blogs..." />
                            <button class="btn btn-dark" id="storySearchBtn" type="button"><i
                                    class="fa fa-search"></i></button>
                        </div>
                        <div id="searchResults" class="mt-3"></div>
                    </div>

                    <div class="section-container">
                        <h4 class="section-title"><span>Categories</span></h4>
                        <ul class="sidebar-list overflow-auto" style="max-height: 360px;">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('blogsByCategory', ['category_id' => $category->id]) }}">{{ $category->title }}
                                        ({{ $category->post_count }})
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>



                    <div class="section-container">
                        <h4 class="section-title"><span>Recent Post</span></h4>
                        <ul class="sidebar-recent-post">
                            @foreach ($recentPosts as $post)
                            @endforeach
                            <li>
                                <div class="info">
                                    <h4 class="title"><a
                                            href="{{ route('blog-detail', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                    </h4>
                                    <div class="date">{{ $post->updated_at ?? $post_created_at }}</div>
                                </div>
                            </li>
                    </div>
                </div>
            </div>
        </div>

        @include('components.blog-and-news-section', [
            'title' => 'Other Blogs',
            'posts' => $relatedPosts,
        ])
    @endsection
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#addComment').on('submit', function(e) {
                    e.preventDefault();

                    let form = $(this);
                    let submitButton = form.find('button[type="submit"]');
                    submitButton.prop('disabled', true).text('Submitting...');

                    $.ajax({
                        url: '/comment/store',
                        method: 'POST',
                        data: form.serialize(),
                        success: function(response) {
                            alert('Your comment has been submitted successfully!');

                            // Clear form fields
                            form[0].reset();

                            // Optionally: reload comments without full page reload
                            // location.reload(); // Uncomment to refresh the page
                        },
                        error: function(xhr) {
                            alert('Something went wrong. Please try again.');
                        },
                        complete: function() {
                            submitButton.prop('disabled', false).text('Submit Comment');
                        }
                    });
                });

                $('#storySearchBtn').on('click', function() {
                    const keyword = $('#storySearchInput').val().trim();

                    if (!keyword) return alert('Please enter a search term.');

                    $.ajax({
                        url: "{{ route('search.posts') }}",
                        method: "GET",
                        data: {
                            keyword
                        },
                        success: function(response) {
                            let html = '';
                            if (response.length > 0) {
                                html += '<ul class="list-group">';
                                response.forEach(post => {
                                    html += `<li class="list-group-item">
                                    <a href="/blog/detail/${post.id}" class="text-dark">${post.title}</a>
                                 </li>`;
                                });
                                html += '</ul>';
                            } else {
                                html = '<p>No stories found.</p>';
                            }
                            $('#searchResults').html(html);
                        },
                        error: function() {
                            $('#searchResults').html(
                                '<p class="text-danger">Error fetching results. Try again.</p>');
                        }
                    });
                });
            });
        </script>
    @endpush
