/*falta prevenir que un elemento no activo pueda abrir la
ventana del mapa
*/
( function( $, pusher, userDevices) {
    /*$('.disabled').on('click', function(event) {
    event.preventDefault();
  });*/

  var app = angular.module('app', []);
  app.controller('homeController', ['$scope', '$location', '$window', function($scope, $location, $window){
    
    var ubicationActionChannel = pusher.subscribe( 'ubicationAction' );
    var cardTarget;//tarjeta activa usada para encontrar indicador de movimiento
    var activeCarIndicator; //indicador de movimiento
    $scope.activeDevices = []; //dispositivos activos
    $scope.devices = userDevices;
    $scope.targetDevice = -1; //elemento que solicita mapa
    $scope.targetDeviceData = {};

    var map;
    var alertMarkerIcon = '/img/defaults/alertmarker.png';
    var dinamicMarkerIcon = '/img/defaults/live_marker.png';
    map = new google.maps.Map(document.getElementById('dinamicMapContainer'), {
      center: {lat: -34.397, lng: 150.644},
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
    var dinamicMarker = new google.maps.Marker({
                    position: {lat: -34.397, lng: 150.644},
                    title: 'Hello World!',
                    icon: dinamicMarkerIcon
                  });
    dinamicMarker.setMap(map);


    

    $scope.isDinamicMapOpen = false;
    
    
    var isAlert;
    var lat;
    var lng;
    ubicationActionChannel.bind( "App\\Events\\UbicationCreated", function( data ) {
     /* console.log($scope.targetDevice);*/
      ubication = data.ubication;
      driver = data.driver;
      console.log(ubication);
      /*console.log(driver);*/
      //encontramod tarjeta del elemento activo y le ponemos un marcador de movimiento
      cardTarget = $(".card[device-id="+ubication.device_id+"]"); 
      activeCarIndicator = cardTarget.find('.active-car-indicator');
      activeCarIndicator.removeClass('disabled').addClass('active-device');

      /*verificamos si el elemento que envia los datos ya se encuentra en el arreglo
      si existe actualizamos los datos del elemento si no creamos un nuevo objeto con
      los datos nuevos*/
      var exist = $scope.activeDevices.some(function (item) {
        return item.id == ubication.device_id;
      });
      var isMyDevice = $scope.devices.some(function (item) {
        return item.id == ubication.device_id;
      });
      console.log($scope.activeDevices);
      /*console.log($scope.activeDevices[0].numAlerts);*/
      isAlert = parseInt(ubication.isAlert);
      lat = parseFloat(ubication.latitude);
      lng = parseFloat(ubication.longitude);
      if (exist && isMyDevice) {
        for (var i = 0; i < $scope.activeDevices.length; i++) {
          if ($scope.activeDevices[i].id == ubication.device_id) {
            $scope.activeDevices[i].lat = lat;
            $scope.activeDevices[i].lng = lng;
            $scope.activeDevices[i].isAlert = isAlert;
            $scope.activeDevices[i].time = ubication.hour;
            $scope.activeDevices[i].numAlerts += isAlert;
            //si es una alerta agregamos un marcador al elemento
            if (isAlert == 1) {
              $scope.activeDevices[i].markers.push($scope.addAlertMarker({lat: lat, lng: lng}, ubication.time));
            }
          }
        }
      }else{
        if (isMyDevice) {
            $scope.activeDevices.push(
                                        {
                                          'id': ubication.device_id,
                                          'lat': lat,
                                          'lng': lng,
                                          'isAlert': isAlert,
                                          'time': ubication.hour,
                                          'numAlerts': isAlert,
                                          'driver': driver,
                                          'markers': []
                                        }
                                      );
        }
        
      }

      /*verificamos si algun elemento ha  solicitado ver mapa en TR*/
      if ($scope.targetDevice != -1) {
        $scope.$apply(updateMap());
      }
        
      

    } );


    var baseUrl = 'http://192.168.0.4:8000';
    $scope.edit = function(id){
      var url = baseUrl + '/client/devices/'+id+'/edit';
      $window.location.href = url;
    };
    $scope.showStaticMap = function(id){
      var url = baseUrl + '/client/devices/'+id;
      $window.location.href = url;
    };
    $scope.toggleDinamicMap = function(id){
      $scope.isDinamicMapOpen = !$scope.isDinamicMapOpen;
      $scope.targetDevice = id;
      if (id === -1) {
        //ocultamos todos los marcadores de el mapa previo a la seleccion actual
        $scope.activeDevices.forEach(function(item) {
          item.markers.forEach(function(marker) {
            marker.setMap(null);
          });
        }); 

        $scope.targetDeviceData = {};
      }
      
    };
    $scope.addAlertMarker = function addAlertMarker(coords, time) {
      var alertMarker = new google.maps.Marker({
        position: coords,
        title: time,
        icon: alertMarkerIcon
      });
      return alertMarker;

    };

    var updateMap = function updateMap() {
      /*buscamos al elemento que solicita mapa y obtenemos sus datos para
      actualizar el mapa con los nuevos datos*/
   /*   console.log($scope.targetDevice);*/
    var data;
      for (var i = 0; i < $scope.activeDevices.length; i++) {
        if ($scope.activeDevices[i].id === $scope.targetDevice) {
           $scope.targetDeviceData = $scope.activeDevices[i];
        }
      }
      
      if ($scope.targetDeviceData != undefined) {
        dinamicMarker.setPosition({lat: $scope.targetDeviceData.lat, lng: $scope.targetDeviceData.lng});
        map.setCenter({lat: $scope.targetDeviceData.lat, lng: $scope.targetDeviceData.lng});
        for (var j = 0; j < $scope.targetDeviceData.markers.length; j++) {
          $scope.targetDeviceData.markers[j].setMap(map);
        }
      }
        
      
      /*console.log($scope.targetDeviceData);*/
      

    }


  }]);

  
  /*setInterval(function() {
    $('.card').removeClass('red');
  }, 2000);*/
/*  for (var i = 0; i < cards.length; i++) {
    cards[i].removeClass('red');
  }*/

} )( jQuery, pusher, userDevices);
