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
                                <p class="header-title text-lighten-2 flow-text">New sharing made for people</p>
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

    <section class="info-section features  valign-wrapper" >
        <div class="container">
            <div class="section">
                <div class="scrollspy" id="objective"></div>
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

    <div class="info-section description scrollspy gradient2 big-padding valign-wrapper "  id="description">
        <div class="row center aniview" av-animation="zoomIn">
            <div class=" col s12 m7 light offset-m3">
            <img src="/img/logo_white.png" alt="">
            <br>
            <span>
                DETECTOR DE VISIÓN DE AUTOMOVILISTAS PARA IDENTIFICAR Y ALARMAR CUANDO EL INDIVIDUO MANEJE EN ESTADO DE CANSANCIO O SUEÑO
            </span>
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
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat a distinctio fuga magni eius laborum, soluta fugiat sed, velit explicabo.
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
               <p class="left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi quam corporis magni amet hic, animi neque, mollitia cum recusandae rerum iusto, odit deleniti impedit molestiae et, ducimus commodi eos debitis.</p>
            </div>
         </div>
      </div>
    </div>

           <div class="container">
         <div class="divider"></div>     
    </div>

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
  <footer class="page-footer black-grad">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Prevecar</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright black-grad">
      <div class="container">
      <a class="brown-text text-lighten-3" href="http://materializecss.com"></a>
      </div>
    </div>
  </footer>
@endsection