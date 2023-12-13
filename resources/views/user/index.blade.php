@extends('user.layouts.main')

@section('home-section')
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

     <!--Intro section-->
     <div class="bg-white pb-6 sm:pb-8 lg:pb-12 mb-10">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">

          <section class="min-h-96 relative flex flex-1 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-gray-100 py-16 shadow-lg md:py-20 xl:py-48">
            <!-- image - start -->
            <img src="https://images.unsplash.com/photo-1618004652321-13a63e576b80?auto=format&q=75&fit=crop&w=1500" loading="lazy" alt="Photo by Fakurian Design" class="absolute inset-0 h-full w-full object-cover object-center" />
            <!-- image - end -->

            <!-- overlay - start -->
            <div class="absolute inset-0 bg-indigo-500 mix-blend-multiply"></div>
            <!-- overlay - end -->

            <!-- text start -->
            <div class="relative flex flex-col items-center p-4 sm:max-w-xl">
              <p class="mb-4 text-center text-lg text-indigo-200 sm:text-xl md:mb-8"> Intro</p>
              <h1 class="mb-8 text-center text-4xl font-bold text-white sm:text-5xl md:mb-12 md:text-6xl">Welcome To BlogByte</h1>

              <div class="flex w-full flex-col gap-2.5 sm:flex-row sm:justify-center">
                <a href="{{ route('user.blog')}}" class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">Get Started</a>
              </div>
            </div>
            <!-- text end -->
          </section>
        </div>
      </div>

      <!--Blog Find-->
    <div class="bg-white pb-2 sm:pb-8 lg:pb-12" >
        <section class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="mb-8 flex flex-wrap justify-between md:mb-16">
            <div class="mb-6 flex w-full flex-col justify-center sm:mb-12 lg:mb-0 lg:w-1/3 lg:pb-24 lg:pt-48">
              <h1 class="mb-4 text-4xl font-bold text-black sm:text-5xl md:mb-8 md:text-6xl">Find your<br />Blogs Here </h1>

              <p class="max-w-md leading-relaxed text-gray-500 xl:text-lg">This is a section of some simple filler text, also known as placeholder text. It shares characteristics of real text.</p>
            </div>

            <div class="mb-12 flex w-full md:mb-16 lg:w-2/3">
              <div class="relative left-12 top-12 z-10 -ml-12 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:left-16 md:top-16 lg:ml-0">

                <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=550&h=550" loading="lazy" alt="Photo by Kaung Htet" class="h-full w-full object-cover object-center" />
              </div>

              <div class="overflow-hidden rounded-lg bg-gray-100 shadow-lg">
                <img src="https://images.unsplash.com/photo-1610465299996-30f240ac2b1c?auto=format&q=75&fit=crop&w=550&h=550" loading="lazy" alt="Photo by Manny Moreno" class="h-full w-full object-cover object-center" />
              </div>
            </div>
          </div>
        </section>
    </div>

    <!--blog section-->
    <div class="bg-white py-6 sm:py-8 lg:py-12 mb-10">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
          <!-- text - start -->
          <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Blog </h2>

            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Whether sharing your expertise, breaking news, or whatever’s on your mind, you’re in good company on Blogger. Sign up to discover why millions of people have published their passions here.</p>
          </div>
          <!-- text - end -->

          <div class="grid gap-8 sm:grid-cols-2 sm:gap-12 lg:grid-cols-2 xl:grid-cols-2 xl:gap-16">
            @foreach ($blogData as $item )
            <!-- article - start -->
            <div class="flex flex-col items-center gap-4 md:flex-row lg:gap-6">
              <a href="#" class="group relative block h-100 w-full shrink-0 self-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-24 md:w-24 lg:h-40 lg:w-40">
                <img src="{{$item->image}}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
              </a>

              <div class="flex flex-col gap-2">
                <span class="text-sm text-gray-400">{{$item->updated_at}}</span>

                <h2 class="text-xl font-bold text-gray-800">
                  <a href="#" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{$item->title}}</a>
                </h2>

                <p class="text-gray-500">{{Str::limit($item->post, 100)}}</p>

                <div>
                  <a href="{{url('postid/'.$item->id)}}" class="font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Read more</a>
                </div>
              </div>
            </div>
            <!-- article - end -->
            @endforeach
          </div>
        </div>
      </div>

      <!--contact section-->
      <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="flex flex-col overflow-hidden rounded-lg bg-gray-200 sm:flex-row md:h-80">
            <!-- image - start -->
            <div class="order-first h-48 w-full bg-gray-300 sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5">
              <img src="https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?auto=format&q=75&fit=crop&w=1000" loading="lazy" alt="Photo by Andras Vas" class="h-full w-full object-cover object-center" />
            </div>
            <!-- image - end -->

            <!-- content - start -->
            <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5">
              <h2 class="mb-4 text-xl font-bold text-gray-800 md:text-2xl lg:text-4xl">Help center</h2>

              <p class="mb-8 max-w-md text-gray-600">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text.</p>

              <div class="mt-auto">
                <a href="{{ route('user.contact') }}" class="inline-block rounded-lg bg-white px-8 py-3 text-center text-sm font-semibold text-gray-800 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:text-base">Contact support</a>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
