<?php
   $appName = "session"; // cree une variable qui contiens bioblog 
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- on va mettre pour Rendre le site social network frendly faire une carte pour remplacer url sur les resseaux  -->
    <title><?= $appName ?><?= isset($title) ? " - $title" : '' ?></title>  <!-- voir racoursit /on teste pour afficher le titre si il y a quelque chose dzns title si il y a rien on met rien  -->
    <!--<link rel="icon" type="image/x-icon" href="/bioblog/favicon.ico">-->
    <meta name="decription" content="<?= $site_description ?>"/>
    <link rel="stylesheet" href= "/secondesession/style.css"/>



    <meta property = "og:type" content ="article"/>
    <meta property = "og:title" content ="<?= $appName ?><?= isset($title) ? " - $title" : '' ?>"/>
    <meta property = "og:site_name" content ="<?= $appName ?>"/>
    <?php if(isset($site_description)): ?> <!-- dans la view on rajoute  $site_description = "Vous pouvez trouver ici la liste de tout nos articles"; -->
    <meta property = "og:description" content ="<?= $site_description ?>"/>
    <?php endif;  ?>
    <meta property = "og:image" content ="https://cdn.bioalaune.com/img/article/thumb/900x500/37170-carrefour-sengage-fruits-legumes-bio-saison.png"/>
    <meta property ="article:author" content ="<?= $appName ?>"/>
<!-- pour twitter-->
    <meta name="twitter:site" content="<?= $appName ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:creator" content="<?= $appName ?>" />

<!--mot cle pour aider google a renseigner nos site-->
    
    <meta name="keywords" content="evenement, Produits , Artciles" />



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> <!--lien bootstrap css-->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>