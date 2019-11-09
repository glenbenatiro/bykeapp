@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <p class="mb-6 text-3xl font-thin text-green-600 text-center">Register</p>
    <form method="POST" action="{{ route('register') }}" class="p-6 shadow">
        @csrf

        <div class="mb-6">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="shadow @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="shadow @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <div class="col-md-6">
                <p>Phone Number</p>
                <input id="phone" type="phone" name="phone" class="shadow">
            </div>
        </div>

        <div class="mb-6">
            <div class="col-md-6">
                <p>First Name</p>
                <input id="first" type="first" name="first" class="shadow">
            </div>
        </div>

        <div class="mb-6">
            <div class="col-md-6">
                <p>Last Name</p>
                <input id="last" type="last" name="last" class="shadow">
            </div>
        </div>

        <div class="mb-6">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="shadow @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="shadow" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="w-full px-4 py-2 text-white bg-green-600 rounded-full align-center">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
