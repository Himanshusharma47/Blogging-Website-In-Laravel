@extends('user.layouts.main')

@section('profile-section')

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
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -mx-4 -mb-10 text-center">
        @foreach ($post as $item)
        <div class="sm:w-1/2 mb-10 px-4">
            <div class="rounded-lg h-64 overflow-hidden">
                <img alt="content" class="object-cover object-center h-full w-full" src="{{$item->image}}">
            </div>
            <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">{{$item->title}}</h2>
            <p class="leading-relaxed text-base">{{Str::limit($item->post,100)}}</p><br>

            <div class="social-links">

                {!! $share = \Share::page(null,$item->title)
                ->telegram()
                ->linkedin(); !!}
                </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>

@endsection
