@extends('user.layouts.main')

@section('profile-section')

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
 
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <div class="rounded-lg bg-gray-100 px-4 py-6 md:py-8 lg:py-12">
        <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Welcome {{ Auth::user()->name}}</p>
        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Here is Your Created Post Available</h2>
      </div>
    </div>
  </div>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -mx-4 -mb-10 text-center">
        @foreach ($post as $item)
        <div class="sm:w-1/2 mb-10 px-4">
          <div class="rounded-lg h-64 overflow-hidden">
            <img alt="content" class="object-cover object-center h-full w-full" src="{{$item->image}}">
          </div>
          <div class="flex flex-wrap py-15 mt-2">
            <a href="{{ url('delete-post/'. $item->id)}}"><i class="fa-solid fa-trash-arrow-up"></i></a>
          </div>
            <h2 class="title-font text-2xl font-medium text-gray-900 mb-3">{{$item->title}}</h2>
            <p class="leading-relaxed text-base">{{Str::limit($item->post,100)}}</p><br>
            <div class="p-2 w-full">
                <a href="{{ url('postid/'.$item->id)}}"><button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Read More -></button></a>
            </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
 

@endsection
