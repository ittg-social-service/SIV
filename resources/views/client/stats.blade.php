@extends('layouts.client-dashboard')
@include('shared.client-top-nav')
@section('client-dash-content')
    <div ng-app="stats">
        <div ng-controller="statsController">
            <div class="row">
                 <div class="col s12 m4">
                   <div class="card ">
                     <div class="card-content gray-text">
                      <canvas id="myChart" width="100%" height="100px"></canvas>

                     </div>
                     <div class="card-action">
                       <a href="#" ng-click="toggleOpen()">Detalles</a>
                     </div>
                   </div>
                 </div>
            </div>
            <div id="dailyIncidentsDetails" ng-show="openDailyIncidents">
                <div class="row">
                    <div class="col m3"  ng-repeat="device in deviceAlertArray">
                        <ul class="collection with-header">
                            <li class="collection-header"><h4>@{{ device[0].name }}</h4></li>
                            <li class="collection-item" ng-repeat="alert in device"><div><i class="material-icons">alarm</i> @{{ alert.hour }}<a href="#!" class="secondary-content" ng-click="showSidenavMap(alert.lat, alert.lng, alert.driver)"><i class="material-icons">place</i></a></div></li>
                        </ul>
                    </div>
                </div>
                <div class="fixed-action-btn" style="bottom: 45px; right: 40%;">
                    <a class="btn-floating btn-large red" ng-click="toggleOpen()">
                      <i class="large material-icons">clear</i>
                    </a>
                  </div>
            </div>
            <ul id="slide-out" class="side-nav">
                    <div id="sidenav-map-container">
                        
                    </div>
                    <li><div class="userView">
                   {{--    <img class="background" src="images/office.jpg"> --}}
                      <a href="#!user"><img class="circle" ng-src="@{{driver.avatar}}"></a>
                      <a href="#!name"><span class="white-text name">@{{driver.name}}</span></a>
                      <a href="#!email"><span class="white-text email">@{{driver.name}}@gmail.com</span></a>
                    </div></li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidenav-map-collapse"><i class="material-icons">menu</i></a>
        </div>
    </div>
 
 <script>
  $('.sidenav-map-collapse').sideNav({
      menuWidth: 400, // Default is 240
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
  

 var app = angular.module('stats', []);
 app.controller('statsController', ['$scope', function($scope){
    var map;
    var alertMarkerIcon = '/img/defaults/alertmarker.png';
    var userDevices = {!!json_encode ($device_alert->toArray())!!};
    $scope.openDailyIncidents = false;
    $scope.device_alert = userDevices.filter(function(elem) {
                            return elem.isAlert == 1;
                        })
                        .reduce(function(devices, line){
                        devices[line.type] = devices[line.type] || [];
                        devices[line.type].push({
                            name: line.type,
                            lat: line.latitude,
                            lng: line.longitude,
                            hour: line.hour,
                            driver: {
                                name: line.name,
                                avatar: line.avatar
                            }

                        });
                        return devices;
                    }, {});
    $scope.deviceAlertArray = [];
    for (var prop in $scope.device_alert) {
        $scope.deviceAlertArray.push($scope.device_alert[prop]);
    }
    console.log($scope.device_alert);
    console.log($scope.deviceAlertArray);
    console.log(userDevices);
    drawIncidentsOfDayChart($scope.device_alert);
    map = new google.maps.Map(document.getElementById('sidenav-map-container'), {
      center: {lat: 16.7500, lng: -93.1167},
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
                    position: {lat: 16.7500, lng: -93.1167},
                    title: 'Hello World!',
                    icon: alertMarkerIcon
                  });
    dinamicMarker.setMap(map);
    function drawIncidentsOfDayChart(data){
        var chartLabels = [];
        var chartData = [];
        for (var prop in data) {
          chartLabels.push(prop);
        }
        chartData = chartLabels.map(function (item) {
                return data[item].length;
        });
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: chartLabels,
                                datasets: [{
                                    label: 'Hoy',
                                    data: chartData,
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255,99,132,1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    text: 'Incidencias'
                                },
                                events: ["mousemove", "mouseout", "click", "touchstart", "touchmove", "touchend"],
                                onClick: function (argument, dos) {
                                    console.log(dos);
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
    }
    $scope.toggleOpen = function () {
         $scope.openDailyIncidents = !$scope.openDailyIncidents;
    }
    $scope.showSidenavMap = function(lat, lng, driver) {
        $('.sidenav-map-collapse').sideNav('show');
        $scope.driver = driver;
        $scope.$apply(updateMap(lat, lng));
        
    }
    var updateMap = function updateMap(lat, lng) {
        lat = parseFloat(lat);
        lng = parseFloat(lng);
        dinamicMarker.setPosition({lat: lat, lng: lng});
        map.setCenter({lat: lat, lng: lng});
    }
 }]);
 
    


  </script>
@endsection
