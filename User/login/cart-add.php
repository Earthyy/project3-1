<?php
session_start();
include 'condb.php';
include 'checklogin.php';

if(!empty($_GET['id'])){
    if(empty($_SESSION['carts'][$_GET['id']])) {
        $_SESSION['carts'][$_GET['id']] = 1;

    } else {
        $_SESSION['carts'][$_GET['id']] += 1;
    }
    echo $_SESSION['message'] = 'Crat add success';
    
    
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>