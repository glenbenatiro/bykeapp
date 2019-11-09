@extends('layouts.app')

@section('content')

<p class="text-splash font-light text-green-600">Invest a Bike!</p>

<div class="mt-6 flex flex-col w-1/2 items-center">
    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vehicula dictum nisi nec
        ultrices. Pellentesque
        malesuada lacus eleifend urna molestie, quis sodales diam porttitor. Pellentesque maximus tempor odio nec
        porttitor.
        Nam condimentum nunc dignissim nulla dictum, sed aliquam tortor aliquet. Integer iaculis tortor sed mauris
        laoreet
        pulvinar. Duis ut augue lectus. Pellentesque quis suscipit sem. Etiam vulputate tempor sem, vel imperdiet libero
        porttitor scelerisque.</p>

    @if ($user->isInvestor)
    <p class="mt-6 text-3xl text-green-600 font-light text-center">You are aleady an investor,<br>with a bike ID of
        {{$user->bike->id}}. Thank
        you!</p>
    @else
    <form method="post" action="/bikes" class="mt-12">
        @csrf
        <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
        <button type="submit" class="px-4 py-2 text-white text-xl font-thing bg-yellow-400 rounded-full">Invest Now (₱5,000)</button>
    </form>
    @endif
</div>
@endsection
