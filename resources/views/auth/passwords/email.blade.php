@extends('layouts.main')

<!-- Main Content -->
@section('content')
<section class="login">
       <div class=" gradient3 big-padding login-section">
           @include('shared.menu')
           <div class="center">
               <h1 class="white-text text-lighten-2 flow-text">Recuperar Contraseña</h1>
           </div>
           <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               {{--  <div class="panel-heading">Reset Password</div> --}}
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6 input-field col m4 offset-m2">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                <label for="email" class="col-md-4 control-label">Correo</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Enviar Link de recuperación
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
</section>

@endsection
