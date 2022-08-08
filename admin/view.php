<!DOCTYPE html>
<html lang="fr">
<?php $title = "Admin" ;$site_description = "Vous etes sur la page admin "; require "../head.php" ?> <!-- Require = mettre tout ce que il y a dans le head ici  et le $title c est pour que on sache quoi afficher -->
<body>
   <style>
      h2 {
         text-align: center;
      }
      .deco{
         text-align: center;
      }
   </style>
   <?php require "../header.php"; ?> <!-- on ajoute ce que il y a dans le footer et le header-->
   <br>
   <h2> Tu es Connecter !!!!  <?= $_SESSION["login"] ?></h2>

   <!--<div class="a"><a  href="../create_article">Crée un evenement</a></div> lien vers ajouter un articles-->
   
   <br>
   <form class="deco" action = "" method="POST"> <!--Bouton deconnexion-->
      <input type="submit" name="deconnexion" value="Logout" class="btn btn-danger"/>
   </form>

   <?php require "../footer.php"; ?>
</body>
</html>