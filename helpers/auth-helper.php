<?php

function redirect($url, $permanent = false){
    if(headers_sent() === false){
       header("location:$url", true, ($permanent === true ? 301 : 302 )); // permanent la page exsite pas donc c'est une autre et temporaire c'est une autre page qui est temporaire 
    }
    exit(); //tu arrete le script mtn 
}


function init_session() {   //pour lancer une session 
    session_start();
}


function prevent_not_connected($init_session = false){ //si la personne est pas connceter on redirige sur login si elle est true on passe a la ligne suivante  
    if ($init_session){
    init_session(); //pour avoir acces au $_SESSION
    }
$connected = isset ($_SESSION['login']);//c'est connecter si il y a quelque chose dans le login --> (!$connected) c'est le contraire de  $connected
if (!$connected) {
    $redirect_url = urlencode ($_SERVER['PHP_SELF']); //on dit a login si tu arrive a te connecter tu l'envois sur la page admin 
    redirect('../login?redirect='.$redirect_url); // si on est pas connecter  on redirige vers la page login et quand on sera connecter il nous redirigera vers admin
   }
}