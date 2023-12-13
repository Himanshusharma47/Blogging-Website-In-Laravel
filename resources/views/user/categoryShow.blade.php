@extends('user.layouts.main')

@push('title')
  Category
@endpush

@section('categoryShow-section')
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

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <!-- back button -->
            <a href="{{ url('/blog') }}" class="btn btn-primary btn-sm ml-2 mb-5">Prevoius Page</a><br>

            <div class="flex flex-wrap -m-4">
                @foreach ($blogData as $item)
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ $item->image }}"
                                alt="blog">
                            <div class="p-6">

                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                    {{ $item->getCategory->category }}</h1>
                                <p class="leading-relaxed mb-3">{{ Str::limit($item->post, 100) }}</p>
                                <div class="flex items-center flex-wrap ">
                                    <a href="{{ url('postid/' . $item->id) }}"
                                        class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <span
                                        class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                    </span>
                                    <a href=""><i class="fa-regular fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
