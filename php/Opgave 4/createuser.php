<?php 
    if(!isset($_SESSION)) {
        session_start();
    }

    if(isset($_SESSION["login"]) == true) {
        header("Location: https://laur576w.aspitcloud.dk/v31/php/Opgave%204/index.php");
        exit();
    }

    include "includes/db-functions.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $errors = [];

        //established connection to database
        $db = getDb("laur576w_v3_1");

        //trim each post
        foreach($_POST as $index => $value) {
            $_POST[$index] = trim($value);
        }
        if($db->query("SELECT * FROM users WHERE Username = '{$_POST["newuser-username"]}'")) {
            $result = $db->query("SELECT * FROM users WHERE Username = '{$_POST["newuser-username"]}'");
            $row = $result->fetch_assoc();
            
            if(empty($row)) {
                //checking if username is set
                if(isset($_POST["newuser-username"]) && !empty($_POST["newuser-username"])&&
                (!isset($row) && empty($row))) {
                    echo "you pass";
                }
                else{
                    $errors["username"] =  "Brugernavnet må ikke være tomt.";
                }
            }
            else {
                $errors["username"] = "Brugernavnet er allerede brugt af en anden";
            }
            
            
        }
        else {
            $errors[] = $db->error;
        }

        //checking if firstname is set
        if(isset($_POST["newuser-firstname"]) && !empty($_POST["newuser-firstname"])) {
            echo "you pass1";
        }
        else {
            $errors["fname"] = "Udfyld fornavn";
        }
       
        //checking if lastname is set
        // if(isset($_POST["newuser-lastname"]) && !empty($_POST["newuser-lastname"])) {
    
        // }
        // else {
        //     $errors["lname"] = "Udfyld efternavn";
        // }

        //cheking phone nnumber 
        // if(isset($_POST["newuser-phone"]) && !empty($_POST["newuser-phone"])) {

        // }
        // else {
        //     $errors["phone"] = "Udfyld telefon nr.";
        // }

         //checking if passwords are the same and not empty
        if($_POST["newuser-password"] !== $_POST["newuser-passwordrepeat"] || !isset($_POST["newuser-password"]) || empty($_POST["newuser-password"])) {
            $errors["password"] =  "Adgangskoderne er ikke ens.";
            
        }

        // checking if the country is set and not empty
        if(isset($_POST["newuser-country"]) && !empty($_POST["newuser-country"])) {
            $_POST["newuser-country"] = trim($_POST["newuser-country"]);
            $_POST["newuser-postcode"] = trim($_POST["newuser-postcode"]);
            
            // if denmark rules apply 
            if(strtolower($_POST["newuser-country"]) == "denmark") {
                //checks if postcode is 4 in length
                if(strlen($_POST["newuser-postcode"]) !== 4) {
                    
                    $errors["postcode"] =  "Post nummeret skal være 4 i længden.";
                    
                }

                //checks if number is 8 in length
                if(strlen($_POST["newuser-phone"]) !== 8) {
                    $errors["phone"] = "Telefon nr. skal være 8 i længden.";
                }
            }

        }
        else {
            $errors["country"] = "Udfyld hvilket land.";
        }

        //checks email is valid
        if(
            !isset($_POST["newuser-email"]) || 
            empty($_POST["newuser-email"]) || 
            !preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/', $_POST["newuser-email"])
        ) {

            $errors["email"] = "Ikke valid email";
        }
        else {
        }
        

        // if no fail encountered 
        if(empty($errors)) {
            if(!isset($_SESSION)){
                session_start();
            }
            
            if($db->query("INSERT INTO users (Username, Password, Firstname, Lastname, Address, Country, Postcode, Email, Website) VALUES ('{$_POST["newuser-username"]}', '{$_POST["newuser-password"]}', '{$_POST["newuser-firstname"]}', '{$_POST["newuser-lastname"]}', '{$_POST["newuser-address"]}', '{$_POST["newuser-country"]}', {$_POST["newuser-postcode"]}, '{$_POST["newuser-email"]}', '{$_POST["newuser-website"]}');")) 
            {
                $_SESSION["fname"] = ucfirst(trim($_POST["newuser-firstname"]));
                $db->query("INSERT INTO users (Username, Password, Firstname, Lastname, Address, Country, Postcode, Email, Website) VALUES ('{$_POST["newuser-username"]}', '{$_POST["newuser-password"]}', '{$_POST["newuser-firstname"]}', '{$_POST["newuser-lastname"]}', '{$_POST["newuser-address"]}', '{$_POST["newuser-country"]}', {$_POST["newuser-postcode"]}, '{$_POST["newuser-email"]}', '{$_POST["newuser-website"]}');");
                header("Location: https://laur576w.aspitcloud.dk/v31/php/Opgave%204/login.php");
                exit();
            }
            
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
    <title>Newsletter</title>
</head>
<body class="<?php if(date("i") % 2 == 0) { ?>light<?php } else {?>dark<?php } ?>">

    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>

    <div class="content">
        <main>
        <h1>Opret bruger</h1>
        <form method="post">
            <p>
                <label for="newuser-username">Brugernavn: </label>
                <input type="text" name="newuser-username" placeholder="Brugernavn" class="logininput">
            </p>
            <?php 
                if(isset($errors["username"])) {
                    ?>
                    <p class="error"><?= $errors["username"] ?></p>
                    <?php
                } ?>

            <p>
                <label for="newuser-password">Adgangskode: </label>
                <input type="text" name="newuser-password" placeholder="Adgangskode" class="logininput">
            </p>

            <p>
                <label for="newuser-passwordrepeat">Gentag adgangskode: </label>
                <input type="text" name="newuser-passwordrepeat" placeholder="Gentag adgangskode" class="logininput">
            </p>
            <?php 
                if(isset($errors["password"])) {
                    ?>
                    <p class="error"><?= $errors["password"] ?></p>
                    <?php
                } 
            ?>


            <p>
                <label for="newuser-firstname">Fornavn: </label>
                <input type="text" name="newuser-firstname" placeholder="Fornavn" class="logininput">
            </p>
            <?php 
                if(isset($errors["fname"])) {
                    ?>
                    <p class="error"><?= $errors["fname"] ?></p>
                    <?php
                } 
            ?>

            <p>
                <label for="newuser-lastname">Efternavn: </label>
                <input type="text" name="newuser-lastname" placeholder="Efternavn" class="logininput">
            </p>
            <?php 
                if(isset($errors["lname"])) {
                    ?>
                    <p class="error"><?= $errors["lname"] ?></p>
                    <?php
                } 
            ?>

            <p>
                <label for="newuser-address">Adresse: </label>
                <input type="text" name="newuser-address" placeholder="Gade og nr." class="logininput">
            </p>
            
            <p>
                <label for="newuser-phone">Telefon nummer: </label>
                <input type="number" name="newuser-phone" placeholder="Telefon nr." class="logininput">
            </p>
            <?php 
                if(isset($errors["phone"])) {
                    ?>
                    <p class="error"><?= $errors["phone"] ?></p>
                    <?php
                } 
            ?>

            <p>
                <label for="newuser-postcode">Postnummer: </label>
                <input type="text" name="newuser-postcode" placeholder="Postnummer" class="logininput">
            </p>
            <?php 
                if(isset($errors["postcode"])) {
                    ?>
                    <p class="error"><?= $errors["postcode"] ?></p>
                    <?php
                } 
            ?>

            <p>
                <label for="newuser-city">By: </label>
                <input type="text" name="newuser-city" placeholder="By" class="logininput">
            </p>
            
            <p>
                <label for="newuser-country">Land: </label>
                <input type="text" name="newuser-country" placeholder="Land" class="logininput">
            </p>
            <?php 
                if(isset($errors["country"])) {
                    ?>
                    <p class="error"><?= $errors["country"] ?></p>
                    <?php
                } 
            ?>

            <p>
                <label for="newuser-email">E-mail: </label>
                <input type="text" name="newuser-email" placeholder="E-mail adresse" class="logininput">
            </p>
            <?php 
                if(isset($errors["email"])) {
                    ?>
                    <p class="error"><?= $errors["email"] ?></p>
                    <?php
                } 
            ?>
            
            <p>
                <label for="newuser-website">Website: </label>
                <input type="text" name="newuser-website" placeholder="Indtast URL på din hjemmeside" class="logininput">
            </p>
            
            <p>
                <input type="submit" name="newuser-submit" value="Opret" class="submitbtn">
            </p>
        </form>

        </main>

        <?php include "includes/footer.php"; ?>
    </div>
        
</body>
</html>