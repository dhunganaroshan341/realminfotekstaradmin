@extends('Admin.layout.master')
@section('content')
    <div class="container-fluid">
        <button class="btn btn-primary addPostBtn mb-4">Add Post</button>
        @include('Admin.pages.Post.postModal')
        <div class="table-responsive">
            <table class="table table-striped custom-table" id="data-post-show">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
@endsection
@push('styles')
    <style>
        #tagContainer .tag {
            background-color: #198754;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            font-size: 14px;
        }

        #tagContainer .tag .remove-tag {
            margin-left: 8px;
            cursor: pointer;
            font-weight: bold;
            color: #fff;
        }
    </style>
@endpush
