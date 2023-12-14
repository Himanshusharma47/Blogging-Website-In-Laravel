@extends('user.layouts.main')

@push('title')
  Login
@endpush

@section('login')
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
    <!-- Login Form -->
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">Login</h2>

            <form method="post" action="{{ route('userlogin.data') }}" class="mx-auto max-w-lg rounded-lg border">
                @csrf
                <div class="flex flex-col gap-4 p-4 md:p-8">
                    <div>
                        <label for="email" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Username</label>
                        <input type="text" name="name"
                            class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"
                            required />
                    </div>

                    <div>
                        <label for="password" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Password</label>
                        <input type="password" name="password"
                            class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" id="password"
                            required />
                        <div class="mt-2 flex items-center">
                            <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()">
                            <label for="showPassword" class="ml-2 text-sm text-gray-600">Show Password</label>
                        </div>
                    </div>

                    <button type="submit"
                        class="block rounded-lg bg-gray-800 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-100 hover:bg-gray-700 focus-visible:ring active:bg-gray-600 md:text-base">Log
                        in</button>

                        <div class="relative flex items-center justify-center">
                            <span class="absolute inset-x-0 h-px bg-gray-300"></span>
                            <span class="relative bg-white px-4 text-sm text-gray-400">Log in with social</span>
                        </div>

                        <a href="{{ url('auth/google') }}"
                            class="flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-1 py-3 text-center text-sm font-semibold text-gray-800 outline-none ring-gray-300 md:text-base">
                            <i class="fa-brands fa-google"></i>
                            Continue with Google
                        <a>
                        <a href="{{ url('login/facebook') }}"
                            class="flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-0 py-3 text-center text-sm font-semibold text-gray-800 outline-none ring-gray-300  md:text-base">
                            <i class="fa-brands fa-facebook"></i>
                            Continue with Facebook
                        <a>

                    <div class="flex items-center justify-center bg-gray-100 p-4">
                        <p class="text-center text-sm text-gray-500">Don't have an account? <a
                                href="{{ route('user.register') }}"
                                class="text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Register</a>
                        </p>
                    </div>
            </form>
        </div>
    </div>
@endsection
