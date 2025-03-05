<?php 
if(!defined('CONFIG_INCLUDED')) {
    define('CONFIG_INCLUDED', true);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn=mysqli_connect('localhost','root','','ludo-website');

function checkUserLogin() {
    if(!isset($_SESSION['uid'])) {
        header('Location: ../user/index.php');
        exit;
    }
    return $_SESSION['uid'];
}