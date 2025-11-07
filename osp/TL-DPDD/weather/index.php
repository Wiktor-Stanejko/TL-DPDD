<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
    <div class="header-container">
        Weather Forecast
    </div>

    <div class="main-container">

    <form method="get" action="">
        <label for="city">Choose a city:</label>
        <select name="city" id="city" required>
            <option value="Berlin|Europe/Berlin">Berlin</option>
            <option value="London|Europe/London">London</option>
            <option value="New York|America/New_York">New York</option>
            <option value="Tokyo|Asia/Tokyo">Tokyo</option>
            <option value="Sydney|Australia/Sydney">Sydney</option>
        </select>
        <button type="submit">Get Forecast</button>
    </form>


    <?php
    
    if (isset($_GET['city'])) {
  list($cityName, $timezone) = explode('|', $_GET['city']);

  // Coordinates for each city
  $coordinates = [
    "Berlin" => ["lat" => 52.52, "lon" => 13.41],
    "London" => ["lat" => 51.51, "lon" => -0.13],
    "New York" => ["lat" => 40.71, "lon" => -74.01],
    "Tokyo" => ["lat" => 35.68, "lon" => 139.76],
    "Sydney" => ["lat" => -33.87, "lon" => 151.21]
  ];

  $lat = $coordinates[$cityName]['lat'];
  $lon = $coordinates[$cityName]['lon'];

  $url = "https://api.open-meteo.com/v1/forecast?latitude=$lat&longitude=$lon&hourly=temperature_2m&timezone=$timezone";
  $response = @file_get_contents($url);

  if ($response) {
    $data = json_decode($response, true);
    $temperatures = $data['hourly']['temperature_2m'];
    $times = $data['hourly']['time'];

    echo "<h3>Hourly Temperature Forecast ($cityName)</h3><ul>";
    for ($i = 0; $i < 12; $i++) {
      echo "<li><strong>" . date("D H:i", strtotime($times[$i])) . "</strong>: " . $temperatures[$i] . "°C</li>";
    }
    echo "</ul>";
  } else {
    echo "<p style='color:red;'>Unable to fetch weather data.</p>";
  }
}

    ?>
    
   
    </div>

    <div class="footer-container">
        
    </div>

   
</body>
</html>