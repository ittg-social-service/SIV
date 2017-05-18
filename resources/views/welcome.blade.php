@extends('layouts.main')
@section('js')
  <script src="/js/jquery.aniview.min.js"></script>
  <script src="/js/typed.js"></script>
@endsection
@section('content')
    <div class="info-section gradient big-padding">
        <div class="bg-image"></div>
        @include('shared.menu')
        <div class="main">
            <div class="">
                <div class="row">
                    <div class="col m6 s12">
                        <div class="row">
                            <div class="col s12 flow-text">
                                <p class="header-title text-lighten-2 flow-text">Sistema Inteligente Vehicular</p>
                                <p class="header-subtitle">La mejor opción para tu <span class="typed"></span> </p>
                                
                            </div>
                            <a href="#objective" class="hide-on-small-only">
                              <div class="right header-more-down ">
                                <i class="flaticon-download-1"></i>
                              </div>
                            </a>
                            
                        </div>
                    </div>
                 {{--    <div class="col m6 s12 aniview" av-animation="slideInRight">
                        <img src="/img/welcome-login/camera-icon.png" alt="" class=" product">
                    </div>    --}} 
                </div>
            </div>
        </div>
    </div>

    <section class="info-section features  valign-wrapper scrollspy" id="objective">
        <div class="container">
            <div class="section">
                <div class="" ></div>
                <div class="row">
                    <div class="col s12 m6 offset-m3 big-padding">
                        <h5 class="center">Protege lo que realmente es importante... tu vida.</h5>
                    </div>
                </div>
    
              <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m4">
                        <div class="icon-block aniview" av-animation="bounceIn">
                        <img src="/img/welcome-login/car-1.svg" alt="" class="center feature-icon">
                        <h6 class="center feature-benefit-title">Evita accidentes</h6>
                        </div>
                    </div>
                    
                    <div class="col s12 m4">
                      <div class="icon-block aniview" av-animation="bounceIn">
                        <img src="/img/welcome-login/ambulance.svg" alt="" class="center feature-icon">
                        <h6 class="center feature-benefit-title">Los daños podrian ser irreparables</h6>
                      </div>
                    </div>
                    
                    <div class="col s12 m4">
                        <div class="icon-block aniview"  av-animation="bounceIn">
                            <img src="/img/welcome-login/home-1.svg" alt="" class="feature-icon">
                            <h6 class="center feature-benefit-title">Asegurate de llegar a donde siempre te esperan</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div> 
               
    </section>
    <div class="container">
         <div class="divider"></div>     
    </div>

    <div class="info-section description scrollspy gradient2  valign-wrapper "  id="description">
        <div class="row center aniview" av-animation="zoomIn">
            <div class=" col s12 m8 light offset-m4 ">
            <img src="/img/ittg.png" alt="">
            <br>
            <span>
              SISTEMA DE VISIÓN PARA DETECTAR Y ALARMAR EL ESTADO DE CANSANCIO DE UN CONDUCTOR.
            </div>
        </div>
    </div>
    
     <div class="container">
         <div class="divider"></div>     
    </div>



    <section class="benefits scrollspy valign-wrapper" id="benefits">
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12 m6 offset-m3">
                        <h4 class="center mint-text">Cuales son los beneficios</h4>
                    </div>
                </div>
              <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m4">
                        <div class="benefits-icon">
                          <img src="/img/welcome-login/cloud.svg" alt="" class="center ">
                          
                        </div>
                        <h6 class="center feature-benefit-title">Almacenamiento en la nube</h6>
                    </div>

                    <div class="col s12 m4">
                      <div class="benefits-icon">
                        <img src="/img/welcome-login/eye.svg" alt="" class="center ">
                        
                      </div>
                      <h6 class="center feature-benefit-title">Vision Artificial</h6>
                    </div>

                    <div class="col s12 m4">
                        <div class="benefits-icon">
                            <img src="/img/welcome-login/map-location.svg" alt="" class="">
                        </div>
                        <h6 class="center feature-benefit-title">Sistema GPS</h6>
                    </div>
                </div>

            </div>
        </div> 

    </section>
    <section class="info-section  big-padding valign-wrapper">
      <div class="row">
        <div class="col s12 m10 big-padding">
            <div class="row">
                <div class="col m6 s12">
                    <div class="center">
                        <h3 class="prevecar-text">Rastreo GPS</h3>
                        <span class="feature-benefit-title">
                        El dispositivo cuenta con un avanzado sistema de rastreo gps, permitiendole conocer en todo momento la ubicación exacta de su vehiculo, asi como el estado en el que el conductor maneja.
                        </span>
                    </div>
                </div>
                 <div class="col s12 m6 ">
                    <img src="/img/welcome-login/map.png" alt="" class="gps-image">
                </div>
            </div>
        </div>
      </div>
    </section>


  
    <div class="info-section av valign-wrapper">
      <div class="row">
         <div class="col s12 m8">
            <div class="left">
               <img src="/img/welcome-login/va1.jpg" alt="" class="left">
            </div>
         </div>
         <div class="col s12 m4">
            <div class="big-padding">
               <h4 class="center"> Visión artificial</h4>
               <p class="left">
                 El avanzado sistema de reconocimiento facial y ocular del dispositivo, le permite tener la certeza que 
                 su seguridad esta garantizada.
               </p>
            </div>
         </div>
      </div>
    </div>

    <div class="container">
       <div class="divider"></div>     
  </div>

