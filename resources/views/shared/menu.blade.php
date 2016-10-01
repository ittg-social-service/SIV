    <header class="">
        <nav class="transparent aniview" role="navigation" av-animation="slideInDown">
            <div class="nav-wrapper">
                <a href="{{ url('/') }}" class="brand-logo center">
                    <img src="/img/logo_white.png" alt="">
                </a>

                <ul id="nav-mobile2" class="left hide-on-med-and-down ">

                    <li>
                        <a class=" " href="#objective">Nuestro objetivo</a>
                    </li> 
                     <li>
                        <a class=" " href="#description">Descripción</a>
                    </li> 
                     <li>
                        <a class=" " href="#benefits">Caracteristicas</a>
                    </li>
                    {{--   <li>
                        <a class=" " href="">Lo mejor</a>
                    </li>  --}}
                </ul>
                <ul id="nav" class="right hide-on-med-and-down transparent">

                    @if (Auth::guest())
                    {{-- <li><a class="" href="#login">Login scroll</a></li>  --}}
                        <li>
                            <a  href="{{ url('/login') }}">
                                <span class="login-button" >Login</span>
                            </a>
                        </li> 
                    @else
                         <li>
                            <a  href="{{ url('/client/home') }}">
                                <span class="login-button" >My dashboard</span>
                            </a>
                        </li> 
                
                    {{-- <li><a class="mdl-navigation__link" href="{{ url('/register') }}">Register</a></li>   --}}

                    @endif
                </ul>
                
                <a href="#" data-activates="nav-mobile" class="white-text button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Navbar Link</a></li>
                </ul>
              
    </header>
