<nav class="side">
    <a href="index.php"><img src="img/edea-skates-logo.png" alt="Edea logo"></a>
    <ul>
        <li><a href="index.php">Forside</a></li>
        <li><a href="shop.php">Shop</a></li>
        <?php if(!empty(!isset($_SESSION["username"]))) { ?>
            <li><a href="createuser.php">Opret bruger</a></li>
            <li><a href="login.php">Log på</a></li>
        <?php } 
        else { 
        ?> 
            <li><a href="#">Min Konto</a></li>
            <li><a href="logout.php">Log ud</a></li>
        <?php } ?>        
    </ul>
</nav>