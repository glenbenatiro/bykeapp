@extends('layouts.app')

@section('content')

<div class="mt-12 flex flex-col shadow-md rounded p-8">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex flex-col">
            <label for=" email" class="">E-Mail Address</label>
            <input id="email" type="email" class="mt-2 shadow" name="email" value="{{ old('email') }}" required
                autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="flex flex-col mt-6">
            <label for="password">Password</label>

            <div class="">
                <input id="password" type="password" class="w-full mt-2 shadow" name="password" required
                    autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="flex mt-6">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="flex mt-6">
            <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded-full">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
            <a class="ml-4 px-4 py-2 text-white bg-green-600 rounded-full" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
    </form>
</div>
@endsection
