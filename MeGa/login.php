<?php 
session_start();
    if(isset($_SESSION['unique_id'])){
    header("location: view.php");
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
</head>
<body>
<div class="wrapper">
    <section class="form login">
        <header>MegaChat <i class="fa-solid fa-badge-check"></i></header>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
            <label>Email Address</label>
            <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
            <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
            <input type="submit" name="submit" value="Continue to MegaChat">
        </div>
        </form>
        <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
</div>
    
<script src="javascript/login.js"></script>

</body>
</html>
