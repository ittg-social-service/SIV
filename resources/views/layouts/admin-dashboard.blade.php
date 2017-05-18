@extends('layouts.main')
@section('css')
  <link href="/css/client-dashboard.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')

<div class="main-section">
  <div class="navbar-fixed ">
    <nav class="z-depth-1 top-nav">
      <div class="nav-wrapper">
        <a href="{{ url('/') }}" class="brand-logo hide-on-large-only">
        <img src="/img/logo_white.png" alt="">
        </a>
        <div class="row ">
          <div class="col m10">
            <form class="row">
              <div class="input-field col m12">
                <input id="search" type="search" required>
                <label for="search"><i class="material-icons search-icon">search</i></label>
                <i class="material-icons">close</i>
              </div>
            </form>
          </div>
          <div class="col m2">
            <div class="row">
              <div class="col m12  map-client-opts  dropdown-button " data-activates='dropdown1'>
                <div class='row'>
                  <div class="col m4 ">
                    <img src="{{ Auth::user()->avatar }}" alt="" class="right">
                  </div>
                  <div class="col m8 ">
                    <div class="">
                      <i class="tiny material-icons">settings</i>
                    </div>
                  </div>
                </div>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                  <li>
                  <a class="lime-text accent-3" href="{{ url('/logout') }}">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <a href="#" data-activates="out" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  </div>
</div>

<div class="menu">
   <ul id="out" class="side-nav fixed z-depth-0">
      <div class="side-nav-logo hide-on-med-and-down z-depth-0">
        <a href="{{ url('/') }}" class="brand-logo center">
          <img src="/img/logo_white.png" alt="">
        </a>
      </div>
      <div class="client-info">
         <div class="">
            <img src="{{ Auth::user()->avatar }}" alt="" class="avatar">
         </div>
         <div>
            <span class=" client-name lime-text accent-3" >{{ Auth::user()->name }}</span>
         </div>

      </div>
      <div class="container">
         <div class="divider"></div>
         <li>
            <a href="{{ url('admin/clients') }}" class=" lime-text accent-3">
               <i class="material-icons">directions_car</i>
               <span>
                  Clientes
               </span>
            </a>
         </li>
         <li>
            <a href="{{ url('admin/devices') }}" class="lime-text accent-3">
               <i class="material-icons">supervisor_account</i>
               <span>
                  Dispositivos
               </span>
            </a>
         </li>
         <li>
            <a href="{{ url('admin/sales') }}" class="lime-text accent-3">
               <i class="material-icons">supervisor_account</i>
               <span>
                  Asignaciones
               </span>
            </a>
         </li>

          <li>
             <a class="lime-text accent-3" href="{{ url('/logout') }}">
                <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">exit_to_app</i>
                Logout
             </a>
          </li>
      </div>


   </ul>
</div>

      <div id="main-content">
        <div class="container">
            @if (notify()->ready())
                <script>
                  Materialize.toast('{!! notify()->message() !!}', {{ notify()->option('timer') }}, '{{ notify()->type() }}')

                </script>
            @endif
            @yield('admin-dash-content')
            <div class="fixed-action-btn horizontal " style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red">
                  <i class="material-icons">add</i>
                </a>
                <ul>
                  <li>
                      <a class="btn-floating red tooltipped" data-position="top"  data-tooltip="Usuario" href="{{ url('admin/clients/create') }}">
                          <i class="material-icons">face</i>
                      </a>
                  </li>
                  <li>
                      <a class="btn-floating yellow darken-1 tooltipped" data-position="top" data-tooltip="Dispositivo" href="{{ url('admin/devices/create') }}">
                          <i class="material-icons">devices</i>
                      </a>
                  </li>

                </ul>
          </div>
        </div>

@endsection
