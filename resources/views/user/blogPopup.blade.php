@extends('user.layouts.main')

@push('title')
  Blog
@endpush

@section('blogpopup-section')
    <!-- Display error message if available in the session -->
    @if (session('error'))
        <div class="alert alert-danger" id="alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- Display success message if available in the session -->
    @if (session('success'))
        <div class="alert alert-success" id="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-5" style="width: 70%; margin:auto">

        @foreach ($singlePost as $item)
        <img src="{{ asset($item->image) }}" class="img-fluid large-image" alt="Blog Image">

        <div class="mt-3">
            <span class="badge badge-primary">Category</span>
            <h1 class="text-3xl"><strong>{{ $item->getCategory->category }}</strong></h1>
        </div>

        <h1 class="mt-3 text-2xl">{{ $item->title }}</h1>

        <p class="mt-3">{{ $item->post }}</p>

        <div class="mt-5">

            <form action="{{ route('comment.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="post_id" value="{{ $item->id }}">
                    <input type="hidden" name="user_id" value="{{ $item->getUser->id }}">
                    <label for="commentText">Comment</label>
                    <textarea class="form-control" name="comment" id="commentText" rows="3" placeholder="Your Comment" required></textarea>
                </div>
                <button type="submit" class="btn btn-info btn-sm">Submit Comment</button>
            </form>

            <!-- Previous Comments -->
            <div class="mt-4">
                <h5>Previous Comments</h5>
                <ul class="list-group">
                    @foreach ($item->getComments as $comment)
                    <li class="list-group-item">
                        <strong>{{$comment->getUser->name}} : </strong>{{$comment->comment}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>


@endsection
