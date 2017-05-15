(function($){
  $(function(){
      /*materialicecss elements*/
      $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 240
        closeOnClick: false
      });
      $('.scrollspy').scrollSpy();
       $('.carousel.carousel-slider').carousel({full_width: true});
      $('select').material_select();
      $('.modal-trigger').leanModal({
          starting_top: '4%', // Starting top style attribute
          ending_top: '1%', // Ending top style attribute
      });
      $('.tooltipped').tooltip({delay: 20});
      $('.dropdown-button').dropdown({
         inDuration: 300,
         outDuration: 225,
         constrain_width: true, // Does not change width of dropdown to that of the activator
         hover: false, // Activate on hover
         gutter: 0, // Spacing from edge
         belowOrigin: true, // Displays dropdown below the button
         alignment: 'left' // Displays dropdown with edge aligned to the left of button
       });

      $('.datepicker').pickadate({
          monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
          monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
          weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'sabado' ],
          weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],

          // Materialize modified
          weekdaysLetter: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ],

          // Today and clear
          today: 'Hoy',
          clear: 'Limpiar',
          close: 'Cerrar',

          selectMonths: true, // Creates a dropdown to control month
          selectYears: 15, // Creates a dropdown of 15 years to control year
          formatSubmit: 'yyyy-mm-dd',
          hiddenName: true
      });
      

      /*aniviewjs*/
      var options = {
         animateThreshold: 100,
         scrollPollInterval: 50
      }
      if ($('.aniview').length) {
        $('.aniview').AniView(options);
      }
      if ($(".typed").length) {
           /*typed js */
        $(".typed").typed({
           strings: ["Auto.", "Linea de camiones.", "Servicio de transporte."],
           typeSpeed: 0,
           loop: true
        });
      }
     

      if ($('.timepicker').length) {
        $('.timepicker').pickatime({
          formatSubmit: 'HH:i',
          hiddenName: true
        });
      }


   }); // end of document ready

})(jQuery); // end of jQuery name space
