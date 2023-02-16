<?php

//check if accessed by clicking submit button
if (isset($_POST['login-submit'])) {

}
else {
    header("Location: ../index.php");
    exit();
}