function initMap() {
  geocoder = new google.maps.Geocoder();
  map = new google.maps.Map(document.getElementById('map'), {
    center: {
      lat: 47.410272,
      lng: 0.980021
    },
    zoom: 11
  });
}

function reverse(arrayToReverse) {
  var reversedArray = [];
  for(var i = arrayToReverse.length - 1; i >= 0; i--) {
    reversedArray.push(arrayToReverse[i]);
  }

  return reversedArray;
}

function getZone1Coords() {
  var saCoords;
  $.ajax({
    url: "/Rosalys/scripts/ajax/getZone1Coords.ajax.php",
    statusCode: {
      404: function () {
        alert("Not Found!");
      }
    },
    method: 'GET',

    success: function (result) {
      var sCoords = result;
      var coords = [];
      saCoords = sCoords.split(";");

      saCoords.forEach(function(c) {
        aaCoords = c.split(',');
        coords.push(new google.maps.LatLng(parseFloat(aaCoords[0]),parseFloat(aaCoords[1])));
      });

      var zone1 = new google.maps.Polygon({
        paths: coords,
        strokeColor: '#4CAF50',
        strokeOpacity:.8,
        strokeWeight: 3,
        fillColor: '#4CAF50',
        fillOpacity: 0.4
      });
      zone1.setMap(map);

      var zone1ReversedCoords = reverse(coords);
      getZone2Coords(zone1ReversedCoords);
    }
  });
}

function getZone2Coords(rCoords) {
  var saCoords;
  $.ajax({
    url: "/Rosalys/scripts/ajax/getZone2Coords.ajax.php",
    statusCode: {
      404: function () {
        alert("Not Found!");
      }
    },
    method: 'GET',

    success: function (result) {
      var sCoords = result;
      var coords = [];
      saCoords = sCoords.split(";");

      saCoords.forEach(function(c) {
        aaCoords = c.split(',');
        coords.push(new google.maps.LatLng(aaCoords[0],aaCoords[1]));
      });

      var zone2 = new google.maps.Polygon({
        paths: [coords,rCoords],
        strokeColor: '#FF9800',
        strokeOpacity: .8,
        strokeWeight: 3,
        fillColor: '#FF9800',
        fillOpacity: 0.4
      });
      zone2.setMap(map);

      var zone2ReversedCoords = reverse(coords);
      getZone3Coords(zone2ReversedCoords);
    }
  });
}

function getZone3Coords(rCoords) {
  var saCoords;
  $.ajax({
    url: "/Rosalys/scripts/ajax/getZone3Coords.ajax.php",
    statusCode: {
      404: function () {
        alert("Not Found!");
      }
    },
    method: 'GET',

    success: function (result) {
      var sCoords = result;
      var coords = [];
      saCoords = sCoords.split(";");

      saCoords.forEach(function(c) {
        aaCoords = c.split(',');
        coords.push(new google.maps.LatLng(aaCoords[0],aaCoords[1]));
      });

      var zone3 = new google.maps.Polygon({
        paths: [coords,rCoords],
        strokeColor: '#F44336',
        strokeOpacity: .8,
        strokeWeight: 3,
        fillColor: '#F44336',
        fillOpacity: 0.4
      });
      zone3.setMap(map);
    }
  });
}

function findZone(location) {
  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix(
      {
        origins: [map.getCenter()],
        destinations: [location],
        travelMode: google.maps.TravelMode.DRIVING,
        avoidHighways: true,
        avoidTolls: true,
      }, function(response, status) {
        if (status !== google.maps.DistanceMatrixStatus.OK) {
          $("#result").html("Une erreur est intervenue").slideDown('slow');
        } else {
          var distance = response.rows[0].elements[0].distance.value;
          var duration = response.rows[0].elements[0].duration.value;

          if(distance <= 5000 && duration <= 600) {
            $("#result").html('Vous &ecirc;tes en <span class="zone1">Zone 1 (5 &euro; de frais de livraison)</span>').slideDown('slow');
          } else if(distance <= 10000 && duration <= 900) {
            $("#result").html('Vous &ecirc;tes en <span class="zone2">Zone 2 (8 &euro; de frais de livraison)</span>').slideDown('slow');
          } else if(distance <= 15000 && duration <= 1500) {
            $("#result").html('Vous &ecirc;tes en <span class="zone3">Zone 3 (12 &euro; de frais de livraison)</span>').slideDown('slow');
          } else {
            $("#result").html('Vous &ecirc;tes hors zone').slideDown('slow');
          }
        }
      });
}

$(document).ready(function() {
  getZone1Coords();

  $(".material-icons.validate").click(function() {
    var address = $("#zoneFinder_input").val();

    if(address != '') {
      geocoder.geocode({'address': address},
          function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              $(".material-icons.validate").css("background-color", "white").css("color", "#4CAF50");

              var marker = new google.maps.Marker({
                map: map,
                animation: google.maps.Animation.DROP,
                position: results[0].geometry.location
              });
              findZone(results[0].geometry.location);
        } else {
              $("#result").html("Votre adresse n'a pas &eacute;t&eacute; trouv&eacute;e").slideDown('slow');
        }
      });
    }
  });
});