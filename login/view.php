<!DOCTYPE html>
<html lang="fr">
<?php $title = "Connexion" ; $site_description = "Vous pouvez vous connecter"; require "../head.php" ?> <!-- Require = mettre tout ce que il y a dans le head ici  et le $title c est pour que on sache quoi afficher -->
<body>
   <style>
       .error {
           text-align: center;
       }
   </style>
   <?php require "../header.php"; ?> <!-- on ajoute ce que il y a dans le footer et le header-->

    <div class="container" >
       <div class="form-container text-center" > <!-- formulaire de connexion en mettant texte center on centre tout le formulaire --><!--en mettant texte center on centre tout le formulaire-->
          <form
              action=""
              method="POST">
              <h2 class="text-center"><strong>Welcome back ! </strong></h2> <!--on centre le texte et on le met en gras avec bootstrap-->
              <div class="form-group"> <!--input+label design-->
                 <label>
                     Username
                       <input
                          class="form-control" 
                          type="text"
                          name="username"
                          placeholder="Username"/> <!--form control va avec form group-->
                 </label>
              </div>
              <div class="form-group"> <!--input+label design-->
                 <label>
                     Password
                       <input
                          class="form-control"
                          type="password"
                          name="password"
                          placeholder="Password"/>
                 </label>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Login</button> <!-- pour btn block pour que le bouton prenne toute la largeur-->
              </div>
          </form>
       </div>
    </div>
   <?php if($_SERVER['REQUEST_METHOD']==='POST'): ?> <!--05/05 ex 4-->
         <p class="error" ><?= "     Veuiller entrer un utilisateur ou un mot de pass correct!" ?></p> <!-- c'est le message d'erreure-->
   <?php endif;?>
   <?php require "../footer.php"; ?>
</body>
</html>