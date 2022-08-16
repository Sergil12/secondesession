<html>
    <head>
       <meta charset="utf-8">
    </head>
    <body background="img/background.jpg">
        <div style='text-align: center'>
            <form action="verification.php" method="POST">
                <h1>Connection</h1>
                <b>Username</b>
                <br>
                <input type="text" placeholder="Enter the username" name="nomUtilisateur" required>
                <br>
                <b>Password</b>
                <br>
                <input type="password" placeholder="Enter the password" name="motDePasse" required>
                <br><br>
                <input type="submit" value='Login'>
            </form>
            <?php
                if(isset($_GET['erreur']))
                {
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
            ?>
        </div>
    </body>
</html>