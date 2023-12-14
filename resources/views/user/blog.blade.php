@extends('user.layouts.main')

@push('title')
  Blogs
@endpush

@section('blog-section')
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
        <div class="container px-5 py-20 mx-auto">
            <div class="flex flex-col md:pr-10 md:mb-0 mb-6 pr-0 w-full md:w-auto md:text-left ">
                <h2 class="text-xl text-indigo-500 tracking-widest font-medium title-font mb-3">Select Category</h2>
                <select name="category" id="category-select" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800">
                    <optgroup label="Categories">
                        <option value="">All Categories</option>
                        @foreach ($categoryData as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
            <br><br>
            <div class="flex flex-wrap -m-4">
                @foreach ($blogData as $item)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a class="block relative h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                src="{{ asset($item->image) }}"></a>
                        <div class="mt-4">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $item->getCategory->category }}</h2>
                            <a href="{{ url('postid/' . $item->id) }}">
                                <p class="mt-1">Read More -></p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $blogData->links('pagination::bootstrap-5') }}
        </div>
    </section>


    <script>
        // script for select category from option selections
        document.getElementById('category-select').addEventListener('change', function() {
            var categoryId = this.value;
            if (categoryId) {
                window.location.href = 'categoryid/' + categoryId; // Replace '/your-route/' with your actual route
            }
        });
    </script>
@endsection
