<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand text-light" href="#">Admin Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        @if (!request()->routeIs('admin.login'))
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('admin.user') }}">Users</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('admin.post') }}">Posts</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('admin.category') }}">Categories</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('admin.comment') }}">Comments</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('admin.password') }}">Reset Password</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        @endif
    </div>
  </div>
</nav>
