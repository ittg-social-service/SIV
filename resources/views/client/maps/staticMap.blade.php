@extends('layouts.client-dashboard')
{{-- @section('css')
      <link href="/css/client-dashboard.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop
@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>  
  <script src="/js/time-picker/picker.js"></script>
  <script src="/js/time-picker/picker.time.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtR1U_kSaLg-n5QWk55eA93XmQw5Ckv84">
  </script>
@endsection --}}
@section('client-dash-content')
  <div class="navbar-fixed static-map-nav">
    <nav class="map-nav">
        <div class="nav-wrapper map-nav ">
       {{--    <a href="{{ url('/') }}" class="brand-logo ">
            <img src="/img/logo_white.png" alt="">
          </a> --}}
          <div class="">
            {!! Form::open(['url' => ['client/devices/map'], 'method' => 'POST'])!!}
              <div class="row">
                <div class="col m12">
                  <div class="row">
                    <div class="input-field col m2 ">
                      <select name="device">
                        <option value="{{ $selected_device->id }}"  selected >{{ $selected_device->type }}</option>
                        @foreach ($other_devices as $device)
                          <option value="{{ $device->id }}">{{ $device->type }}</option>
                        @endforeach
                      </select>
                      {{-- <label>Autos</label> --}}
                    </div>
                    <div class="input-field col m2 ">
                      <i class="material-icons prefix">event</i>
                      <input id="date" type="date" class="datepicker" name="date" placeholder="Fecha">
                    </div>
             
                    <div class="input-field col m2 ">
                      <i class="material-icons prefix">access_time</i>
                      <input type="time" class="timepicker " name="hour1" placeholder="Inicio">
                    </div>
                    <div class="input-field col m2 ">
                      <i class="material-icons prefix">access_time</i>
                      <input type="time" class="timepicker " name="hour2" placeholder="Final">
                    </div>
                    <div class="input-field col m1 ">
                      <button class="btn waves-effect waves-light" type="submit" name="action">Ir
                       {{--  <i class="material-icons left">send</i> --}}
                      </button>
                    </div>
              
                   {{--  <div class="col m2  map-client-opts  dropdown-button " data-activates='dropdown1'>
                      <div class='row'>
                        <div class="col m4 ">
                          <img src="{{ Auth::user()->avatar}}" alt="" class="right">
                        </div>
                        <div class="col m8 ">
                          <div class="row">
                            <div class="col m6 ">

                              <span class=" client-name">{{ Auth::user()->name}}</span>
                            </div>
                            <div class="col m6 ">
                              <div class="">
                                <i class="material-icons ">arrow_drop_down</i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <ul id='dropdown1' class='dropdown-content'>
                        <li>
                           <a href="{{ url('/client/home') }}" class=" lime-text accent-3">
           
                              <span>
                                 Mis autos
                              </span>
                           </a>
                        </li>
                        <li>
                           <a href="" class="lime-text accent-3">

                              <span>
                                 Mis choferes
                              </span>
                           </a>
                        </li>
                        <li>
                           <a class="lime-text accent-3" href="{{ url('/logout') }}">
                            Logout
                           </a>
                        </li>
                      </ul>
                    </div> --}}
                  </div>
                </div>
              </div>
            {!! Form::close()!!}



          </div>
        </div>
    </nav>
  </div>

    <div class="row">
      @if ($firstTime)
        <div class="center">
          <h4>Ingresa Los terminos de busqueda</h4>
        </div>
      @endif
      @if (!$firstTime && !$error)
        <div id="map"></div>
        <div class="static-map-travel-info">
          <div class="chip">
            <img src="{{$driver->avatar}}" alt="Contact Person">
            <span>{{$driver->name}}</span>
          </div>
          <div class="chip">
            <i class="close material-icons">alarm</i>
            <span id="travelTime">tiempo</span>
          </div>
          <div class="chip">
            <i class="close material-icons">visibility</i>
            <span id="numAlerts">alertas</span>
          </div>
        </div>
      
      @endif
      @if ($error)
        <div class="center">
          <h4>No se encontraron resultados</h4>  
        </div>
        
      @endif


    </div>
    @if (isset($ubs))
    
      <script type="text/javascript">
        var ubs = {!! json_encode($ubs) !!};
        console.log(ubs);
        var travelCoordinates = [];
        var markers = [];
        var map;
        var alertMarkerIcon = '/img/defaults/alertmarker.png';
        function initMap() {

          for (var i = 0; i < ubs.length; i++) {
            var obj = {lat:0, lng:0};
            obj.lat = parseFloat(ubs[i].latitude);
            obj.lng = parseFloat(ubs[i].longitude);
            obj.hour = ubs[i].hour;
            travelCoordinates.push(obj);
            if (ubs[i].isAlert == 1) {
              markers.push(addMarker(travelCoordinates[i], alertMarkerIcon));
            }
          }
          console.log(travelCoordinates[0].lat);
          map = new google.maps.Map(document.getElementById('map'), {
            center: {lat:travelCoordinates[0].lat, lng:travelCoordinates[0].lng},
            zoom: 17,

            scaleControl: true,
            streetViewControl: true,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.RIGHT_TOP
            },
            zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_TOP
            },


          });

    
          var travelPath = new google.maps.Polyline({
            path: travelCoordinates.map(function(elem) {
              return {lat:elem.lat, lng:elem.lng};
            }),
            geodesic: true,
            strokeColor: '#2196f3',
            strokeOpacity: 1.0,
            strokeWeight: 3
          });

          /*add Polyline to map*/
          travelPath.setMap(map);

          markers.push(addMarker(travelCoordinates[0], '/img/defaults/travel_start.png'));
          

          /*add markers to map*/

          for (var j = 0; j < markers.length; j++) {
            markers[j].setMap(map);
            markers[j].setAnimation(google.maps.Animation.BOUNCE);
          }
          /*create a new marker in specific coords*/
          function addMarker(coords, markerIcon) {
              var marker = new google.maps.Marker({
                position: {lat:coords.lat, lng:coords.lng},
                title: coords.hour,
                icon: markerIcon
              });
              return marker;
            }
          $('#numAlerts').text(markers.length - 1);
          var h1 = new Date ("October 13, 2014 " + " " + travelCoordinates[travelCoordinates.length - 1].hour);
          var h2 = new Date ("October 13, 2014 " + " " + travelCoordinates[0].hour);
          var hdif = h1.getHours() - h2.getHours();
          var mdif = h1.getMinutes() - h2.getMinutes();
          var sdif = h1.getSeconds() - h2.getSeconds();
          if (sdif < 0) {
            mdif -= 1;
            sdif = 60 + sdif;
          }
          hdif = lowerThan10(hdif);
          mdif = lowerThan10(mdif);
          sdif = lowerThan10(sdif);
          function lowerThan10(num) {
            if (num < 10) {
              return "0" + num;
            }
            return num;
          }
          $('#travelTime').text(hdif + ":" + mdif + ":" + sdif);
          var hours = Math.abs(h1 - h2) / 36e5;
          console.log(travelCoordinates[travelCoordinates.length - 1].hour);
          console.log(travelCoordinates[0].hour);
          console.log(hours);

        }




/*        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ["", "", "", "", "", ""],
                                datasets: [{
                                    label: '',
                                    data: [7, 5, 3, 5, 2, 3],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });*/
        initMap();
      </script>
    @endif

@endsection
