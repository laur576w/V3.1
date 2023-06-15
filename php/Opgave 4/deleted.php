<?php 
    if(!isset($_SESSION)) {
        session_start();
    }
    if(!isset($_SESSION["login"])) {
        header("Location: https://laur576w.aspitcloud.dk/v31/php/Opgave%204/login.php");
        exit();
    }

    $errors = [];

    include "includes/db-functions.php";

    $db = getDb("laur576w_v3_1");
if($db->query("SELECT * FROM users WHERE username = '{$_SESSION["username"]}'") > 0){
    if($db->query("DELETE FROM users WHERE username = '{$_SESSION["username"]}'")){
        $_SESSION = [];
        session_unset();
        session_destroy();
    }
    else {
        $errors[] = "konto kunne ikke blive slettet";
    }
} else {
    $errors[] = "brugeren kunne ikke blive fundet";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Slettet</title>
</head>
<body class="<?php if(date("i") % 2 == 0) { ?>light<?php } else {?>dark<?php } ?>">
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        
        <main>
            <?php 
            if(empty($errors)) {
                ?>
                <h1>Du har slettet konto'en</h1>
                <?php
            } else {
                ?>
                <h1>kontoen kunne ikke blive slettet</h1>
                <?php
            }
            ?>
        </main>

        <?php include "includes/footer.php"; ?>

    </div class="content">



</body>
</html>