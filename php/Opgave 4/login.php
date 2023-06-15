<?php 
    session_start();

    if(isset($_SESSION["login"]) == true) {
        header("Location: https://laur576w.aspitcloud.dk/v31/php/Opgave%204/index.php");
        exit();
    }
    include "includes/db-functions.php";

    $db = getDb("laur576w_v3_1");
    
    if(isset($_POST["login-submit"])) {
        $errors = []; //stores errors
        
        foreach($_POST as $index => $value){
            $_POST["$index"] = $value;
        }
        if($db->query("SELECT * FROM users WHERE Username = '{$_POST["login-username"]}' AND Password = '{$_POST["login-password"]}'")){
            $result = $db->query("SELECT * FROM users WHERE Username = '{$_POST["login-username"]}' AND Password = '{$_POST["login-password"]}'");
            $row = $result->fetch_assoc();
            if((isset($_POST["login-username"]) && !empty($_POST["login-username"])) && 
            (isset($_POST["login-password"]) && !empty($_POST["login-password"])) &&
            isset($row) && !empty($row) &&
            $row["Username"] == $_POST["login-username"] && 
            $row["Password"] == $_POST["login-password"]) {
                $_SESSION["username"] = $row["Username"];
                $_SESSION["login"] = true;
            }
            else {
            $errors[] = "Brugernavn eller adgangskode var forkert(e).";
            }
        }
        else {
            $errors[] = $db->error;
        }
        

        if(empty($errors)) {
            header("Location: https://laur576w.aspitcloud.dk/v31/php/Opgave%204/index.php");
            exit();
        }
    }


?>

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
        <h1>Login</h1>
        <?php 
            if(isset($_SESSION["fname"]) && !isset($_SESSION["login"])) {
                ?>
                <h2>Velkommen til, <?= $_SESSION["fname"] ?>. Du kan logge ind her:</h2>
                <?php
            }
        ?>
        <form method="post">
        <?php if(!empty($errors)) {?>
                <div class="error">
                    <?php 
                        foreach ($errors as $error) { ?>
                            <p><?= $error ?></p>
                        <?php }
                    ?>
                </div>
            <?php } ?>
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