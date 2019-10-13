@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="max-w-sm rounded overflow-hidden lg:shadow-lg lg:border mx-auto mt-10 pt-2 pb-5 ">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-6 text-center"> {{ __('Login') }} </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <label class="block mb-3">
                        <span class="block text-gray-700 text-sm font-bold mb-2"> {{ __('E-Mail Address') }} </span>
                        <input id="email" type="email" class="form-input mt-1 block w-full @error('email') border-red-600 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </label>

                    <label class="block mb-3">
                        <span class="block text-gray-700 text-sm font-bold mb-2"> {{ __('Password') }} </span>
                        <input id="password" type="password" class="form-input mt-1 block w-full @error('password') border-red-600 @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </label>


                    <label class="inline-flex items-center">
                        <input class="form-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2"> {{ __('Remember Me') }} </span>
                    </label>

                    <button type="submit" class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="mt-5 inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                </form>
            </div>
        </div>
    </div>
@endsection
