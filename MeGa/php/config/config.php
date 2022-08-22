<?php
$host="mysql:host=localhost;dbname=megachat";
$user_host="root";
$pass_host="";
try {
    $db = new PDO($host, $user_host, $pass_host);
    // echo "nadi";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>