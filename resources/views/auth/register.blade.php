@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="max-w-sm rounded overflow-hidden lg:shadow-lg lg:border mx-auto mt-10 pt-2 pb-5 ">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-6 text-center"> {{ __('Register') }} </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <label class="block mb-3">
                        <span class="block text-gray-700 text-sm font-bold mb-2"> {{ __('Name') }} </span>
                        <input type="text" class="form-input mt-1 block w-full @error('username') border-red-600 @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </label>

                    <label class="block mb-3">
                        <span class="block text-gray-700 text-sm font-bold mb-2"> {{ __('Email address') }} </span>
                        <input type="email" class="form-input mt-1 block w-full @error('email') border-red-600 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </label>

                    <label class="block mb-3">
                        <span class="block text-gray-700 text-sm font-bold mb-2"> {{ __('Password') }} </span>
                        <input id="password" type="password" class="form-input mt-1 block w-full @error('password') border-red-600 @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </label>

                    <label class="block mb-3">
                        <span class="block text-gray-700 text-sm font-bold mb-2"> {{ __('Confirm Password') }} </span>
                        <input id="password-confirm" type="password" class="form-input mt-1 block w-full" name="password_confirmation" required autocomplete="new-password">
                    </label>

                    <button type="submit" class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
                        {{ __('Register') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
