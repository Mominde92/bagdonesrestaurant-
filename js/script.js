
// if HTML DOM Element that contains the map is found...

if (document.getElementById('maps')) {
    var content;
    var latitude = 52.525595;
    var longitude = 13.393085;
    var map;
    var marker;
    navigator.geolocation.getCurrentPosition(loadMapdelver);

    function loadMap(location) {
        if (location.coords) {
            latitude = location.coords.latitude;
            longitude = location.coords.longitude;
        }

        // Coordinates to center the map
        var myLatlng = new google.maps.LatLng(latitude, longitude);

        // Other options for the map, pretty much selfexplanatory
        var mapOptions = {
            zoom: 14,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // Attach a map to the DOM Element, with the defined settings
        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

        content = document.getElementById('long');
        google.maps.event.addListener(map, 'click', function(e) {
          placeMarker(e.latLng);
        });

        var input = document.getElementById('search_input');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var searchBox = new google.maps.places.SearchBox(input);

        google.maps.event.addListener(searchBox, 'places_changed', function() {
          var places = searchBox.getPlaces();
          placeMarker(places[0].geometry.location);
        });
                                          
		    marker = new google.maps.Marker({
    	    map: map
		    });
    }

    function loadMapdelver(location) {
        if (location.coords) {
            latitude = location.coords.latitude;
            longitude = location.coords.longitude;
        }

        // Coordinates to center the map
        var myLatlng = new google.maps.LatLng(latitude, longitude);

        // Other options for the map, pretty much selfexplanatory
        var mapOptions = {
            zoom: 14,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // Attach a map to the DOM Element, with the defined settings
        map = new google.maps.Map(document.getElementById("maps"), mapOptions);

        content = document.getElementById('long');
        google.maps.event.addListener(map, 'click', function(e) {
          placeMarker(e.latLng);
        });

        var input = document.getElementById('search_input');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var searchBox = new google.maps.places.SearchBox(input);

        google.maps.event.addListener(searchBox, 'places_changed', function() {
          var places = searchBox.getPlaces();
          placeMarker(places[0].geometry.location);
        });
                                          
		    marker = new google.maps.Marker({
    	    map: map
		    });
    }
}

if (document.getElementById('map-canvas')) {
  var content;
  var latitude = 52.525595;
  var longitude = 13.393085;
  var map;
  var marker;
  navigator.geolocation.getCurrentPosition(loadMapdelver);

  function loadMap(location) {
      if (location.coords) {
          latitude = location.coords.latitude;
          longitude = location.coords.longitude;
      }

      // Coordinates to center the map
      var myLatlng = new google.maps.LatLng(latitude, longitude);

      // Other options for the map, pretty much selfexplanatory
      var mapOptions = {
          zoom: 14,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      // Attach a map to the DOM Element, with the defined settings
      map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

      content = document.getElementById('long');
      google.maps.event.addListener(map, 'click', function(e) {
        placeMarker(e.latLng);
      });

      var input = document.getElementById('search_input');
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      var searchBox = new google.maps.places.SearchBox(input);

      google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        placeMarker(places[0].geometry.location);
      });
                                        
      marker = new google.maps.Marker({
        map: map
      });
  }

  function loadMapdelver(location) {
      if (location.coords) {
          latitude = location.coords.latitude;
          longitude = location.coords.longitude;
      }

      // Coordinates to center the map
      var myLatlng = new google.maps.LatLng(latitude, longitude);

      // Other options for the map, pretty much selfexplanatory
      var mapOptions = {
          zoom: 14,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      // Attach a map to the DOM Element, with the defined settings
      map = new google.maps.Map(document.getElementById("maps"), mapOptions);

      content = document.getElementById('long');
      google.maps.event.addListener(map, 'click', function(e) {
        placeMarker(e.latLng);
      });

      var input = document.getElementById('search_input');
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      var searchBox = new google.maps.places.SearchBox(input);

      google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        placeMarker(places[0].geometry.location);
      });
                                        
      marker = new google.maps.Marker({
        map: map
      });
  }
}


function placeMarker(location) {
    marker.setPosition(location);
    var latlong = location.lat()+','+location.lng();
    var API_KEY = 'AIzaSyAgetfsUjWTD71H7UEq3gyPjjnRFaBT5Wc' ;
    
    $.ajax({
      type: "GET",
      url: "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + latlong + "&sensor=false&key=" + API_KEY,
      dataType: "json",
      success: function (response) 
      {
        document.getElementById('search_input').value = response.plus_code.compound_code; 
        }
    });
    
    $("#confirmlocation").removeAttr('disabled');

    

    
    document.getElementById('long').value = location.lng();
    document.getElementById('lat').value = location.lat();
    content.innerHTML = "Lat: " + location.lat() + " / Long: " + location.lng();
    google.maps.event.addListener(marker, 'click', function(e) {
        document.getElementById('long').value = location.lng();
        document.getElementById('lat').value = location.lat();
        new google.maps.InfoWindow({
            
        }).open(map,marker);

               
    });
}