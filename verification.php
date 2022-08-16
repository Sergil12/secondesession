
<?php
    var_dump("455555");
    session_start(); 
    var_dump("testtttt");
    if(isset($_POST['nomUtilisateur']) && isset($_POST['motDePasse']))
    {
        $nomUtilisateurBDD ="root";
        $motDePasseBDD = null;
        $nomBDD = 'session';
        $hostBDD = 'localhost';
        var_dump("5555");
        $BDD = mysqli_connect($hostBDD, $nomUtilisateurBDD, $motDePasseBDD,$nomBDD); //connexion base de donner
               //or header('Location: index.php?erreur=1'); //l'erreur de connexion (index.php)
       
        $nomUtilisateur = mysqli_real_escape_string($BDD, htmlspecialchars($_POST['nomUtilisateur'])); 
        $motDePasse = mysqli_real_escape_string($BDD, htmlspecialchars($_POST['motDePasse']));
        var_dump("22222");
        if($nomUtilisateur !== "" && $motDePasse !== "")
        {
            var_dump("test");
            $sql = "SELECT count(*) 
                    FROM utilisateur    
                    WHERE User = '".$nomUtilisateur."' AND Pass = '".$motDePasse."'";
            $req = mysqli_query($BDD,$sql);
            $reponse = mysqli_fetch_assoc($req);
            $count = $reponse['count(*)'];
            if($count == 0) //personne qui existe pas
            {
                var_dump("7777");
                //header('Location: index.php?erreur=1');
                exit();
            }
            else //si ses bon tu enregistre dans une variable de session 
            {
                $_SESSION['nomUtilisateur'] = $nomUtilisateur;
                $_SESSION['motDePasse'] = htmlspecialchars($_POST['motDePasse']);
                //header('Location: principale.php'); //connecter vers la page principal
                exit();
            }
        }
    }
    else
    {
        //header('Location: index.php?erreur=1');
        exit();
    }
    mysqli_close($db);
?>