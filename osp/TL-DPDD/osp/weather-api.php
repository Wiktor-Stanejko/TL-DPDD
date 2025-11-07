<?php
$weatherDescriptions = [
  0 => "Clear sky",
  1 => "Mainly clear",
  2 => "Partly cloudy",
  3 => "Overcast",
  45 => "Fog",
  48 => "Rime fog",
  51 => "Light drizzle",
  61 => "Light rain",
  71 => "Light snow",
  80 => "Rain showers",
  95 => "Thunderstorm",
  53 => "Unknown",
  55 => "Unknown",
  63 => "Unknown",

];

if (isset($_GET['location']) && !empty($_GET['location'])) {
    $location = htmlspecialchars($_GET['location']);

    $geoUrl = "https://geocoding-api.open-meteo.com/v1/search?name=" . urlencode($location);
    $geoData = json_decode(file_get_contents($geoUrl), true);

    if (!empty($geoData['results'])) {
        $lat = $geoData['results'][0]['latitude'];
        $lon = $geoData['results'][0]['longitude'];

        $weatherUrl = "https://api.open-meteo.com/v1/forecast?latitude={$lat}&longitude={$lon}&daily=temperature_2m_max,temperature_2m_min,weathercode&timezone=auto";
        $weatherData = json_decode(file_get_contents($weatherUrl), true);

        if (!empty($weatherData['daily'])) {
            $dates = $weatherData['daily']['time'];
            $maxTemps = $weatherData['daily']['temperature_2m_max'];
            $minTemps = $weatherData['daily']['temperature_2m_min'];
            $codes = $weatherData['daily']['weathercode'];

            echo "<div class='forecast'>";
            for ($i = 0; $i < 7; $i++) {
                $code = $codes[$i];
                $iconUrl = "icons/{$code}.png";
                $description = $weatherDescriptions[$code] ?? "Unknown";

                echo "<div class='forecast-card'>
                        <p class='forecast-date'><strong>{$dates[$i]}</strong></p>
                        <img src='{$iconUrl}' alt='Weather icon' class='forecast-icon' />
                        <p class='forecast-desc'>{$description}</p>
                        <p>High: {$maxTemps[$i]}°C</p>
                        <p>Low: {$minTemps[$i]}°C</p>
                      </div>";
            }
            echo "</div>";
        } else {
            echo "<p>No forecast data available.</p>";
        }
    } else {
        echo "<p>Could not find coordinates for {$location}.</p>";
    }
} else {
    echo "<p>Please enter a valid location.</p>";
}
?>