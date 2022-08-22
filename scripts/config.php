<?php
/* identifiants dela base de donner (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');
 
/* liens qui renvois la db */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// si le liens est faut c mort
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>