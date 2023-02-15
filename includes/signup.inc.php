<?php

//check if accessed by clicking submit button
if (isset($_POST['signup-submit'])){

require 'dbh.inc.php';

//fetch information from form when users signs up

$username = $_POST['uid'];
$email = $_POST['mail'];
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];

//error handler to check if form element is emtpy

if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    //error sends user back to signup page with some information they already entered
header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);

}



}