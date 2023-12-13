@extends('admin.layouts.main')

@push('title')
  User-Page
@endpush

@section('user-manage')
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
        <h2>User Management</h2>
        <br>
        <!--search section-->
        <div class="mb-3" style="width: 30%">
            <form action="{{ route('search.user') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Search name"
                        required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </form>
        </div>

        <!-- User Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy Data -->

                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ url('user/' . $item->id) }}"><button type="button" class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#deleteUserModal">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
                <!-- Add more rows for additional users -->

            </tbody>
        </table>
    </div>
@endsection
