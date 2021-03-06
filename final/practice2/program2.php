
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Program 2</title>
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  
  <script>
  	
  	function getEarthquakes() {        
      $.ajax({
            type: "get",
            url: "http://earthquake.usgs.gov/fdsnws/event/1/query",
            dataType: "json",
            data: {
                   "format":"geojson",
                   "starttime":$("#starttime").val(),
                   "endtime"  :$("#endtime").val(),
                   "latitude" :$("#latitude").val(),
                   "longitude":$("#longitude").val(),
                   "maxradius":$("#maxradius").val(),
                   "minmag"   :$("#minmag").val()
            },
            success: function(data,status) {
            	//$('#earthquakeResult').html("");
            	$('#earthquakeResult').html(data["metadata"].title + "<br>");
                 for (var i=0; i < data['features'].length; i++ ) {
                 	$('#earthquakeResult').append(data['features'][i]['properties']["mag"] + " - " + data['features'][i]['properties'].place  + "<br/>");
                 }
              },
            complete: function(data,status) { //optional, used for debugging purposes
                 //alert(status);
            }
         });
   }
   
  </script>
  
</head>

<body>
  <div>
    <header>
      <h1>Earthquake Info</h1>
    </header>

    <div>
            <form method="post">
				Start Time: <input type="text" id="starttime" value="2018-07-01"> <br /><br />
				End Time:   <input type="text" id="endtime"   value="2018-07-31"> <br /><br />
				Latitude:   <input type="text" id="latitude"  value="36.6"> <br /><br />
				Longitude:  <input type="text" id="longitude" value="-121.9"> <br /><br />
				Max Radius: <input type="text" id="maxradius" value="10"> <br /><br />
				Min Magnitud: <input type="text" id="minmag"  value="3" > <br /><br />
				<input type="button" id="formButton" value="Get Info" /><br /><br />
			</form>
            
            <div id="earthquakeResult"></div>

    </div>

  </div>
  
    <script> 
    
		$("input").change(getEarthquakes);
		$("#formButton").click(getEarthquakes);

 	</script>
  
</body>
</html>
