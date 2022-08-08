<?php

$db_host = "localhost"; //nom de domaine, hote de la base de donener
$db_name ="session" ; // creee le noms de la base de donner
$db_username ="session"; // user name de la base de donner meme mdp que celuis mit dans utilisateur
$db_password ="session";// mot de pass db


function getDBconnection($host,$name,$username, $password) {  //une fonction pour ce connecter a la db
          $connection = null; //initie la connexions
       try {
            $connection = new PDO("mysql:host=$host;dbname=$name",$username, $password); //pour ce connecter a la db (connection stream PDO)
            $connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// si il arrive pas a ce connecter ou a acceder a une table on affivhe une erreure 
            $connection ->exec("set names utf8");//Dire que la base de donner est en utf8
       } catch (PDOException $exception){ 
           echo "Connection error:".$exception->getMessage();//eN cas d'errure on affiche connection error plus l'erreure commise dans la page       
       }
          return $connection;
} 
//Connexions part default
$db_default_connection = getDBConnection($db_host, $db_name, $db_username, $db_password); // on peut utiliser $db_default_connection pour faire un rapelle a la db