<?php // fonction pour les formulaire


function sanitize_input($data){ //Pour que des scrip froduleux ne puissent pas etre enregistrer 
    $data = trim($data);
    $data = stripslashes($data); 
    $data = htmlspecialchars($data);
    return $data;
}

//une fonction qui permet de recupere url de la page actuelle en toute securite 

function getSelfUrl() {
    return htmlspecialchars( dirname ($_SERVER['PHP_SELF'])) ; //direname recuperer l'url sans l'index.php et htmlspecialchars il protege l'url 
}