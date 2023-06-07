
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Edea skates</title>
</head>
<body class="<?php if(date("i") % 2 == 0) { ?>light<?php } else {?>dark<?php } ?>">
    <?php 
        include "includes/topmenu.php";

        include "includes/sidemenu.php";
    ?>
    <div class="content">
    <?php 
    $errors = [];
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_POST["submit-newsletter"])){
            //check if fname set
            if(isset($_POST["newsletter-firstname"]) && !empty($_POST["newsletter-firstname"])) {
                $fname = $_POST["newsletter-firstname"];
            }
            else {
                $errors[] = "Venligst fyld ud dit fornavn";
            }

            //check if email set
            if(isset($_POST["newsletter-email"]) && !empty($_POST["newsletter-email"]) && preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/', $_POST["newsletter-email"])) {
                $email = $_POST["newsletter-email"];
            }
            else {
                $errors[] = "Venligst fyld ud din email f.eks: navn@domæne.com";
            }

            //checks if no errors
            if(!empty($errors)){
                foreach($errors as $error) { ?>
                    <p><?= $error ?></p>
                    <form action="newsletter-landing.php" method="post">
                        <p>
                            <label for="firstname">Fornavn: </label>
                            <input type="text" name="newsletter-firstname" placeholder="Fornavn">
                        </p>

                        <p>
                            <label for="newsletter-email">Email adresse: </label>
                            <input type="text" name="newsletter-email" placeholder="Email adresse">
                        </p>

                        <p>
                            <input type="submit" name="submit-newsletter" value="Tilmeld" class="submitbtn">
                        </p>
                    </form>
                <?php }
            }
            else { ?>
                <p>Kære <?= $fname ?>. Du er nu tilmeldt vores nyhedsbrev. Vi glæder os til hver måned at bringe dig spændende nyheder fra kunstskøjteløbets verden. Husk, at du altid kan afmelde dig nyhedsbrevet igen ved at følge linket i bunden af nyhedsbrevet. Med venlig hilsen dit Edea team</p>
            <?php }
        }
    }
?>

    <?php include "includes/footer.php"; ?>
    </div>

</body>
</html>