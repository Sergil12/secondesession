<?php
/* Database CONNEXIO? */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');
 
/* connexion MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// verifier connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>