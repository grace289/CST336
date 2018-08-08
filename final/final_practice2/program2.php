<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Program 2</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/script.js"> </script>
</head>

<body>
    <div>
        <header>
            <h1>Earthquake Info</h1>
        </header>
        <div class="formholder">
            <form method="post" id="form">
                Start Time:
                <input type="text" onkeyup="getEarthquakes();" id="starttime" value="2018-07-01">
                <br />
                <br /> End Time:
                <input type="text" onkeyup="getEarthquakes();" id="endtime" value="2018-07-31">
                <br />
                <br /> Latitude:
                <input type="text" onkeyup="getEarthquakes();" id="latitude" value="36.6">
                <br />
                <br /> Longitude:
                <input type="text" onkeyup="getEarthquakes();" id="longitude" value="-121.9">
                <br />
                <br /> Max Radius:
                <input type="text" onkeyup="getEarthquakes();" id="maxradius" value="10">
                <br />
                <br /> Min Magnitud:
                <input type="text" onkeyup="getEarthquakes();" id="minmag" value="3">
                <br />
                <br />
                <input type="submit" id="formButton" value="Get Info" />
                <br />
                <br />
            </form>
        </div>
    </div>
    <div class="output-div">
      <p id="status"></p>
      <ul id="output-list">
        
      </ul>
    </div>

    <!-- Rubric Here -->
    <div id="rubric1Div">
        <table border=1 width="400">
            <tr style="background-color:#FFFFFF">
                <th>#</th>
                <th>Task Description</th>
                <th>Points</th>
            </tr>
            <tr style="background-color:#99E999">
                <td>1</td>
                <td>The HTML form is properly created, including all elements</td>
                <td width="20" align="center">10</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>2</td>
                <td>There is an event triggered when the value of any of the Form element changes</td>
                <td width="20" align="center">10</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>3</td>
                <td>An AJAX call is properly executed when the value of any of the Form element changes</td>
                <td align="center">15</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>4</td>
                <td>The list of Magnitudes and Places is properly updated</td>
                <td align="center">15</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>5</td>
                <td>At least five CSS rules are included</td>
                <td align="center">5</td>
            </tr>
            <tr style="background-color:#99E999">
                <td>6</td>
                <td>This rubric is properly included AND UPDATED (BONUS)</td>
                <td align="center">2</td>
            </tr>
            <tr>
                <td></td>
                <td>T O T A L </td>
                <td width="20" align="center"><b></b></td>
            </tr>
        </table>
    </div>
</body>

</html>