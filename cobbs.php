<?php

$handle = fopen("http://www.cobbs-quay-weather.co.uk/clientraw.txt", "r");
$dataString = stream_get_contents($handle);
fclose($handle);

$data = explode(" ", $dataString);

$weather = array();
$weather["windspeed"] = $data[1] . " knots";
$weather["maxwindspeed"] = $data[113] . " knots";
$weather["gustspeed"] = $data[2] . " knots";
$weather["maxgustspeed"] = $data[133] . " knots";
$weather["winddir"] = $data[3] . " deg";
$weather["temp"] = $data[4] . " C";
$weather["windchill"] = $data[44] . " C";
$weather["humidity"] = $data[5] . " %";
$weather["dewpoint"] = $data[72] . " C";
$weather["pressure"] = $data[6] . " mb";
$weather["pressuretrend"] = $data[50] . " mb/hour";
$weather["raintoday"] = $data[7] . " mm";
$weather["rainmonthly"] = $data[8] . " mm";
$weather["rainyearly"] = $data[9] . " mm";
$weather["rainyesterday"] = $data[19] . " mm";
$weather["time"] = $data[29] . ":" . $data[30] . ":" . $data[31];
$weather["date"] = $data[74];
$weather["description"] = $data[49];

?>

<h2>Weather at Cobbs Quay, Poole</h2>
<p>As of <?php echo($weather["time"]); ?> on <?php echo($weather["date"]); ?></p>

<h4>Weather: <?php echo($weather["description"]); ?></h4>

<h4>Wind</h4>
<p>Wind direction: <?php echo($weather["winddir"]); ?><br/>
Wind speed: <?php echo($weather["windspeed"]); ?> (max: <?php echo($weather["maxwindspeed"]); ?>)<br/>
Gust speed: <?php echo($weather["gustspeed"]); ?> (max: <?php echo($weather["maxgustspeed"]); ?>)</p>

<h4>Atmospheric Conditions</h4>
<p>Pressure: <?php echo($weather["pressure"]); ?> (trend: <?php echo($weather["pressuretrend"]); ?>)<br/>
Humidity: <?php echo($weather["humidity"]); ?><br/>
Dew Point: <?php echo($weather["dewpoint"]); ?></p>

<h4>Temperature</h4>
<p>Temperature: <?php echo($weather["temp"]); ?><br/>
Wind chill: <?php echo($weather["windchill"]); ?></p>

<h4>Rainfall</h4>
<p>Today: <?php echo($weather["raintoday"]); ?><br/>
Yesterday: <?php echo($weather["rainyesterday"]); ?><br/>
Month to date: <?php echo($weather["rainmonthly"]); ?><br/>
Year to date: <?php echo($weather["rainyearly"]); ?></p>

<hr/>
<p><em>Script written by <a href="http://onlydreaming.net/">Ian Renton</a>.  Data from <a href="http://www.cobbs-quay-weather.co.uk">cobbs-quay-weather.co.uk</a>.</em></p>