<?php 

require_once './helpers/auth-helper.php';

//redirect('./articles' , true); //la page d'accueil sera toujours rediriger vers articles et le true empeche que l'on demande au serveur 

?>


<!DOCTYPE html>
<html lang="fr">
<?php $title = "Acceuil" ; require "./head.php" ?> <!-- Require = mettre tout ce que il y a dans le head ici  et le $title c est pour que on sache quoi afficher -->
<body>
   <?php require "./header.php"; ?> <!-- on ajoute ce que il y a dans le footer et le header-->
   <?php require "./footer.php"; ?>
</body>
</html>