<?php
include './components/header.php';
include './components/navbar-light.php';
?>

    <section class="py-9">
        <div class="container mt-5 mt-lg-10">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 mb-4 mb-lg-0">
            <h1>Interested in working together?</h1>
            <p>For any enquiries, or to say hello, get in touch 👋</p>
            <hr class="my-4 fw-25 ml-0">
            <ul class="list-group list-group-minimal">
                <li class="list-group-item d-flex align-items-center">
                <span class="w-25 text-muted">Email</span>
                info@nascocanada.ca
                </li>
            </ul>
            </div>
            <div class="col-lg-5">
                <div class="media equal-1-1">
                    <div id="map1" class="map"></div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="py-4 py-xl-4">
      <div class="container">
        <div class="row g-4 g-lg-5 mb-4">
          <div class="col-md-12 text-center">
            <a href="./" class="footer-brand"><img src="assets/images/logo/nac-logod.png" alt="Logo"></a>
          </div>
        </div>
        <div class="row align-items-center g-1 g-lg-6 text-muted">
          <div class="col-lg-12 order-lg-1 text-center">
            <p class="small">&copy; Copyrights <script>document.write(new Date().getFullYear());</script> All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </footer>


  <script>
    function initMap() {
      var latlng = new google.maps.LatLng(43.73353812624814, -79.42819112295074);

      var myOptions = {
        zoom: 9,
        center: latlng,
        disableDefaultUI: true,
        styles: [
          {
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#f5f5f5"
              }
            ]
          },
          {
            "elementType": "labels.icon",
            "stylers": [
              {
                "visibility": "off"
              }
            ]
          },
          {
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#616161"
              }
            ]
          },
          {
            "elementType": "labels.text.stroke",
            "stylers": [
              {
                "color": "#f5f5f5"
              }
            ]
          },
          {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#bdbdbd"
              }
            ]
          },
          {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#eeeeee"
              }
            ]
          },
          {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#757575"
              }
            ]
          },
          {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#e5e5e5"
              }
            ]
          },
          {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#9e9e9e"
              }
            ]
          },
          {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#ffffff"
              }
            ]
          },
          {
            "featureType": "road.arterial",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#757575"
              }
            ]
          },
          {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#dadada"
              }
            ]
          },
          {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#616161"
              }
            ]
          },
          {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#9e9e9e"
              }
            ]
          },
          {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#e5e5e5"
              }
            ]
          },
          {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#eeeeee"
              }
            ]
          },
          {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#c9c9c9"
              }
            ]
          },
          {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#9e9e9e"
              }
            ]
          }
        ]
      };

      var map = new google.maps.Map(document.getElementById("map1"), myOptions);

      map.panBy(-100, -40);

      var myMarker = new google.maps.Marker(
        {
          position: latlng,
          map: map,
          icon: 'assets/images/svg/pin.svg'
        });
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAME5wJgLdn1aQSxC7-iWxJ3isuveK9Rv4&amp;callback=initMap" async="" defer=""></script>


  <script src="assets/js/vendor.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="//code.tidio.co/8xtfxxzxdhc6h2gg58onasl3cgtqy7g2.js" async></script>

</body></html>