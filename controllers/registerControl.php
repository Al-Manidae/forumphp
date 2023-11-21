<?php

require_once "../includes/connectBd.php";

$con = connectdb();

if (!isset($_POST['surname']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
    exit('Please complete the registration form!');
}

?>