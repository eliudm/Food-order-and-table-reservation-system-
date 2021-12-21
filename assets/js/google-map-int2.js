$(document).ready(function () {
  'use strict';

  //===== Google Map =====//
  function initialize() {
    var myLatlng = new google.maps.LatLng(44.5309133, -87.9217795);
    var mapOptions = {
      zoom: 6,
      disableDefaultUI: true,
      scrollwheel: false,
      center: myLatlng
    }
    var map = new google.maps.Map(document.getElementById('restaurant-loc'), mapOptions);

    // var image = 'images/icon.png';
    var myLatLng = new google.maps.LatLng(44.5309133, -87.9217795);
    var beachMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
        // icon: image
      });

  }
  google.maps.event.addDomListener(window, 'load', initialize);
});