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

     <style>
        div#social-links {
            margin: 0 auto;
            max-width: 500px;
        }
        div#social-links ul li {
            display: inline-block;
        }
        div#social-links ul li a {
            padding: 5px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 20px;
            /* color: #222; */
            background-color: #ffffff;
        }
    </style>
     <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            @foreach ($singlePost as $item)
            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{asset($item->image)}}">
            <div class="text-center lg:w-2/3 w-full">
                <h3 class="text-gray-500 text-xl tracking-widest title-font mb-1">Category : {{$item->getCategory->category}}</h3>
                <h1 class="title-font sm:text-4xl text-xl mb-4 font-medium text-gray-900">{{$item->title}}</h1>
                <p class="mb-8 leading-relaxed text-xl">{{$item->post}}</p>
            </div>
            <div class="social-links">
                {!! $share = \Share::page('hello','you post')
                ->whatsapp()
                ->linkedin(); !!}
            </div>
            @endforeach
        </div>
      </section>

      <!--share button scripts-->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
      <script src="{{ asset('js/share.js') }}"></script>


@endsection
