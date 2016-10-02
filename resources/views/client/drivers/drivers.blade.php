@extends('layouts.client-dashboard')
@include('shared.client-top-nav')
@section('client-dash-content')
  <div class="container">
    <ul class="collection">
      @foreach ($user_drivers as $driver)
        <li class="collection-item avatar">
          <img src="{{$driver->avatar}}" alt="" class="circle">
          <span class="title">{{$driver->name}}</span>
          <p>Gonzales <br>
             {{$driver->name}}@gmail.com
          </p>
          <a href="{{ route('client.drivers.edit', $driver->id) }}"class="secondary-content"><i class="material-icons">edit</i></a>
        </li>
      @endforeach
      
      
    </ul>
   
  </div>
@endsection
