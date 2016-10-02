@extends('layouts.client-dashboard')
@include('shared.client-top-nav')
@section('client-dash-content')
  <div class="container">
    <div class="row">
      <div class="col m6 s12 offset-m3">
        <div class="card">
          <div class="card-image">
            <img src="{{$target->picture}}" id="image">
          </div>
          <div class="card-action">
            {!! Form::open(['route' => ['client.devices.update', $target], 'files' => true, 'method' => 'PUT'])!!}
                <div class="row">
                  <div class="file-field input-field col m12">
                    <div class="btn-floating btn-large upload-image-button red">
                      <i class="material-icons">add_a_photo</i>
                      <input type="file" name="picture" id="file">
                    </div>
                  {{--   <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div> --}}
                  </div>
                  <div class="input-field col m12">
                    <input type="text" value="{{ $target->type }}" placeholder="Tipo" id="type" name="type">
                    <label for="type">Tipo</label>  
                  </div>
                  <div class="input-field col m12">
                    <input type="text" value="{{ $target->license_plate }}" placeholder="placa" id="license_plate" name="license_plate">
                    <label for="license_plate">Placas</label>
                  </div>
                  
                  <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                    <i class="material-icons right">send</i>
                  </button>
            
                </div>
              {!! Form::close()!!}
          </div>
        </div>
      </div>
    </div>    
  </div>

@endsection
