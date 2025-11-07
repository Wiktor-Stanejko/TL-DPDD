<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pokémon Viewer</title>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>

  <div class="header-container">
    Pokémon
  </div>

  <div class="main-container">
    <h2>Select a Pokémon</h2>

    <form method="get" action="">
      <input type="text" name="pokemon" placeholder="e.g. pikachu" required>
      <button type="submit">Fetch Pokémon</button>
    </form>

    <?php
    if (isset($_GET['pokemon'])) {
      $pokemon = strtolower(trim($_GET['pokemon']));
      $url = "https://pokeapi.co/api/v2/pokemon/" . urlencode($pokemon);

      $response = @file_get_contents($url);

      if ($response) {
        $data = json_decode($response, true);

      $name = ucfirst($data['name']);
      $sprite = $data['sprites']['front_default'];
      $sprite1 = $data['sprites']['front_shiny'];

      echo "<h3>Name: $name</h3>";
      echo "<div class='image-container'>";
      echo "<div><strong>Default</strong><br><img src='$sprite' alt='$name'></div>";
      echo "<div><strong>Shiny</strong><br><img src='$sprite1' alt='$name'></div>";
      echo "</div>";
     
      $speciesUrl = $data['species']['url'];
      $speciesResponse = @file_get_contents($speciesUrl);
    
      if ($speciesResponse) {
        $speciesData = json_decode($speciesResponse, true);
        $evolutionUrl = $speciesData['evolution_chain']['url'];
        $evolutionResponse = @file_get_contents($evolutionUrl);
    
      if ($evolutionResponse) {
        $evolutionData = json_decode($evolutionResponse, true);
        $chain = $evolutionData['chain'];
        $evolutions = [];

         do {
          $evolutions[] = ucfirst($chain['species']['name']);
          $chain = $chain['evolves_to'][0] ?? null;
        } while ($chain);

        echo "<h3>Evolution Chain:</h3><div class='image-container'>";
        foreach ($evolutions as $evoName) {
            $evoUrl = "https://pokeapi.co/api/v2/pokemon/" . strtolower($evoName);
            $evoResponse = @file_get_contents($evoUrl);

      if ($evoResponse) {
        $evoData = json_decode($evoResponse, true);
        $evoSprite = $evoData['sprites']['front_default'];
        echo "<div><strong>$evoName</strong><br><img src='$evoSprite' alt='$evoName'></div>";
    }
}
echo "</div>";
      }
    }
  } else {
    echo "<p style='color:red;'>Sorry, that Pokémon was not found. Please try another name.</p>";
  }
}

?>

  </div>

  <div class="footer-container">

  </div>

</body>
</html>
