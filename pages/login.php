<?php
require_once "../scripts/config.php";

$username = "";
$password = "";
$username_error = "";
$password_error = "";
$login_error = "";
 
if(isset($_POST['submit'])){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_error = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter your password.";
    } else{
        $password = sha1(trim($_POST["password"]));
    }
    
    // Validate credentials
    if(empty($username_error) && empty($password_error)){

        // Request
        $sql = "SELECT count(*)  FROM users WHERE username = '".$username."' AND password = '".$password."'";
        $req = mysqli_query($link, $sql);
        $reponse = mysqli_fetch_assoc($req);
        $count = $reponse['count(*)'];
        if($count > 0){
            // Start new session
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;                         
                    
            // Redirect user to page of events
            header("location: index.php");
        } else{
            // Password is not valid, display a generic error message
            $login_error = "Invalid username or password.";
        } 
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .wrapper {
        width: 360px;
        padding: 20px;
    }
    </style>
</head>

<body>
    <?php require_once "header.php"; ?>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_error)){
            echo '<div class="alert alert-danger">' . $login_error . '</div>';
        }        
        ?>

        <form action="" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username"
                    class="form-control <?php echo (!empty($username_error)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_error; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"
                    class="form-control <?php echo (!empty($password_error)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_error; ?></span>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Login">
            </div>
            <br>
        </form>
    </div>
</body>

</html>