<?php

require './model.php';
require_once '../helpers/auth-helper.php'; //on a acces au foncyion de ce dossiers 
require_once '../helpers/form-helper.php'; //on a acces au fonction qui sont dans ce dossiers

#region post logic(logique du formulaire connexion)

if($_SERVER['REQUEST_METHOD']==='POST') { // Si la methode de la requete est en post 
    $user_infos = [
        'username'=> sanitize_input ($_POST['username']), //on prend ce qui est dans les champs et on le met dans user_infos
        'password'=> sanitize_input ($_POST['password']),
    ];
    
    $user = 'serena';
    $pass = password_hash('1234',PASSWORD_DEFAULT);//on cripte le mot de pass avec password_hash et avec passxord_default on l-ne l'affiche pas tel quel dans la db
    //echo $pass; //pour voir le lien du mot de passe a mettre en db via php my admin pour que il soit cacher le mot de pass
    //die();

 

    if (getverifie($user_infos['username'], $user_infos['password'])) { //on verifie si ce que il ya dans username  est le meme que ce que on a en db
        init_session();
        $_SESSION['login'] = $user_infos['username']; //stocker la valeur de username dans le $_session mais on ne stock pas le mdp

       // $redirect = isset($_GET['redirect']) ? urldecode($_GET['redirect']) : '../articles' ;//calculer ou on va rediriger si c'est faut on prend artlicles
       //redirect($redirect);
    }
}

#endregion Post logic(logique du formulaire)


require './view.php'; //liens 
