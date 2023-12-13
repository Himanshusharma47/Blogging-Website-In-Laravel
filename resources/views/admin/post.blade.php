@extends('admin.layouts.main')

@push('title')
   Post
@endpush

@section('post-section')
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

    <!-- Page Content -->
    <div class="container mt-4">
        <h2>Post Management</h2>
        <br>
        <!--search post-->
        <div class="mb-3" style="width: 30%">
            <form action="{{ route('search.post') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Search title"
                        required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </form>
        </div>

        <!-- Post Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Post</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->getUser->name }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <p>{{ $item->post }}</p>
                        </td>
                        <td>
                            <a href="{{ url('post/' . $item->id) }}"><button type="button" class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#deletePostModal">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
