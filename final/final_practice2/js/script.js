$(function()
{
    $("#form").on('submit',function(event){
        event.preventDefault();
        getEarthquakes();
    });
});

function getEarthquakes() {
    $('#status').html("");
    $('#output-list').html("");
    $.ajax({
        type: "get",
        url: "http://earthquake.usgs.gov/fdsnws/event/1/query",
        dataType: "json",
        data: {
            "format": "geojson",
            "starttime": $("#starttime").val(),
            "endtime": $("#endtime").val(),
            "latitude": $("#latitude").val(),
            "longitude": $("#longitude").val(),
            "maxradius": $("#maxradius").val(),
            "minmag": $("#minmag").val()
        },
        success: function(data, status) {
            if(data['features'].length) $('#status').html(data["metadata"].title);
            for (var i = 0; i < data['features'].length; i++) {
                $('#output-list').append("<li>Magnitude : " + data['features'][i]['properties']["mag"] + 
                    " Place : " + data['features'][i]['properties'].place + "</li>");
            }
        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert(status);
        }
    });
}