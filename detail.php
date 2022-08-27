<?php

session_start();

require_once "scripts/config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once "header.php"; ?>
    <div class="container">
        <br>
        <?php
        $sql = "SELECT * FROM events WHERE id = '".$_GET['id']."' ";
        $req = mysqli_query($link, $sql);
        $row =  mysqli_fetch_assoc($req);
        $date = new DateTime($row['date']);
        $title = $row['title'];
        $address = $row['address'];
        $link_yt = $row['link_yt'];
        $image = $row['image'];
        $id = $row['id'];

        $sql2 = "SELECT data FROM files WHERE id=$image";
        $result2 = $link->query($sql2);
        $row2 = $result2->fetch_assoc();
        $image = $row2["data"];     
        ?>
        <div class="card shadow p-3 mb-5">
            <?php
                echo '<img class="card-img-top" alt="Card image cap" src="data:image/jpeg;base64,'.base64_encode($image).'"/>';
            ?>
            <div class="card-body">
                <div>
                    <h1 class="card-title"><?php echo $title ?></h1>
                </div>
                <div>
                    <h2><?php echo $date->format('d/m/Y')?></h2>
                    <h3><?php echo $address?> </h3>
                </div>
                <br>
                <iframe class="shadow-sm p-3 mb-5" width=100% height=400 src=<?php echo $link_yt ?> >
                </iframe>
            </div>
        </div>
    </div>
</body>
<?php require_once "footer.php"; ?>

</html>