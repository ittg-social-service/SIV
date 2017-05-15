@extends('layouts.main')
@section('css')
  <link href="/css/client-dashboard.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>  
  <script src="/js/angular.js"></script>  
  <script src="/js/image.preview.js"></script>
  <script src="/js/time-picker/picker.js"></script>
  <script src="/js/time-picker/picker.time.js"></script>
  <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtR1U_kSaLg-n5QWk55eA93XmQw5Ckv84">
  </script>
  <script  src="//js.pusher.com/3.0/pusher.min.js"></script>
@endsection

@section('content')



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
                  </a>
                  <li class="divider"></li>
                  <li>
                     <a class="lime-text accent-3" href="{{ url('/logout') }}">Logout</a>
                  </li>
                </ul>
            </div>
            <div class="container">
              {{-- <div class="divider"></div> --}}

               <li>
                  <a href="{{ url('/client/home') }}" class=" lime-text accent-3">
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
      <div id="main-content">
        <div class="">
            {{-- @if (notify()->ready())
            <script>
              Materialize.toast('{!! notify()->message() !!}', {{ notify()->option('timer') }}, '{{ notify()->type() }}')

            </script>
        @endif --}}
            @yield('client-dash-content')
        </div>
        </div>

@endsection
