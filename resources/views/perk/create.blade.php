@extends('layouts.app')

@section('content')

<div class="flex flex-col">
    <p class="text-3xl font-thin  text-green-600">Create Perk</p>
</div>

<div class="flex flex-col mt-6 shadow p-6">
    <form method="post" action="/perks">
        @csrf
        <div class="flex flex-col">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="mt-1 shadow">
        </div>

        <div class="flex flex-col mt-6 ">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="mt-1 shadow">
        </div>

        <div class="flex flex-col mt-6">
            <label for="points">Points</label>
            <input type="text" name="points" id="points" class="mt-1 shadow">
        </div>

        <div class="flex flex-col mt-6">
            <button type="submit" class="px-4 py-2 bg-green-600 rounded-full">Create Perk</button>
        </div>
    </form>
</div>

@endsection
