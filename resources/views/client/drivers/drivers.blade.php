@extends('layouts.client-dashboard')
@include('shared.client-top-nav')
@section('client-dash-content')
  <div class="container">
    <ul class="collection">
      @foreach ($user_drivers as $driver)
        <li class="collection-item avatar">
          <img src="{{$driver->avatar}}" alt="" class="circle">
          <span class="title"><i class="fa fa-drivers-license"></i> {{$driver->name}}</span>
          <p>{{$driver->lastn1}} {{$driver->lastn2}} <br>
             {{$driver->name}}@gmail.com<hr>
             <span class="red-text"><i class="fa fa-car"></i> Auto asignado: </span>
             {{$driver->device->type}}<br>
             <span class="red-text"> Placas de auto: </span><br>
             {{$driver->device->license_plate}}<br>
          </p>
          <a href="{{ route('client.drivers.edit', $driver->id) }}"class="secondary-content"><i class="material-icons">edit</i></a>
        </li>
      @endforeach


    </ul>

  </div>
@endsection
