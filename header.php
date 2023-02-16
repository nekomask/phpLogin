<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<nav class="nav-header-main">
    <a class="header-logo" href="index.php">
        <img src="img/logo.png" alt="logo">
    </a>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
<div class="header-login">
    <?php
       if (isset($_SESSION['userId'])) {
        echo '<form action="includes/logout.inc.php" method="post">

        <button type="Submit" name="logout-submit">Logout</button>
        </form>';
    }else{
        echo '<form action="includes/login.inc.php" method="post">
        <input type="text" name="mailuid" value="Username/E-mail..">
        <input type="password" name="pwd" value="Password">
    <button type="Submit" name="login-submit">Login</button>
    </form>
    <a class="signup" href="signup.php">Signup</a>';

    }
    ?>


</div>
</nav>
</header>