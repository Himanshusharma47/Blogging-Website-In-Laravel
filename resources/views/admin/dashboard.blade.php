@extends('admin.layouts.main')

@push('title')
   Dashboard
@endpush

@section('dashboard')
    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="text-primary">Dashboard</h2>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Posts</h5>
                        <p class="card-text">{{ $totalpost }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">{{ $totaluser }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title text-warning">Recent Posts</h5>
                <ul>
                    <li class="text-primary">Post 1 - <small>Posted by Admin</small></li>
                    <li class="text-primary">Post 2 - <small>Posted by Admin</small></li>
                    <li class="text-primary">Post 3 - <small>Posted by Admin</small></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
