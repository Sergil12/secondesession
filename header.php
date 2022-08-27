<style>
.navbar-nav li {
    border: 2px solid black;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Logo" height=80 class="img" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Events</a>
                </li>
            </ul>
            <?php 
                 if(!isset($_SESSION["loggedin"])){?>
            <div class="d-flex">
                <a class="btn btn-danger ms-3 mr-1" href="login.php">Login</a>
                <a class="btn btn-dark ms-3" href="register.php">Register</a>
            </div>
            <?php  } else { ?>
            <div class="d-flex">
                <a class="btn btn-danger ms-3 mr-1" href="scripts/logout.php">Logout</a>
            </div>
            <?php } ?>

        </div>
    </div>
</nav>