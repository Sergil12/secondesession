<?php

require_once "../scripts/config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <style>
    .wrapper {
        width: 360px;
        padding: 20px;
    }
    </style>
</head>

<body>
    <?php require_once "header.php"; ?>
    <section class="container">
        <br>
        <?php
    $sql = "SELECT * FROM events WHERE id = '".$_GET['id']."' "; //selectionner l'evenment ou l'id correspont a l'evenement selectionner grace auy lien de la page index
    $req = mysqli_query($link, $sql);
    $row =  mysqli_fetch_assoc($req);
    $date = new DateTime($row['date']);
    $title = $row['title'];
    $address = $row['address'];
    $link_yt = $row['link_yt'];
    $image = $row['image'];
    $id = $row['id']
        
    ?>
        <div class="card h-200" >
            <?php
                echo '<img class="card-img-top" alt="Card image cap" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
            ?>
            <div class="card-body">
                <div>
                    <h1 class="card-title"><?php echo $title ?></h1>
                </div>
                <div>
                    <h2><?php echo $date->format('d/m/Y')?></h2>
                    <h3><?php echo $address?> </h3>
                </div>
                <a href="<?php echo $link_yt ?>" class="btn btn-primary">Ticket</a>
            </div>
        </div>

</body>

</html>