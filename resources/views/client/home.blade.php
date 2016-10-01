@extends('layouts.client-dashboard')
@section('client-dash-content')
<div ng-app="app">
  <div ng-controller="homeController">
    <div class="container">
          <div class="row">
              <div class="col s12 m4" ng-repeat="device in devices">
                <div class="card  z-depth-1 hoverable " device-id="@{{device.id}}">
                    <div class="card-image mi-car waves-effect waves-block waves-light">
                      <img class="activator"  ng-src="@{{device.picture}}">
                      <span class="card-title main-card-title activator">@{{device.type}}<i class="material-icons right">more_vert</i></span>
                    </div>
                    <div class="card-action">
                      <div class="row">
                        <div class="col m4 s4">
                          <div class="center ">
                            <a class="left  disabled active-car-indicator red-text" href="#" ng-click="toggleDinamicMap(device.id)"><i class="material-icons right pink-text">directions_car</i></a>
                          </div>
                        </div>
                        <div class="col m4 s4">
                          <div class="center ">
                            <a class="left" href="#" ng-click="edit(device.id)"><i class="material-icons right green-text">mode_edit</i></a>
                          </div>
                        </div>
                        <div class="col m4 s4">
                          <div class=" center">
                             <a class="left" href="#" ng-click="showStaticMap(device.id)"><i class="material-icons right blue-text">room</i></a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">@{{device.type}}<i class="material-icons right">close</i></span>
                      <span class="center-align">Conductor</span>
                       <div class="row valign-wrapper">
                          <div class="col s2 m4">
                            <img ng-src="@{{device.avatar}}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                          </div>
                          <div class="col s10 m7">
                              <a href="">@{{device.name}}</a> <br>
                            <span class="black-text">
                              Castillejos Lara
                            </span>
                          </div>
                        </div>
                        <span class="black-text">
                              eliverlara@gmail.com
                            </span>
                      
                     {{--  <div class="card-actions row">
                        <div class="card-action-item col m4">
                          <div class="center">
                            <a href="#" ng-click="edit(device.id)">
                              <i class="material-icons">mode_edit</i>
                              Editar
                            </a>
                          </div>
                        </div>
                        <div class="card-action-item col m4">
                          <div class="center">
                            <a href="#" ng-click="edit(device.id)">
                              <i class="material-icons">room</i>
                              Mapa
                            </a>
                          </div>
                        </div>
                        <div class="card-action-item col m4">
                          <div class="center">
                            <a href="#" ng-click="showStaticMap(device.id)">
                              <i class="material-icons">directions_car</i>
                              Activo
                            </a>
                          </div>
                        </div>
                      </div> --}}
                    </div>
                </div>
              </div>
      </div>
      
    </div>

    <div class="dinamicMap" ng-class="{ 'show' : isDinamicMapOpen }">
{{-- 
      <p ng-click="toggleDinamicMap(-1)" class="btn close">cerrar</p> --}}
      <div id="dinamicMapContainer"></div>

      <div class="row">
        <div class="col s12 m2 offset-m10 travel-info">
          <div class="card-panel elegant-bg">
            <div class="driver-info">
              <div class="center">
                <span class="title">Conductor</span>
              </div>
              <div class="row">
                <div class="col m4">
                  <img src="@{{ targetDeviceData.driver.avatar }}" alt="" class="avatar circle left">
                </div>
                <div class="col m7">
                  <span class="">@{{targetDeviceData.driver.name}}</span>
                  <button class="btn btn-flat gray">Ver</button>
                </div>
              </div>
            </div>
            
            <div class="divider"></div>
            <div class="">
              <div class="center">
                <span class="title">Estadisticas</span>
              </div>
              <i class="material-icons small">visibility</i>
              <span class="red-text">@{{ targetDeviceData.numAlerts }}</span>
            </div>
            <div class="divider"></div>
            <div class="active_devices">
              <div class="center">
                <span class="title">Dispositivos activos</span>  
              </div>
          {{--     <ul>
                <li ng-repeat="device in active_devices"></li>
              </ul> --}}
            </div>
            
          </div>
          <div>
            
            
          </div>
        </div>
      </div>
      <div class="menu">
         <ul id="out" class="side-nav fixed z-depth-1">
            <div class="side-nav-logo hide-on-med-and-down z-depth-0">
              <a href="{{ url('/') }}" class="brand-logo center">
              {{--   <img src="/img/logo_white.png" alt=""> --}}
              </a>
            </div>
            <div class="client-info">
               <div class="">
                  <img src="{{ Auth::user()->avatar }}" alt="" class="avatar">
               </div>
               <div>
                  <a class="dropdown-button client-name lime-text accent-3" data-activates='client-opts'>{{ Auth::user()->name }} <i class="tiny material-icons">settings</i></a>
               </div>
                <ul id='client-opts' class='dropdown-content'>
                  <a class="lime-text accent-3" href="{{ url('/client/settings') }}">
                    <i class="material-icons">settings</i>
                    <span>Settings</span>
                  </a>>
                  <li class="divider"></li>
                  <li>
                     <a class="lime-text accent-3" href="{{ url('/logout') }}">Logout</a>
                  </li>
                </ul>
            </div>
            <div class="container">
              {{-- <div class="divider"></div> --}}

               <li>
                  <a href="#" ng-click="toggleDinamicMap(-1)" class=" lime-text accent-3">
                     <i class="material-icons">directions_car</i>
                     <span>
                        Mis autos
                     </span>
                  </a>
               </li>
               <li>
                  <a href="{{ url('/client/drivers') }}" class="lime-text accent-3">
                     <i class="material-icons">airline_seat_recline_normal</i>
                     <span>
                        Mis choferes
                     </span>
                  </a>
               </li>
               <li>
                  <a href="{{ url('/client/stats') }}" class="lime-text accent-3">
                     <i class="material-icons">assessment</i>
                     <span>
                        Estadisticas
                     </span>
                  </a>
               </li>
              <li>
                <a class="lime-text accent-3" href="{{ url('/client/settings') }}">
                  <i class="material-icons">settings</i>
                  <span>Settings</span>
                  </a>
              </li>
              <li>
                 <a class="lime-text accent-3" href="{{ url('/logout') }}">
                    <i class="material-icons">exit_to_app</i>
                 Logout</a>
              </li>
            </div>
         </ul>
      </div>
    </div>
</div>
</div>
{{-- <script src="//js.pusher.com/3.0/pusher.min.js"></script>
<script>
  var pusher = new Pusher("{{env("PUSHER_KEY")}}");
  var userDevices = {!!json_encode ($user_devices->toArray())!!};
  var devicesIds = [];
  userDevices.forEach(function (item) {
    devicesIds.push(item.id);
  });

</script>
<script src="/js/pusher.js"></script>
 --}}
 <script>
    var pusher = new Pusher("{{getenv("PUSHER_KEY")}}");
    var userDevices = {!!json_encode ($user_devices->toArray())!!};
  </script>
  <script src="/js/pusher.js"></script>
@endsection