{{--   <div class=" pricing-section big-padding">
    <h3 class="center-align  cyan-text text-accent-3">¡Tenemos los mejores precios para ti!</h3>
     <div class="row">
        <div class="col s12 m3 offset-m3">
          <div class="card pink">
            <div class="card-content white-text">
              <span class="card-title">
                <div class="center">Paquete Básico</div>
                <div class="container">
                  <div class="divider"></div>
                </div>
                <div class="center price">
                  <h3>$600</h3>
                </div>
                <div class="center">Mensual</div>
                
              </span>
              
            </div>
            <div class="card-action  white">
              <div class="container">
                <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Detector de visión</label>
              </p>
              <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Instalación </label>
              </p>
              <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Mantenimiento</label>
              </p>
              <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Soporte Técnico</label>
              </p>
              </div>
              
              <div class="center-align">
                <a href="#">Ordenar</a>
              </div>
              
            </div>
          </div>
        </div>
         <div class="col s12 m3">
          <div class="card  teal accent-3 premium-plan">
            <div class="card-content white-text">
              <span class="card-title header">
              <div class="center">Paquete Premium</div>
              <div class="container">
                  <div class="divider"></div>
                </div>
              <div class="center price">
                <h3>$1200</h3>
              </div>
              <div class="center">Mensual</div>
              
              </span>
              
            </div>
            <div class="card-action  white">
              <div class="container">
                <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Detector de visión</label>
              </p>
              <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Rastreo GPS</label>
              </p>
              <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Perfil en plataforma web</label>
              </p>
              <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Instalación </label>
              </p>
              <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Mantenimiento y Soporte Técnico</label>
              </p>

              </div>
              
              <div class="center-align">
                <a href="#">Ordenar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div> --}}

{{--   <div class="info-section bg3 ">
     <div class="carousel carousel-slider center" data-indicators="true">
    <div class="carousel-fixed-item center">
      <a class="btn waves-effect white grey-text darken-text-2">button</a>
    </div>
    <div class="carousel-item red white-text" href="#one!">
      <h2>First Panel</h2>
      <p class="white-text">This is your first panel</p>
    </div>
    <div class="carousel-item amber white-text" href="#two!">
      <h2>Second Panel</h2>
      <p class="white-text">This is your second panel</p>
    </div>
    <div class="carousel-item green white-text" href="#three!">
      <h2>Third Panel</h2>
      <p class="white-text">This is your third panel</p>
    </div>
    <div class="carousel-item blue white-text" href="#four!">
      <h2>Fourth Panel</h2>
      <p class="white-text">This is your fourth panel</p>
    </div>
  </div>
    </div> --}}
   {{--  <div class="parallax"><img src="/img/background2.jpg" alt="Unsplashed background img 2"></div> --}}
  

  <div class="container">
    <div class="section scrollspy" id="login">

      <div class="row">
       @yield('content')
        {{-- <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Contact Us</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div> --}}
      </div>

    </div>
  </div>


 {{--  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="/img/background3.jpg" alt="Unsplashed background img 3"></div>
  </div>
 --}}
  <footer class="page-footer white">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="gray-text text-darken-3">Como surge</h5>
          <p class="grey-text">
            La idea del dispositivo surge debido a la necesidad de disminuir el número
de accidentes automovilísticos causados por factores humanos.
          </p>


        </div>
        <div class="col l3 s12">
          <h5 class="gray-text text-darken-3">Conocenos</h5>
          <ul>
            <li><a class="gray-text text-darken-3" href="#!">Acerca de</a></li>
          </ul>
        </div>
  {{--       <div class="col l3 s12">
          <h5 class="gray-text text-darken-3">Conecta con nosotros</h5>
          <ul>
            <li><a class="blue-text text-darken-3" href="https://www.facebook.com/Prevecar">
            <i class="fa fa-facebook-official"></i> /prevecar
            </a></li>
            <li><a class="blue-text " href="#!">
              <i class="fa fa-twitter"></i> @prevecar
            </a></li>

          </ul>
        </div> --}}
      </div>
    </div>
    <div class="footer-copyright white">
      <div class="container">
      <a class="gray-text text-darken-3" href="http://prevecar.herokuapp.com">Todos los derechos reservados </a>
      </div>
    </div>
  </footer>
@endsection
