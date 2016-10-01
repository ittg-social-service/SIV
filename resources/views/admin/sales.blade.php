
@extends('layouts.admin-dashboard')

@section('admin-dash-content')
    {!! Form::open(['route' => 'admin.sales.store', 'method' => 'POST'])!!}
     <div class="input-field col s12">
        <select name="client">
          <option value="" disabled selected >Seleccione un cliente</option>
          @foreach ($clients as $client)
            <option value="{{$client->id}}">{{$client->name}}</option>
          @endforeach
        </select>
        <label>Usuarios</label>
      </div>

      <div class="input-field col s12">
        <select name="device">
          <option value="" disabled selected >Seleccione un dispositivo</option>
          @foreach ($available_devices as $device)
            <option value="{{$device->id}}">{{$device->device}}</option>
          @endforeach
        </select>
        <label>Dispositivos disponibles</label>
      </div>

       <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Register
                </button>
            </div>
        </div>
    {!! Form::close()!!}

@endsection
