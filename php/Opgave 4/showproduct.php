<?php 
    if(!isset($_SESSION)) {
        session_start();
    }
    include "./includes/db-functions.php";
    $db = getDb("laur576w_v3_1");

    if(isset($_GET["PID"])) {
        if($statement = $db->prepare("SELECT * FROM products where PID = ?")){
            $statement->bind_param("i", $_GET["PID"]);
            if($statement->execute()){
                $result = $statement->get_result();
                if($row = $result->fetch_assoc()){
                    $product = $row;
                    $productImgs = explode(" ", $product["PPic"]);
                    if(empty($productImgs[0]) || $productImgs[0] == NULL) {
                        $productImgs[0] = "imagecomingsoon.png";
                    }
                }
                else{
                    $errors[] = "ingen data fundet";
                }
            } else {
                $errors[] = $statement->error;
            }
            $statement->close();
        } else {
            $errors[] = $db->error;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Vis produkt</title>
</head>
<body class="<?php if(date("i") % 2 == 0) { ?>light<?php } else {?>dark<?php } ?>">
    
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
        
    ?>
    
    <div class="content">

        <main>
            <?php 
            if(isset($_GET["PID"])) {
                ?>
                <h1><?= $product["PName"] ?></h1>
                <div class="showProduct">
                    <section class="leftColumn">
                        <div>
                            <div>
                                <img src="./img/<?= $productImgs[0] ?>" alt="<?= $product["PName"] ?> skates">
                            </div>
                            <div>
                                <?php 
                                    for($i = 1; $i <= count($productImgs) - 1;$i++){
                                        ?>
                                        <img src="./img/<?= $productImgs[$i] ?>" alt="<?= $product["PName"] ?> skates">
                                        <?php
                                    } 
                                ?>
                            </div>
                        </div>
                        <h2>Beskrivelse:</h2>
                        <p><?= $product["PDesc"] ?></p>
                    </section>
                
                    <section class="rightColumn">
                        <a href="#">Køb nu!</a>
                        <p><span>Antal stjerner: </span><?= $product["PStars"] ?></p>
                        <p><span>Støvle stivhed: </span><?= $product["PStiff"] ?></p>
                        <p><span>Understøtter: </span><?= $product["PSupp"] ?></p>
                        <p><span>Pris: </span><?= $product["PPrice"] ?></p>
                        <p><span>På lager: </span><?php if($product["PStock"] < 0) {
                            echo "Ja";
                        } else {
                            echo "Nej";
                        } ?></p>
                    </section>
                </div>
                <?php
            }
            else {
                ?>
                <h1>Edea Overture</h1>
                <div class="showProduct">
                    <section class="leftColumn">
                        <div><div><img src="img/overture-edea-skates.jpg" alt="Overture Edea skates"></div>
                        <div><img src="img/overture-black-edea-skates.jpg" alt="Overture Edea skates"><img src="img/overture-lingua-edea-skates.jpg" alt="Overture Edea skates"></div></div>
                        <h2>Beskrivelse:</h2>
                        <p>Overture er en kombination af let design og Edea teknologi. Det er den mest solgte Edea støvle. Støvlen har stor støtte og fleksibilitet for kunstskøjteløbere, der arbejder på deres grundløb, enkeltspring og axel.</p>
                        <p>Overture er baseret på vores teknologisk viden om kunstskøjteløb på højt niveau og er baseret på vores passion for kunstskøjteløb.</p>
                        <p>Edea Overture er 100% håndlavet italiensk design. Støvlen er letvægtsdesign, som sikrer god responsivitet. Den giver en god fornemmelse for isen, som gør det lettere at udvikle det grundlæggende skøjteløb.</p>
                    </section>

                    <section class="rightColumn">
                        <a href="#">Køb nu!</a>
                        <p><span>Antal stjerner: </span>3</p>
                        <p><span>Støvle stivhed: </span>48</p>
                        <p><span>Understøtter: </span>enkeltspring Axel</p>
                        <p><span>Pris: </span>1175,-</p>
                        <p><span>På lager: </span>Ja</p>
                    </section>
                </div>
                <?php
            }
            ?>
        </main>
    
        <?php include "includes/footer.php"; ?>
    </div>
</body>
</html>