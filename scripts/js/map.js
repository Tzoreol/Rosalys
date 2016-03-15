var centerLat = 47.410272;
var centerLng = 0.980021;

function initMap() {
  geocoder = new google.maps.Geocoder();
  map = new google.maps.Map(document.getElementById('map'), {
    center: {
      lat: centerLat,
      lng: centerLng
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

      zone1 = new google.maps.Polygon({
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

function checkIfPointInZone1(point) {
        if(!google.maps.geometry.poly.containsLocation(point, zone1)) {
            console.log(point.lat() + ',' + point.lng() + ' is not in zone 1');
            coords = zone1.getPath.slice(0).push(point)
            sortedCoords = sortBounds(coords);
            
            sSortedBounds = '';
            sortedCoords.forEach(function(s) {
                sSortedBounds += s.lat() + ',' + s.lng() + ';';
            })
            
            sSortedBounds.substring(0,sSortedBounds[length-1]);
            
            $.ajax({
    url: "/Rosalys/scripts/ajax/updateZone1Coord.ajax.php",
    statusCode: {
      404: function () {
        alert("Not Found!");
      }
    },
    method: 'POST',
    data: {coords: sSortedBounds},

    success: function (result) {
            console.log(results)
        }});
        }
}

function findZone(location) {
  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix(
      {
        origins: [{lat: centerLat, lng: centerLng}],
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
            checkIfPointInZone1(location);
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

function sortBounds(bounds) {
  var cLat = centerLat;
  var cLng = centerLng;
  var north = [];
  var south = [];

  /*
    	To make the polygon, we'll start by the bounds the most at west from the northerns ones, then go east. For the southerns bounds, we go east to west*/
  for (z = 0; z < bounds.length; z++) {

    //Compare latitudes with center's one. Divide bounds by northerns and southerns
    if (bounds[z].lat() >= cLat) {
      north.push(bounds[z]);
    } else {
      south.push(bounds[z]);
    }
  }

  //First sort, by lattitudes
  north.sort(function(a, b) {
    if (a.lat() > b.lat()) {
      return -1;
    } else if (a.lat() < b.lat()) {
      return 1;
    } else {
      return 0;
    }
  });

  south.sort(function(a, b) {
    if (a.lat() > b.lat()) {
      return 1;
    } else if (a.lat() < b.lat()) {
      return -1;
    } else {
      return 0;
    }
  });

  //If two point on the same longittude, keep only the most northern
  //Since the bounds are sorted, the sub-array contain the northen ones.
  var northSorted = [];
  north.forEach(function(m) {
    var keep = true;
    northSorted.forEach(function(n) {
      if (m.lng() == n.lng()) {
        keep = false;
      }
    });

    if (keep) {
      northSorted.push(m);
    }
  });

  //If two point on the same longittude, keep only the most southern
  //Since the bounds are sorted, the sub-array contain the southern ones.
  var southSorted = [];
  south.forEach(function(o) {
    var keep = true;
    southSorted.forEach(function(p) {
      if (o.lng() == p.lng()) {
        keep = false;
      }
    });

    if (keep) {
      southSorted.push(o);
    }
  });

  //Sort by longitude. west to east
  northSorted.sort(function(a, b) {
    if (a.lng() > b.lng()) {
      return 1;
    } else if (a.lng() < b.lng()) {
      return -1;
    } else {
      return 0;
    }
  });

  //Sort by longitude. east to west
  southSorted.sort(function(a, b) {
    if (a.lng() > b.lng()) {
      return -1;
    } else if (a.lng() < b.lng()) {
      return 1;
    } else {
      return 0;
    }
  });

  //Fill the array for the polygon.
  var boundsToReturn = [];
  northSorted.forEach(function(m) {
    boundsToReturn.push(m);
  });

  southSorted.forEach(function(o) {
    boundsToReturn.push(o);
  });

  return boundsToReturn;
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