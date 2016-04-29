
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>Google Maps Multiple Markers</title>
  <script src="http://maps.google.com/maps/api/js?sensor=false"
          type="text/javascript"></script>

          <style>
              html, body {
                height: 100%;
                margin: 0;
                padding: 0;
              }
              #map {
                height: 100%;
              }
            </style>
</head>
<body>
  <div id="map"></div>

  <script type="text/javascript">
    var locations = [
      ['Jenny Lake', 43.761386, -110.731659, 4],
      ['Grand Teton National Park Entrance', 43.7904, -110.6818, 5],
      ['The Grand Teton', 43.739352, -110.826645, 3],
      ['Cascade Canyon', 43.765211, -110.744657, 2],
      ['Death Canyon', 43.652985, -110.806601, 1],
      ['Jackson Lake', 43.892835, -110.674913, 6],
      ['Jackson Lake', 43.785311, -110.733315,7]

    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(43.7904, -110.6818),
      mapTypeId: google.maps.MapTypeId.SATELLITE,
      scrollwheel: false
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>
