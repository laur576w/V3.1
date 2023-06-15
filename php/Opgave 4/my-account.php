<?php 
    if(!isset($_SESSION)) {
        session_start();
    }
    if(!isset($_SESSION["login"])) {
        header("Location: https://laur576w.aspitcloud.dk/v31/php/Opgave%204/login.php");
        exit();
    }
    include "./includes/db-functions.php";
    $db = getDb("laur576w_v3_1");
    $errors = [];

    
        
    

    if($result = $db->query("SELECT * FROM users WHERE Username = '{$_SESSION["username"]}'")) {

        if($row = $result->fetch_assoc()) {
            $id = $row["Id"];
            $password = $row["Password"];
            $username = $row["Username"];
            $fname = $row["Firstname"];
            $lname = $row["Lastname"];
            $address = $row["Address"];
            $postcode = $row["Postcode"];
            $country = $row["Country"];
            $email = $row["Email"];
            $website = $row["website"];

            if(isset($_POST["update"])){
                foreach($_POST as $index => $value) {
                    $_POST[$index] = trim($value);
                }
                if(!isset($_POST["username"]) || empty($_POST["username"])) {
                    $errors["username"] =  "Brugernavnet må ikke være tomt.";
                }
                
                if(!isset($_POST["password"]) || empty($_POST["password"])) {
                    $errors["password"] =  "Adgangskoden må ikke være tomt."; 
                }
                
                if(!isset($_POST["email"]) || empty($_POST["email"]) || 
                !preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/', $_POST["email"])){
                    $errors["email"] = "emailen skal være en valid email";
                }
                
                
                if(isset($errors) && empty($errors)){
                    if ($db->query("UPDATE users SET username='{$_POST["username"]}', password='{$_POST["password"]}', email='{$_POST["email"]}' WHERE Id = $id")) {
                        $_SESSION["username"] = $_POST["username"];
                        if ($result = $db->query("SELECT * FROM users WHERE Username = '{$_SESSION["username"]}'")) {
                            if ($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                $password = $row["Password"];
                                $username = $row["Username"];
                                $fname = $row["Firstname"];
                                $lname = $row["Lastname"];
                                $address = $row["Address"];
                                $postcode = $row["Postcode"];
                                $country = $row["Country"];
                                $email = $row["Email"];
                                $website = $row["website"];
                            } else {
                                $errors[] = " ingen data fundet. ";
                            }
                        } else {
                            $errors[] = $db->error;
                        }
                    } else {
                        $errors[] = "kan ikke opdatere kontoen " . $db->error;
                    }
                }
            }
            
        }else {
            $errors[] = " ingen data fundet. ";
        }
    }
    else {
        $errors[] = $db->error;
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Min Konto</title>
</head>
<body class="<?php if(date("i") % 2 == 0) { ?>light<?php } else {?>dark<?php } ?>">
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">

        <header>
            <h1>Velkommen <?= $_SESSION["username"] ?></h1>
        </header>
        <main>
            <form action="" method="post">
                <?php 
                foreach($errors as $error) {
                    ?>
                    <p class="error"><?= $error ?></p>
                    <?php
                }
                ?>
                <div>
                    <label for="username">Brugernavn:</label>
                    <input type="text" name="username" value="<?php if(isset($username)){
                        echo $username;
                    } ?>">
                    <?php 
                        if(isset($errors["username"])) {
                            ?>
                            <p class="error"><?= $errors["username"] ?></p>
                            <?php
                        }
                    ?>
                    <label for="password">Adgangskode:</label>
                    <input type="password" name="password" value="<?php if(isset($password)){
                        echo $password;
                    } ?>">
                    <?php 
                        if(isset($errors["password"])) {
                            ?>
                            <p class="error"><?= $errors["password"] ?></p>
                            <?php
                        }
                    ?>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" value="<?php if(isset($email)){
                        echo $email;
                    } ?>">
                    <?php 
                        if(isset($errors["email"])) {
                            ?>
                            <p class="error"><?= $errors["email"] ?></p>
                            <?php
                        }
                    ?>
                </div>
                <button type="submit" name="update">Update</button>
            </form>
            <a href="./deleted.php">
                <button>
                    Slet konto
                </button>    
            </a>
        </main>

        <?php include "includes/footer.php"; ?>

    </div class="content">



</body>
</html>