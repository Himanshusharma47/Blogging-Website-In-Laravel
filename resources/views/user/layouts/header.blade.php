<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('assets/css/slideShow.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="{{ asset('assets/js/slideShow.js')}}"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
</head>
<body>

    {{-- <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Blog Byte</span>
          </a>
          <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
            <a href="#" class="mr-5 hover:text-gray-900">Home</a>
            <a href="#" class="mr-5 hover:text-gray-900">Blog</a>
            <a href="#" class="mr-5 hover:text-gray-900">Category</a>
            <a href="#" class="mr-5 hover:text-gray-900">Add Blog</a>
            <a href="#" class="mr-5 hover:text-gray-900">Logout</a>
          </nav>
          <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
            <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Logout
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </button>
          </div>
        </div>
      </header> --}}

      <div class="bg-white lg:pb-0">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <header class="flex items-center justify-between py-4 md:py-8">
            <!-- logo - start -->
            <a href="/" class="inline-flex items-center gap-2.5 text-2xl font-bold text-black md:text-3xl" aria-label="logo">
              <svg width="95" height="94" viewBox="0 0 95 94" class="h-auto w-6 text-indigo-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M96 0V47L48 94H0V47L48 0H96Z" />
              </svg>

              BlogByte
            </a>
            <!-- logo - end -->
            @if (!request()->routeIs(['user.login', 'user.register']))
            <!-- nav - start -->
            <nav class="hidden gap-12 lg:flex">
                <a href="{{ route('user.home') }}" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">Home</a>

                <a href="{{ route('user.blog') }}" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">Blog</a>

                <a href="{{ route('user.post') }}" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">Post</a>

                <a href="{{ route('user.contact') }}" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">Contact</a>
            </nav>
            <!-- nav - end -->

            <!-- buttons - start -->
            <div class="-ml-8 hidden flex-col gap-2.5 sm:flex-row sm:justify-center lg:flex lg:justify-start">
              {{-- {{ route('logout') }} --}}
              <a href="{{ route('logout.user') }}" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Logout</a>
            </div>
            <!-- buttons - end -->
            @endif
          </header>
        </div>
      </div>
