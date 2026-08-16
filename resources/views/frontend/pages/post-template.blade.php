@extends('frontend.layout.main')

@section('content')

<section class="hero-small">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url({{ $pageBanner->image?asset('uploads/'.$pageBanner->image):asset('assets/images/banner1.jpg') }}) ;">
                <div class="hero-small-background-overlay"></div>
                <div class="container h-100">
                    <div class="row align-items-center d-flex h-100">
                        <div class="col-md-12">
                            <div class="block text-center">
                                <h1 class="mb-3 mt-3 text-center">{{ $pageBanner->title??'Blog & News' }}</h1>
                                <p>{{ $pageBanner->description??"Lorem ipsum dolor sit amet consectetur adipisicing elit." }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="border-bottom mb-4">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($detail->postImages as $index => $image)
            {{-- Images commented out --}}
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="row align-items-center mt-2 mb-4">
        <div class="col-lg-4 text-center text-lg-start mb-3 m-lg-0">
            <img src="{{ asset(optional($detail->createdBy)->image ? 'uploads/' . $detail->createdBy->image : 'defaultImage/defaultimage.webp') }}"
                 class="rounded shadow-1-strong me-2" height="35" alt="Author" />
            <span>Published <u>{{ $detail->created_at->format('d M Y') }}</u> by</span>
            <a href="#" class="text-dark">{{ optional($detail->createdBy)->full_name }}</a>
        </div>
    </div>

    <!-- Updated layout here -->
    <h1 class="mb-3">{{ $detail->title }}</h1>
    <span class="text-muted small">{{ optional($detail->category)->title }}</span>
</section>


<div class="container">
    @if (auth()->guest())
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Google Login</h5>
                </div>
                <div class="modal-body">
                    <div class="card w-100">
                        <div class="card-body text-center">
                            <a href="{{ route('google.redirect') }}">
                                <img src="{{ asset('defaultImage/googleimg.webp') }}" width="100%" alt="Login with Google">
                            </a>
                            <h5 class="mt-3 mb-3">Please login to read more.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12 mb-4">
            <section class="border-bottom mb-4">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($detail->postImages as $index => $image)
                        {{-- <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('uploads/' . $image->image) }}"
                                class="img-fluid w-100 h-auto shadow-2-strong rounded mb-2"
                                alt="Post Image">
                        </div> --}}
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="row align-items-center mt-2 mb-4">
                    <div class="col-lg-4 text-center text-lg-start mb-3 m-lg-0">
                        <img src="{{ asset(optional($detail->createdBy)->image ? 'uploads/' . $detail->createdBy->image : 'defaultImage/defaultimage.webp') }}"
                             class="rounded shadow-1-strong me-2" height="35" alt="Author" />
                        <span>Published <u>{{ $detail->created_at->format('d M Y') }}</u> by</span>
                        <a href="#" class="text-dark">{{ optional($detail->createdBy)->full_name }}</a>
                    </div>
                </div>
                <span>{{ optional($detail->category)->title }}</span> - <span>{{ $detail->title }}</span>
            </section>

            <section>
                <p>{!! $detail->description !!}</p>

                @if (count($detail->postImages))
                    <img src="{{ asset('uploads/' . $detail->postImages[0]->image) }}" class="img-fluid w-100 h-auto shadow-1-strong rounded mb-4" alt="Post Image" />
                @endif
            </section>

            <section class="border-bottom mb-4 pb-4">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ asset(optional($detail->createdBy)->image ? 'uploads/' . $detail->createdBy->image : 'defaultImage/defaultimage.webp') }}"
                             class="img-fluid rounded shadow-1-strong" height="100" width="100" alt="Author Image" />
                    </div>
                    <div class="col-9">
                        <p class="mb-2"><strong>{{ optional($detail->createdBy)->full_name }}</strong></p>
                        <a href="{{ optional($detail->createdBy)->facebook_link }}" class="text-dark"><i class="fab fa-facebook-f me-1"></i></a>
                        <a href="{{ optional($detail->createdBy)->twitter_link }}" class="text-dark"><i class="fab fa-twitter me-1"></i></a>
                        <a href="{{ optional($detail->createdBy)->instagram_link }}" class="text-dark"><i class="fab fa-instagram me-1"></i></a>
                        <p>{{ $detail->notes }}</p>
                    </div>
                </div>
            </section>

            <section class="border-bottom mb-3">
                <p class="text-center"><strong>Comments: {{ $post->comments->count() }}</strong></p>

                @foreach ($comments as $comment)
                <div class="row mb-4">
                    <div class="col-2">
                        <img src="{{ asset(optional($comment->user)->image ?? 'defaultImage/defaultimage.webp') }}"
                             class="img-fluid shadow-1-strong rounded" alt="User Image" />
                    </div>
                    <div class="col-10">
                        <p class="mb-2"><strong>{{ optional($comment->user)->full_name }}</strong></p>
                        <p>{{ $comment->content }}</p>
                        <div class="comment-content">
                            <p>
                                <a type="button" class="btnEditPost" data-id="{{ $comment->id }}">
                                    <i class="bi bi-pen"></i>
                                </a>
                                <a type="button" class="btnDeletePost" data-id="{{ $comment->id }}">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </p>
                            <form id="updatePostForm">
                                <div class="fetchEditComment"></div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>

            <section>
                <p class="text-center"><strong>Leave a comment</strong></p>
                <form action="{{ route('store.comment') }}" id="addComment" method="POST">
                    @csrf
                    <input type="hidden" name="commentable_id" value="{{ $detail->id }}">
                    <input type="hidden" name="commentable_type" value="App\Models\Post">
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                        <label class="form-label" for="content">Text</label>
                        <p id="validationErrors" class="alert alert-danger d-none mt-2"></p>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4">Comment</button>
                </form>
            </section>
        </div>
    </div>
