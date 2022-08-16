<?php
    if(!isset($_SESSION)) 
    {
        session_start(); 
    }
    if($_SESSION['nomUtilisateur'] == "" || $_SESSION['motDePasse'] == "") //securiter pour que on puiisent pas entrer 
    {
        header('Location: index.php');
        exit();
    }
?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body background="img/fond.png">
        <div>
            <?php
                if($_SESSION['nomUtilisateur'] !== "")
                {
                    $utilisateur = $_SESSION['nomUtilisateur'];
                    echo "<p style='text-align:center'>Bonjour $utilisateur, vous êtes connecté à la base de données!</p>";
                }
            ?>     
        </div>
        <div>
            <center>
            <img src="img/ulg.jpg" width="10%" height="auto">
            <h1 > Articles Scientifiques </h1>       
            <div>
                <h2>Quelle requête voulez-vous effectuer ?</h2>
                    <div>   
                        <input type="button" name="OK" value="Sélectionner et afficher les tuples d'une table en contraignant la valeur d'un ou plusieurs de leurs champs." onclick="javascript:location.href='requetes/tables.php'">
                        <br><br>
                        <input type="button" name="OK" value="Retrouver l'ensemble des publications d'un chercheur, triées par ordre décroissant de date de publication, en se basant sur son matricule." onclick="javascript:location.href='requetes/publications.php'">
                        <br><br>
                        <input type="button" name="OK" value="Ajouter de nouveaux articles (de conférence ou de journal) dans la base de données." onclick="javascript:location.href='requetes/articles.php'">
                        <br><br>
                        <input type="button" name="OK" value="Retrouver les chercheurs qui ont publié au moins un article en tant que premier auteur à chaque conférence à laquelle ils ont assisté." onclick="javascript:location.href='requetes/auteurs.php'">
                        <br><br>
                        <input type="button" name="OK" value="Retrouver les sujets de recherche les plus étudiés (triés par ordre décroissant) au cours des 5 conférences les plus populaires depuis 2012." onclick="javascript:location.href='requetes/sujets.php'">      
                    <div>
            </div> 
            </center>
        </div>
    </body>
</html>