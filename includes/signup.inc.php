<?php

//check if accessed by clicking submit button
if (isset($_POST['signup-submit'])) {

require 'dbh.inc.php';

//fetch information from form when users signs up

$username = $_POST['uid'];
$email = $_POST['mail'];
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];

//error handler to check if form element is emtpy

if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat))  {
    //error sends user back to signup page with some information they already entered
header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", username)) {
    header("Location: ../signup.php?error=invalidmailuid");
exit();
}

else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidemail&uid=".$username);
exit();
}
//search pattern for what we allow for our username
else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
exit();
}
else if($password !== $passwordRepeat){
    header("Location: ../signup.php?error=passwordcheck&mail=".$username."&mail=".$email);
    exit();
}
//do we have users with the same username
else {
$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../signup.php?error=sqlerror");
    exit();
}
else {
    //sending sql statement from user to database using a string datatype ("s") and passing the username as a parameter
   mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows();
    if ($resultCheck > 0) {
        header("Location: ../signup.php?error=usertaken&mail=".$email);
        exit();
    }
    else {
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
    }
    else {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        header("Location: ../signup.php?signup=success");
        exit();
    }
}

}
mysqli_stmt_close($stmt);
mysqli_close($conn);


}

else {
    header("Location: ../signup.php");
    exit();
}