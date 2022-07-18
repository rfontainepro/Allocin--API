<?php

require_once "apikey.php"; // Fichier contenant la clef de l'API
$id_film = "507086"; // ID film pour récupérer la liste des acteurs
$url_credits = "http://api.themoviedb.org/3/movie/{$id_film}/credits?api_key={$APIKEY}&language=fr";
//$url_movies = "https://api.themoviedb.org/3/movie/{movie_id}?api_key=<<api_key>>&language=fr";

// Récupére les acteurs par rapport à un film
$json = file_get_contents($url_credits); // Récupérer la liste des acteurs
$obj = json_decode($json, TRUE); // Decoder le contenu récupéré par l'URL de l'API

foreach($obj['cast'] as $actor) {
    $_FILES[] = [
        'name' => $actor['name'], // Récupérer les noms et prénoms des acteurs
        'character' => $actor['character'], // Récupérer les prénoms et noms incarnés par l'acteur
        'profile_path' => 'https://image.tmdb.org/t/p/w92' . $actor['profile_path'], // Récupérer les portraits
        'id' => $actor['id'] // Récupérer l'ID de l'acteur
    ];
}

//var_dump($_FILES);
//var_dump();

?>

<!---------------------------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/main.css" /> <!-- Appel du fichier CSS -->
    <title>FoxMovies</title>
</head>

<body>
    
    <header>

		<!-- FAVICON (Logo du site) ------------------------------------------------------------------------------------------------------>
		<link rel="icon" type="image/png" href="./views/img/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="./views/img/favicon-16x16.png" sizes="16x16" />
		<!-------------------------------------------------------------------------------------------------------------------------------->

        <!-- Logo du site -->
        <div id="logo">
            <img src="./views/img/logo_fox.png" alt="Logo_Fox" />
        </div>

        <!-- Recherche de film -->
        <form  id="form">
            <input type="text" placeholder="Rechercher" id="search" class="search">
        </form>

    </header>

    <div id="tags"></div>

    <div id="myNav" class="overlay"> 

        <!-- Bouton pour fermer la navigation superposée -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      
        <!-- Overlay -->
        <div class="overlay-content" id="overlay-content"></div>

        <!-- Page contenant la vue avec bande annonce + liste des acteurs -->
        <?php include ('./template.php'); ?>
        
        <!-- Flèches pour choisir la bande annonce du film -->
        <a href="javascript:void(0)" class="arrow left-arrow" id="left-arrow">&#8656;</a>
        <a href="javascript:void(0)" class="arrow right-arrow" id="right-arrow" >&#8658;</a>

    </div>
      
    <main id="main"></main>

    <!-- Pagination -->
    <div class="pagination">

        <div class="page" id="prev">< Précédent</div>
        <div class="current" id="current">1</div>
        <div class="page" id="next">Suivant ></div>

    </div>

    <script src="./views/js/script.js"></script> <!-- Appel du fichier JS -->

</body>
</html>