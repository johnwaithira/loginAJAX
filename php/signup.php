<?php
require_once "./conn.php";
require_once "./functions.php";

$username =esc($_POST['username']);
$email = esc($_POST['email']);
$password =securePass(esc($_POST['password']));
echo checkEmpty($username,$email,$password);

