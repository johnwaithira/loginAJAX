<?php
session_start();
define('BASE', 'http://localhost/johnWaithira/learn/loginAJAX');

echo fun();

function fun(){
    if(!isset($_SESSION["loggedin"])){
        header('Location:' . BASE . '/login.html');
    }
}