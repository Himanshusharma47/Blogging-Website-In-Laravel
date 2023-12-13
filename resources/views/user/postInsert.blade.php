@extends('user.layouts.main')

@push('title')
   Post-Add
@endpush

@section('postinsert-section')
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

    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">Post Add</h2>

            <form method="post" action="{{ route('post.data') }}" enctype="multipart/form-data"
                class="mx-auto max-w-lg rounded-lg border">
                @csrf
                <div class="flex flex-col gap-4 p-4 md:p-8">
                    <div>
                        <input type="hidden" name="userid" value="{{ $userId }}">
                        <label for="title" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Select
                            Category</label>
                        <select name="category" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800">
                            <optgroup label="Categories">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div>
                        <label for="title" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Title</label>
                        <input type="text" name="title"
                            class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
                            required />
                    </div>

                    <div>
                        <label for="image" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">File
                            Upload</label>
                        <input type="file" name="image"
                            class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
                            required />
                    </div>

                    <div>
                        <label for="password" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Post</label>
                        <textarea type="text" id="postContent" name="post"
                            class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
                            required></textarea>
                    </div>
                    <br>

                    <button type="submit"
                        class="block rounded-lg bg-green-800 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-green-300 transition duration-100 hover:bg-green-700 focus-visible:ring active:bg-green-600 md:text-base">Submit</button>
            </form>
        </div>
    </div>
@endsection
