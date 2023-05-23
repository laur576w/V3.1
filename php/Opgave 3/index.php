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
        $wordRev = strrev($word); 
          
        if ($word == $wordRev) {                 
            return "word '$word' is a palindrom ";
        }
        return "word '$word' is not a palindrom";
    }
    
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
</body>
</html>