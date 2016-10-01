@extends('layouts.main')

@section('content')
    <section class="login">
       <div class=" gradient big-padding login-section">
           @include('shared.menu')
           <div class="center">
               <h1 class="white-text text-lighten-2 flow-text">Bienvenido</h1>
           </div>
           <div class="row">

               <form class="col s12 m4 offset-m4 gray-text" role="form" method="POST" action="{{ url('/login') }}">

                    {{ csrf_field() }}
                    <div class="row">

                        <div class="login-form-container z-depth-0 center">
                            <div class="row">
                                <h5 class="green-text text-lighten-2 center-align">¡Ingresa los siguientes datos!</h5>
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="validate"  placeholder="E-Mail Address" name="email" >
                                </div>
                                <div class="input-field col s12">
                                    <input id="password" type="password"  class="validate" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        @if (count($errors) > 0)
                          <div class="input-field grey lighten-3 col s12 big-padding login-error-container">
                             <ul>
                              @foreach ($errors->all() as $error)
                                  <li class="">{{ $error }}</li>
                              @endforeach
                  
                             </ul>
                          </div>
                        @endif
                        <div class="input-field col s12">
                            <button class=" send-login-form " type="submit" name="action">Login
                               <i class="flaticon-next"></i>
                            </button>
                        </div>
                        <div class="input-field col s12 center">
                            <a class="reset-password" href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
