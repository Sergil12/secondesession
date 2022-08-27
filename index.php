<?php

session_start();

require_once "scripts/config.php";

if(!isset($_GET["page"])){
    $_GET["page"] = 0;
}

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Events</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
 </head>
 <body>
     <?php require_once "header.php"; ?>
     <div class="container">
         <br>
         <div class="d-flex justify-content-between align-items-center">
             <h1>Events</h1>
             <?php 
                if(isset($_SESSION["admin"]) && $_SESSION["admin"] == '1'){
             ?>
             <a href="add_event.php" class="btn btn-primary">Add an event</a>
             <?php
                }
             ?>

         </div>
         <?php
    $limit = 3;
    $offset = $_GET['page'] * $limit;
    $page = $_GET['page'];

    $sql = "SELECT * FROM events ORDER BY date LIMIT $limit OFFSET $offset";
    $result = $link->query($sql);

    $sql2 = "SELECT count(*) FROM events";
    $req2 = mysqli_query($link, $sql2);
    $response2 = mysqli_fetch_row($req2);
    $nb_rows = intval($response2[0]) - $offset;
    
    
    $disabledPrevious="";
    $disabledNext = "";
    if($page == 0){
        $disabledPrevious = "disabled";
    }

    while($row = $result->fetch_assoc()){ 
        $date = new DateTime($row['date']);
        $title = $row['title'];
        $address = $row['address'];
        $image = $row['image'];
        $id = $row['id'];

        $sql3 = "SELECT data FROM files WHERE id=$image";
        $result3 = $link->query($sql3);
        $row3 = $result3->fetch_assoc();
        $image = $row3["data"];
    ?>
         <div class="card shadow p-3 mb-5" style="width: 18rem;">
             <?php
                echo '<img class="card-img-top" alt="Card image cap" src="data:image/jpeg;base64,'.base64_encode($image).'"/>';
             ?>
             <div class="card-body">
                 <h5 class="card-title"><?php echo $title ?></h5>
                 <p class="card-text"><?php echo $date->format('d/m/Y')?> </p>
                 <p class="card-text"><?php echo $address?> </p>
                 <a href="detail.php?id=<?php echo $id ?>" class="btn btn-info">Details</a>
             </div>
         </div>

    <?php  
    }
    if($nb_rows <= $limit){
            $disabledNext = "disabled";
    }
    ?>
         <nav aria-label="Page navigation example">
             <ul class="pagination">
                 <li class="page-item <?php echo $disabledPrevious ?>"><a class="page-link"
                         href="index.php?page=<?php echo $page-1 ?>">Previous</a></li>
                 <li class="page-item <?php echo $disabledNext ?>"><a class="page-link"
                         href="index.php?page=<?php echo $page+1 ?>">Next</a></li>
             </ul>
         </nav>
     </div>
     <br>
 </body>
 <?php require_once "footer.php"; ?>
 </html>