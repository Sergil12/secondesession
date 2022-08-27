<?php

session_start();

if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != '1'){
    header("location: index.php");
}

require_once "scripts/config.php";

$title_err = "";
$date_err = "";
$link_yt_err = "";
$address_err = "";
$image_err = "";
$title = "";
$date= "";
$link_yt = "";
$address = "";

if(isset($_POST['submit'])) {

    if(empty(trim($_POST["title"]))){
        $title_err = "Please enter a title.";     
    }else{
        $title = trim($_POST["title"]);
    }

    if(empty(trim($_POST["date"]))){
        $date_err = "Please enter a date.";     
    }else{
        $date = trim($_POST["date"]);
    }

    if(empty(trim($_POST["link_yt"]))){
        $link_yt_err = "Please enter a YouTube link.";     
    }else{
        $link_yt = trim($_POST["link_yt"]);
    }

    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter an address.";     
    }else{
        $address = trim($_POST["address"]);
    }

    $path = $_FILES['image']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    if(!is_uploaded_file($_FILES['image']['tmp_name'])){
        $image_err = "Please upload an image.";     
    }
    else if($ext != "jpg" && $ext != "png" && $ext != "jpeg"){
        $image_err = "Please upload an image in jpg, png, or jpeg format.";    
    }
    

    if (empty($title_err) && empty($date_err) && empty($link_yt_err) && empty($address_err) && empty($image_err)) {
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $imageProperties = getimageSize($_FILES['image']['tmp_name']);

        $sql = "INSERT INTO files(mime, data) VALUES('{$imageProperties['mime']}', '{$imgData}')";
        $req = mysqli_query($link, $sql);
        $sql = "SELECT LAST_INSERT_ID()";
        $req =  mysqli_query($link, $sql);
        $reponse = mysqli_fetch_assoc($req);
        $current_id = $reponse["LAST_INSERT_ID()"];
        if (isset($current_id)) {
            $datetime = DateTime::createFromFormat('d/m/Y', $_POST["date"])->format('Y-m-d H:i:s');
            $sql = "INSERT INTO events (title, image, link_yt, date, address) VALUES ('".$_POST['title']."', $current_id, '".$_POST['link_yt']."', '".$datetime."', '".$_POST['address']."')";
            $req = mysqli_query($link, $sql);
            header("Location: index.php");
        }
    }
}

 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <script>
    $(document).ready(function() {
        $('#date').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true
        });

    });
    </script>
</head>

<body>
    <?php require_once "header.php"; ?>
    <br>
    <div class="container">
        <div class="card shadow p-3 mb-5" style="width: 18rem;">
            <div class="card-body">
                <h2>Add an event</h2>
                <p>Please fill in the fields to add an event.</p>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $title; ?>">
                        <span class="invalid-feedback"><?php echo $title_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" id="date" name="date"
                        value="<?php echo $date; ?>">
                        <span class="invalid-feedback"><?php echo $date_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Youtube link</label>
                        <input type="text" name="link_yt" class="form-control <?php echo (!empty($link_yt_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $link_yt; ?>">
                        <span class="invalid-feedback"><?php echo $link_yt_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $address; ?>">
                        <span class="invalid-feedback"><?php echo $address_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" id="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $image_err; ?></span>
                    </div><br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php require_once "footer.php"; ?>
</html>