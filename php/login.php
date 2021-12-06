<?php
require_once "./conn.php";
require_once "./functions.php";


if(!empty($_POST['email'])){
    $emai = esc($_POST['email']);

    $password = securePass(esc($_POST['password']));
    echo $password;
}