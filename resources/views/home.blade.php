@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <title>Styled Maps - Night Mode</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 500px;
        width: 500px;
        margin: auto;
        width: 50%;
        border: 3px solid green;
        padding: 10px;
      }
  
    </style>
  </head>
  <body>
  <form method="get" action="">
    <label for="cities">City:</label>
    <select id="cities" name="city">
      <option value="Shanghai">Shanghai</option>
      <option value="Tbilisi">Tbilisi</option>
      <option value="Ahmedabad">Ahmedabad</option>
    </select>
    <input type="submit">
  </form>

     <?php
     $l = array();
      if(isset($_GET['cities'])){
        for($i=0; $i<30; $i++){
          if($_GET['cities']==$lab->city){
            $l[$i] = $lab[$i];
          }
        }
      ?>
      <li>{{$l[0]->title}}</li>
<?php
      }
        $lat = array();
        $long = array();
        $title = array();
        foreach($labs as $lab){
          $lat[$lab->id-1] = $lab->lat;
          $long[$lab->id-1] = $lab->long;
          $title[$lab->id-1] = $lab->title;
        }      
      ?>

      <h1>Find a Lab!</h1>   
    <div id="map"></div>
    <script type="text/javascript">
      var la = <?php echo json_encode($lat); ?>;
      var lo = <?php echo json_encode($long); ?>;
      var t = <?php echo json_encode($title); ?>;
      function initMap() {
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 40, lng: -5},
          zoom: 2,
          styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
        });
        for(var i=0; i<30; i++){
          var marker = new google.maps.Marker({
            position: {lat: parseFloat(la[i]), lng: parseFloat(lo[i])},
            map: map,
            title: t[i],
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwcC6LT5xGfREgtfgQ4CEpWtjKHOHHbig&callback=initMap"
    async defer></script>
    <div>
  </body>
</html>
@endsection