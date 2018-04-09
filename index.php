<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Погода</title>
</head>

<body>
<pre>
<?php

$weather = file_get_contents ('http://api.openweathermap.org/data/2.5/weather?q=Moscow&appid=bc7a6d8c8b820be99cd9ac688cb76dc7');
if (!$weather) {
	$weather = file_get_contents ('weather.json');	
}
else {
	file_put_contents ('weather.json', $weather);	
}
$weather = json_decode($weather, true);

$pogoda = $weather ['main'];
$veter = $weather ['wind'];
//print_r ($weather);

?>
<table>
    <thead>
        <tr>
            <th colspan="2">Погода:</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Температура</td>
            <td><?=$pogoda ['temp'] ?></td>
        </tr>
        <tr>
            <td>Давление</td>
            <td><?=$pogoda ['pressure'] ?></td>
        </tr>
        <tr>
            <td>Влажность</td>
            <td><?=$pogoda ['temp_min'] ?></td>
        </tr>
        <tr>
            <td>Скорость ветра</td>
            <td><?=$veter ['speed'] ?></td>
        </tr>
      
    </tbody>
</table>
</body>
</html>
