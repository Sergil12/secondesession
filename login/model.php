<?php 

require_once "../config/db.php"; // c'est la connexions a la db

function getpass($user){ 
    global $db_default_connection ; //pour la connexion db
    $query ='SELECT Nom,Prenom,User,Pass,Creation_date, Delete_date FROM users WHERE User = :user';
    $stmt = $db_default_connection ->prepare ($query);//prepare cette requete la a etre executer 
    $stmt->execute([
        'user' => $user
    ]);// On execute la requete
    return $stmt; //$stmt c'est le resultat de la requete
}

function getverifie($user, $pass){ 
    global $db_default_connection ; //pour la connexion db
    $stmt= getpass($user);
    $count = $stmt->rowCount(); 
    if($count === 1) { //on verifie si le user est bon 
        $curentuser= $stmt-> fetch(PDO::FETCH_ASSOC); //c'est toute les colone de cette ligne de l'utilisateur que ona rentrer 
        $curentpass = $curentuser['Pass']; //n recupere le pass dans le curentuser (ligne de l'utilisateur) et on le met dans le curentpass
        if (password_verify($pass, $curentpass)){
            return true; //c'est juste car le pass et le user existe et sont correct
        } else {
            return false;// c'est faut car le pass est faut 
        }
    } else {
        return false; //c'est faut car le user est faut 
    }
}

?>