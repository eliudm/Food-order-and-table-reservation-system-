$(document).ready(function () {
  'use strict';

  //===== Google Map =====//
  function initialize() {
    var myLatlng = new google.maps.LatLng(-37.9712369, 144.4926689);
    var mapOptions = {
      zoom: 10,
      disableDefaultUI: true,
      scrollwheel: false,
      center: myLatlng
    }
    var map = new google.maps.Map(document.getElementById('loc-map'), mapOptions);

    // var image = 'images/icon.png';
    var myLatLng = new google.maps.LatLng(-37.9712369, 144.4926689);
    var beachMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
        // icon: image
      });

  }
  google.maps.event.addDomListener(window, 'load', initialize);
});