@extends('layouts.app')

@section('content')


<div class="flex flex-col w-1/2">
        <img src="{{ asset('img/bike.jpg') }}" class="py-6" style="max-width:70%;">
     </div>


      <div class="flex w-1/2 flex-col">
          <p class="text-center text-splash font-thin">What Is Bike?</p>
          <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lobortis, dui a iaculis dignissim, massa diam cursus enim, ac cursus arcu tellus id odio. Vivamus leo augue, fringilla vitae congue et, pretium non metus. Mauris sed lorem feugiat nulla ultrices hendrerit ac nec felis. Fusce a mi eu elit hendrerit eleifend. Morbi egestas, purus quis facilisis placerat, augue odio ullamcorper dolor, sit amet scelerisque augue elit eget massa. Aenean faucibus mattis nisl, quis rhoncus ipsum lacinia non. 
          </p>
      </div>



@endsection