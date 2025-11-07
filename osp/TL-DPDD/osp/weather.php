   <?php include("templates/header.php"); ?>

<div class="content-container-weather">
  <div class="content-middle">
    <h2>Check the Weather</h2>
    <div class="weather-form">
      <input type="text" id="locationInput" placeholder="Enter city or postcode" />
      <button onclick="getWeather()">Get Weather</button>
    </div>
    <div id="weatherResult" class="weather-output"></div>
  </div>
</div>

<script>
  function getWeather() {
    const location = document.getElementById("locationInput").value;
    fetch(`weather-api.php?location=${encodeURIComponent(location)}`)
      .then(response => response.text())
      .then(data => {
        document.getElementById("weatherResult").innerHTML = data;
      })
      .catch(error => {
        document.getElementById("weatherResult").innerHTML = "Error fetching weather.";
      });
  }
</script>

<?php include("templates/footer.php"); ?>
