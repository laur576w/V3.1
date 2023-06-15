<?php 
function getDb($dbname){
    $db = new MySQLi("localhost:3306", "laur576w", "M3~Z4-lf[M7^92F", $dbname);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        $db->set_charset('utf8mb4');
        return $db;
    }
}
?>