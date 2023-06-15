<?php 
    if(!isset($_SESSION)) {
        session_start();
    }
    if(!isset($_SESSION["login"]) == true) {
        header("Location: https://laur576w.aspitcloud.dk/v31/php/Opgave%204/index.php");
        exit();
    }

    include "./includes/db-functions.php";
    $db = getDb("laur576w_v3_1");

    //PName PStars PDesc Pstiff PSupp PPrice (PPic Pstocl can be null)
    if(isset($_POST["createProductSubmit"])) {
        $errors = [];
        foreach($_POST as $index => $value) {
            $_POST[$index] = trim($value);
        }
        for($i = 0; $i <= 3; $i++) {
            if(!isset($_FILES["productPic"]["name"][$i]) || empty($_FILES["productPic"]["name"][$i])){
                $_FILES["productPic"]["name"][$i] = "";
                
            }else {
                $_FILES["productPic"]["name"][$i] = str_replace(" ", "-", $_FILES["productPic"]["name"][$i]);
            }
            
        }        
        if(isset($_POST["productName"]) && !empty($_POST["productName"])) {

        } else {
            $errors["name"] = "Udfyld navnet";
        }
        if(isset($_POST["productStars"]) && !empty($_POST["productStars"])) {

        } else {
            $errors["stars"] = "Vælg hvor mange stjerner";
        }
        if(isset($_POST["productDesc"]) && !empty($_POST["productDesc"])) {

        } else {
            $errors["desc"] = "Beskriv produktet";
        }
        if(isset($_POST["productStiff"]) && !empty($_POST["productStiff"])) {

        } else {
            $errors["stiff"] = "Hvad er dens stivhed?";
        }
        if(isset($_POST["productSupports"]) && !empty($_POST["productSupports"])) {
            
        } else {
            $errors["sup"] = "Hvad understøtter den?";
        }
        if(isset($_POST["productPrice"]) && !empty($_POST["productPrice"]) && !str_contains($_Post["productPrice"], "-")) {

        } else {
            $errors["price"] = "udfyld pris";
        }

        if(empty($errors) && isset($errors)) {
                //PName PStars PDesc Pstiff PSupp PPrice (PPic Pstocl can be null)
                $pics = implode($_FILES["productPic"]["name"]);
                if ($statement = $db->prepare(
                    "INSERT INTO products (PName, PStars, PDesc, PStiff, PSupp, PPrice, PPic, PStock)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
                )) {
                    
                    $statement->bind_param(
                        "sisisisi", 
                        $_POST["productName"], 
                        $_POST["productStars"],
                        $_POST["productDesc"], 
                        $_POST["productStiff"], 
                        $_POST["productSupports"],
                        $_POST["productPrice"], 
                        $pics, 
                        $_POST["productStock"]
                    );
                
                    if ($statement->execute()) {
                        for ($i = 0; $i <= count($_FILES["productPic"]["name"]) -1 ; $i++) {
                            $tempImg = $_FILES["productPic"]["tmp_name"][$i];
                            $fileName = basename($_FILES["productPic"]["name"][$i]);
                            $imageFullPath = "./img//" . $fileName;
                            if(!move_uploaded_file($tempImg, $imageFullPath)){
                                $errors[] = "filen kunne ikke blive overført:" . $fileName; 
                            }
                        }
                    } else {
                        $statement->error;
                    }
                
                    $statement->close();
                } else {
                    $errors[] = "Fejl ved at forberede SQL'en" . $statement->error;
                }
        }
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Edea skates</title>
</head>
<body class="light">
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    
    <div class="content">
    <main>
        <section>
            <h1>Opret produkt</h1>

            <article>
                <?php 
                    foreach($errors as $error) {
                        ?>
                        <p class="error"><?= $error ?></p>
                        <?php
                    }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <p>
                        <label for="productName">Produktnavn: </label>
                        <input type="text" name="productName" required>
                    </p>
                    <p>
                        <label for="productStars">Antal stjerner:</label>
                        <select name="productStars" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </p>
                    <p>
                        <label for="productDesc">Produktbeskrivelse: </label>
                        <textarea name="productDesc" style="width:60%;" required>
                        </textarea>
                    </p>
                    <p>
                        <label for="productStiff">Stivhed:</label>
                        <select name="productStiff" required>
                            <option value="48">48</option>
                            <option value="70">70</option>
                            <option value="85">85</option>
                            <option value="90">90</option>
                            <option value="95">95</option>
                        </select>
                    </p>
                    <p>
                        <label for="productSupports">Understøtter spring: </label>
                        <select name="productSupports" multiple size=6 class="multiselect" required>
                            <option value="Enkeltspring">Enkeltspring</option>
                            <option value="Axel">Axel</option>
                            <option value="Dobbeltspring">Dobbeltspring</option>
                            <option value="Triplespring">Triplespring</option>
                            <option value="Quadspring">Quadspring</option>
                            <option value="Alle danseniveauer">Alle danseniveauer</option>
                        </select>
                    </p>
                    <p>
                        <label for="productPrice">Pris: </label>
                        <input type="number" name="productPrice" required> kr.
                    </p>
                    <p>
                        <label for="productPic">Produktbillede(r)(Tager kun 4): </label>
                        <input type="file" name="productPic[]" multiple>
                    </p>
                    <p>
                        <label for="productStock">På lager:</label>
                        <input type="number" name="productStock">
                    </p>
                    

                    <input type="submit" value="Opret produkt" name="createProductSubmit" class="submitbtn">
                </form>

            </article>

        </section>
    </main>

    <?php include "includes/footer.php"; ?>
</body>
</html>