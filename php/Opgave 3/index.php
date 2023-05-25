<?php 
    $string = "The quick brown fox jumped over the lazy dog";
    
    $email = "laur576w@aspit.dk";

    function passwordGen(
        int $length,
        string $keyspace = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz") {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    //not the best but it works
    function palindrom(string $word) {
        if (empty($word) == true) {
            throw new Exception("you must have text");
        }            
        if ($word == strrev($word)) {                 
            return "word '$word' is a palindrom ";
        }
        return "word '$word' is not a palindrom";
    }

    //------------
    // opgave 5 --
    //------------

    // opgave 5.2
    $students = ["nikolai","rasmus", "marius", "nikolaj", "jonas", "laurits"];
    $find = "rasmus";

    function myFindIndexInArray(
        $find, 
        $array) {
        //checks if what it should search is found
        if(!in_array($find, $array)){
            return "'" . ucfirst($find) . "' is not found in the array";
        }

        $result = "'" . ucfirst($find) . "' is found at index: ";
        foreach( $array as $index => $item ) {
            if (strtolower($item) == strtolower($find)) {
                $result .=  "$index ";
            }
        }
        return $result;
    }

    // opgave 5.3
    function findIndexInArray(
        $find, 
        $array) {
            //checks if what it should search is found
            if(!in_array($find, $array)){
                return "'" . ucfirst($find) . "' is not found in the array";
            }
            return "'" . ucfirst($find) . "' is found in index: " . array_search($find, $array, false) ;
    }

    //opgave 5.4
    $months = [
        "januar" => 31,
        "marts" => 31,
        "maj" => 31,
        "juli" => 31,
        "august" => 31,
        "oktober" => 31,
        "december" => 31,
        "februar" => 28,
        "april" => 30,
        "juni" => 30,
        "september" => 30,
        "november" => 30
    ];


    $i = 1;
    foreach($months as $month => $days) {
        switch(true) {
            case ($days <= 30):
                $smonth[$month] = $days;
                break;    
            case ($days >= 31):
                $lmonth[$month] = $days;
                break;
        }
    }

    // Opgave 5.5
    $laerere = array(
        array(
        "fornavn" => "Hanne",
        "efternavn" => "Lund",
        "fag" => "Visualisering"
        ),
        array(
        "fornavn" => "Jens",
        "efternavn" => "Clausen",
        "fag" => "Softwarekonstruktion"
        ),
        array(
        "fornavn" => "Ronni",
        "efternavn" => "Hansen",
        "fag" => "Teknik"
        ),
        array(
        "fornavn" => "Ulf",
        "efternavn" => "Skaaning",
        "fag" => "AspIT-Lab"
        )
    );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Opgave 3</title>
</head>
<body>
    <div class="container">

        <p><?= strtoupper($string); ?></p>
        <p><?= ucfirst($string); ?></p>
        <p><?= ucwords($string); ?></p>
        <p>Sentence contains: <?= str_contains($string, "fox") ?> fox</p>
        <p><?= strstr($email, "@", true); ?></p>
        <!-- <iframe src="password.php" frameborder="1"></iframe> -->
        <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="length">Length of password</label>
            <input type="number" name="length">
            <button type="submit">Generate</button>
            <?php if ($_POST["length"]) {?>
            <p>
                Password: <br>
                <code style="word-wrap: break-word;"><?= passwordGen($_POST["length"])?></code>
            </p>
            
            <?php }?> 
        </form>
        
        <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="word">Is the word a palindrom?</label>
            <input type="text" name="word">
            <button type="submit">Tjek</button>
            <?php if ($_POST["word"]) { ?>
            <p><?= palindrom($_POST["word"]) ?></p>
            <?php } ?>
        </form>
    
        <hr>
    
        <p>Does '<?= ucfirst($find) ?>' exist in the array. <?= myFindIndexInArray($find, $students) ?></p>
        <p>Does '<?= ucfirst($find) ?>' exist in the array. <?= findIndexInArray($find, $students) ?></p>
    
        <hr>
        <div class="cols-2">
            <div class="col">  
                <h3>Short months</h3>
                <pre ><?php 
                        foreach($smonth as $month => $day) {
                            echo "$month: $days days <br>";
                        } 
                    ?></pre>
            </div>
                
            <div class="col">
                <h3>Long months</h2>
                <pre><?php foreach($lmonth as $month => $day) {
                            echo "$month: $days days <br>";
                        } 
                ?></pre>
            </div>
        </div>  
        <hr>
        <pre><?php print_r($laerere) ?></pre>  
        <pre><?php 
            foreach($laerere as $person) {
                foreach($person as $index => $val){
                    echo ucfirst($index) . ": $val <br>";
                }
                echo "<br>";
            }
        ?></pre>
    </div>

</body>
</html>