@extends('layouts.admin-dashboard')

@section('admin-dash-content')
    {!! Form::open(['route' => 'admin.devices.store', 'method' => 'POST'])!!}
           {{--  <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <input type="text" value="" placeholder="Mac" name="device">
            <input type="submit" value="Guardar">
    {!! Form::close()!!}
@endsection
