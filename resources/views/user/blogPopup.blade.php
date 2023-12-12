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
            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{asset($item->image)}}">
            <div class="text-center lg:w-2/3 w-full">
                <h3 class="text-gray-500 text-xl tracking-widest title-font mb-1">Category : {{$item->getCategory->category}}</h3>
                <h1 class="title-font sm:text-4xl text-xl mb-4 font-medium text-gray-900">{{$item->title}}</h1>
                <p class="mb-8 leading-relaxed text-xl">{{$item->post}}</p>
            </div>
            @endforeach
        </div>
      </section>


@endsection
