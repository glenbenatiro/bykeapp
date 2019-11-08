@extends('layouts.app')

@section('content')

<div class="flex flex-col">
<p>First Name: {{$user->first_name}}</p>
<p>Last Name: {{$user->last_name}}</p>
<p>Username: {{$user->username}}</p>
<p>Email: {{$user->email}}</p>
<p>Phone: {{$user->phone}}</p>
<p>Points: {{$user->points}}</p>
<p>Total Distance Travelled: {{$user->distance_travelled}}</p>
</div>

@endsection