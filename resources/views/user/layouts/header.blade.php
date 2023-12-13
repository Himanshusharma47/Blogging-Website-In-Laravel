<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@stack('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-3 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                    viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">Blog Byte</span>
            </a>
            @if (!request()->routeIs(['user.login', 'user.register']))
                <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-xl justify-center">
                    <a href="{{ route('user.home') }}" class="mr-5 hover:text-gray-900">Home</a>
                    <a href="{{ route('user.blog') }}" class="mr-5 hover:text-gray-900">Blog</a>
                    <a href="{{ route('user.post') }}" class="mr-5 hover:text-gray-900">Post</a>
                    <a href="{{ route('user.contact') }}" class="mr-5 hover:text-gray-900">Contact</a>
                    <a href="{{ route('about') }}" class="mr-5 hover:text-gray-900">About Us</a>
                    <a href="{{ route('user.profile') }}" class="mr-5 hover:text-gray-900">Profile</a>
                    <a href="{{ route('admin.login') }}" class="mr-5 hover:text-gray-900">Admin</a>
                </nav>
                @if (Auth::check())
                    <a href="{{ route('logout.user') }}"
                        class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-0 md:mt-0">
                        Logout {{ Auth::user()->name }}
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                @endif
            @endif
        </div>
    </header>
