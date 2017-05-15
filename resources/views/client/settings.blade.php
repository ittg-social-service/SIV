@extends('layouts.client-dashboard')
@include('shared.client-top-nav')
@section('client-dash-content')
  <div class="container">
    <div class="row">
      <div class="col m6 s12 offset-m3">
        <div class="card">
            <div class="card-image">
              <img src="{{$user->avatar}}" id="image">
            </div>

            <div class="card-action">
              {!! Form::open(['url' => ['client/settings/update', $user->id], 'files' => true, 'method' => 'PUT'])!!}
                <div class="row">
                  <div class="file-field input-field">
                    <div class="btn-floating btn-large upload-image-button red">
                      <i class="material-icons">add_a_photo</i>
                      <input type="file" name="avatar" id="file">
                    </div>
{{--                     <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div> --}}
                  </div>
                  <div class="input-field col m12">
                    <input type="text" value="{{ $user->name }}" placeholder="Nombre" name="name">
                    <label for="name">Nombre</label>
                  </div>
                  <div class="input-field col m6">
                    <input type="text" value="{{ $user->lastname }}" placeholder="Apellido" name="lastname">
                    <label for="lastname">Apellido</label>
                  </div>
                     <div class="input-field col m6">
                    <input type="text" value="{{ $user->email }}" placeholder="Correo" name="email">
                    <label for="email">Correo</label>
                  </div>
                  <div class="input-field col m12">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                    <i class="material-icons right">send</i>
                    </button>
                  </div>
                </div>
              {!! Form::close()!!}
            </div>
          </div>
      </div>
    </div>
    
  </div>
@endsection
