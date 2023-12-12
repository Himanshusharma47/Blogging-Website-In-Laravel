@extends('user.layouts.main')

@section('blogpopup-section')
     <!-- Display error message if available in the session -->
     @if(session('error'))
     <div class="alert alert-danger">
         {{ session('error') }}
     </div>
     @endif

     <!-- Display success message if available in the session -->
     @if (session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
     @endif

     <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            @foreach ($singlePost as $item)
            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{asset('images/' . $item->image)}}">
            <div class="text-center lg:w-2/3 w-full">
                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                <h2 class="text-gray-900 title-font text-lg font-medium">{{$item->getCategory->category}}</h2>
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{$item->title}}</h1>
                <p class="mb-8 leading-relaxed">{{$item->post}}</p>
            </div>
            @endforeach
        </div>
      </section>


@endsection