</div>

{{-- Optional: Extra CSS for image control --}}

@endsection
@push('styles')


<style>
    @media (max-width: 768px) {
        .carousel-item img {
            max-height: 300px;
            object-fit: cover;
        }
    }
</style>

@endpush

@push('scripts')
<script>
        $(document).ready(function() {
            // Add Comment
            $("#staticBackdrop").modal("show");

            $("#addComment").submit(function(event) {
                event.preventDefault();
                $("#commentBtn").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{ route('store.comment') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.auth === null) {
                            window.location.href = "/register";
                        } else {
                            location.reload();
                        }

                    },
                    error: function(response) {
                        if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            let errorMessages = '<ul>';
                            $.each(errors, function(key, value) {
                                errorMessages += '<li>' + value[0] +
                                    '</li>';
                            });
                            errorMessages += '</ul>';
                            $('#validationErrors').removeClass('d-none').html(
                                errorMessages);
                        }
                    },
                    complete: function() {
                        $("#commentBtn").prop("disabled", false);
                    }
                });
            })

            $(document).on("click", ".btnEditPost", function() {
                let id = $(this).data('id');
                let clickedElement = this;


                $.ajax({
                    type: "get",
                    url: "/comment/post/edit/" + id,
                    success: function(response) {
                        console.log(response);

                        $(clickedElement).closest(".comment-content").find(".fetchEditComment")
                            .html(`
                <div class="input-group">
                    @csrf
                    <span class="input-group-text">Edit Comment</span>
                    <input type="text" name="comment" class="form-control" id="editContent" value="${response.message.content}">
                    <button type="submit" class="btn btn-success btn-small" id="updateBtn">update</button>
                </div>
            `);
                    },
                    error: function(xhr) {
                        console.log("Error:", xhr);
                    }
                });

                // Update Form
                $(document).off('submit').on("submit", "#updatePostForm", function(event) {
                    event.preventDefault();
                    let formdata = new FormData(this);
                    formdata.append("commentable_id", $("#commentable_id").val());
                    formdata.append("commentable_type", $("#commentable_type").val());
                    formdata.append("content", $("#editContent").val());
                    $("#updateBtn").prop("disabled", true);
                    $.ajax({
                        type: "post",
                        url: "/comment/post/update/" + id,
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            location.reload();
                            // console.log(response);

                        },
                        error: function(xhr) {
                            console.log(xhr);
                        },
                        complete: function() {
                            $("#updateBtn").prop("disabled", false);
                        }
                    })
                })
            });

            // Delete Comment
            $(document).on("click", ".btnDeletePost", function() {
                let id = $(this).data('id');
                console.log(id);
                $.ajax({
                    type: "get",
                    url: "/comment/post/delete/" + id,
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    },
                })

            });
        });
    </script>

@endpush
