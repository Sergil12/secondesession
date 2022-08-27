<?php
session_start();

if(isset($_SESSION["loggedin"])){
    header("location: index.php");
}

require_once "scripts/config.php";

$username = "";
$password = "";
$username_error = "";
$password_error = "";
$login_error = "";
 
if(isset($_POST['submit'])){
    if(empty(trim($_POST["username"]))){
        $username_error = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter your password.";
    } else{
        $password = sha1(trim($_POST["password"]));
    }

    if(empty($username_error) && empty($password_error)){
        $sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
        $req = mysqli_query($link, $sql);
        $response = mysqli_fetch_assoc($req);
        if($response != null){
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["admin"] = $response["admin"];
            header("location: index.php");
        } else{
            $login_error = "Invalid username or password.";
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
</head>

<body>
    <?php require_once "header.php"; ?>
    <br>
    <div class="container">
        <div class="card shadow p-3 mb-5" style="width: 18rem;">
            <div class="card-body">
                <h2>Login</h2>
                <p>Please fill in your credentials to login.</p>

                <?php 
                if(!empty($login_error)){
                    echo '<div class="alert alert-danger">' . $login_error . '</div>';
                }        
                ?>
                <form action="" method="post">
                    <div class="form-group ">
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
        </div>
    </div>
</body>
<?php require_once "footer.php"; ?>
</html>