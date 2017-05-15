@extends('layouts.client-dashboard')
@include('shared.client-top-nav')
@section('client-dash-content')
  <div class="container">
    <div class="row">
          <div class="col s12 m12">
        <div class="card-panel white">
          <div class="row">
           {!! Form::open(['route' => ['client.drivers.update', $target], 'files' => true, 'method' => 'PUT'])!!}
            <div class="col s12 m4">
              <img src="{{$target->avatar}}" id="image" class="edit-driver-avatar responsive-img">
              <div class="file-field input-field">
                <div class="btn" class="blue">
                  <span>Foto</span>
                  <input type="file" name="avatar" id="file" >
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>
            <div class="col s12 m8">
             
                <div class="row">
                  {{-- <div class="file-field input-field col m12">
                    <div class="btn-floating btn-large upload-image-button red">
                      <i class="material-icons">add_a_photo</i>
                      <input type="file" name="avatar" id="file">
                    </div>
                  </div> --}}
                  <div class="input-field col m4">
                    <input type="text" value="{{ $target->name }}" placeholder="Nombre" id="name" name="name">
                    <label for="name">Nombre</label>  
                  </div>
                  <div class="input-field col m4">
                    <input type="text" value="{{ $target->lastn1 }}" placeholder="A. paterno" id="lastn1" name="lastn1">
                    <label for="lastn1">A. Paterno</label>  
                  </div>
                  <div class="input-field col m4">
                    <input type="text" value="{{ $target->lastn2 }}" placeholder="A. Materno" id="lastn2" name="lastn2">
                    <label for="lastn2">A. Materno</label>  
                  </div>
                  <div class="input-field col m6">
                    <input type="text" value="{{ $target->curp }}" placeholder="Curp" id="curp" name="curp">
                    <label for="curp">Curp</label>  
                  </div>
                  <div class="input-field col m6">
                    <input type="text" value="{{ $target->license }}" placeholder="licencia" id="license" name="license">
                    <label for="license">Licencia</label>  
                  </div>
                  <div class="input-field col m6">
                    <input type="text" value="{{ $target->phone }}" placeholder="Telefono" id="phone" name="phone">
                    <label for="phone">Telefono</label>  
                  </div>
                  <div class="input-field col m6">
                    <input type="text" value="{{ $target->address }}" placeholder="Direcion" id="address" name="address">
                    <label for="address">Direccion</label>  
                  </div>
                  <div class="input-field col m6 offset-m3">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                    <i class="material-icons right">send</i>
                  </button>
                  </div>
                  
            
                </div>
            </div>
              {!! Form::close()!!}
          </div>
        </div>
      </div>
      
   {{--    <div class="col m6 s12 offset-m3">
        <div class="card">
          <div class="card-image">
            <img src="{{$target->avatar}}" id="image">
          </div>
          <div class="card-action">
            {!! Form::open(['route' => ['client.drivers.update', $target], 'files' => true, 'method' => 'PUT'])!!}
                <div class="row">
                  <div class="file-field input-field col m12">
                    <div class="btn-floating btn-large upload-image-button red">
                      <i class="material-icons">add_a_photo</i>
                      <input type="file" name="avatar" id="file">
                    </div>

                  </div>
                  <div class="input-field col m12">
                    <input type="text" value="{{ $target->name }}" placeholder="Tipo" id="name" name="name">
                    <label for="name">Nombre</label>  
                  </div>

                  <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                    <i class="material-icons right">send</i>
                  </button>
            
                </div>
              {!! Form::close()!!}
          </div>
        </div>
      </div> --}}
    </div>    
  </div>

@endsection
