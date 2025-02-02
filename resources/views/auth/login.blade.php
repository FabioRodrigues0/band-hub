@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-zinc-950">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-zinc-900 shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-200">Login</h2>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block font-medium text-sm text-gray-200">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="block mt-1 w-full rounded-md shadow-sm border-zinc-700 bg-zinc-800 text-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block font-medium text-sm text-gray-200">Password</label>
                    <input id="password" type="password" name="password" required
                        class="block mt-1 w-full rounded-md shadow-sm border-zinc-700 bg-zinc-800 text-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mt-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-zinc-700 bg-zinc-800 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-200">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('register') }}" class="text-sm text-gray-200 hover:text-gray-100">
                        Need an account?
                    </a>

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
