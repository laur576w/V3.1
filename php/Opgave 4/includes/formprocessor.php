<?php 
    $errors = [];
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_POST["submit-newsletter"])){
            
            if(isset($_POST["newsletter-firstname"]) && !empty($_POST["newsletter-firstname"])) {
                $fname = $_POST["newsletter-firstname"];
            }
            else {
                $errors[] = "Venligst fyld ud dit fornavn";
            }

            if(isset($_POST["newsletter-email"]) && !empty($_POST["newsletter-email"])) {
                $email = $_POST["newsletter-email"];
            }
            else {
                $errors[] = "Venligst fyld ud din email";
            }
            if(!empty($errors)){
                foreach($errors as $error) { ?>
                    <p><?= $error ?></p>
                <?php }
            }
        }
    }
?>