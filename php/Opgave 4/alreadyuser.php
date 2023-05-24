<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login</title>
</head>
<body class="<?php if(date("i") % 2 == 0) { ?>light<?php } else {?>dark<?php } ?>">

    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>

    <div class="content">
        <main>
            <h1>Brugeren er allerede oprettet</h1>
            
            <p>Du kan logge ind nedenfor:</p>

            <form method="post">
                <p>
                    <label for="login-username" class="loginform">Brugernavn: </label>
                    <input type="text" name="login-username" placeholder="Brugernavn" class="logininput">
                </p>
                
                <p>
                    <label for="login-password" class="loginform">Adgangskode: </label>
                    <input type="text" name="login-password" placeholder="Adgangskode" class="logininput">
                </p>
                
                <p>
                    <input type="submit" name="login-submit" value="Login" class="submitbtn loginbtn">
                </p>
            </form>

        </main>

        <?php include "includes/footer.php"; ?>
    </div>
        
</body>
</html>