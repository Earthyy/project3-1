<?php
session_start();
include 'condb.php';
include 'checklogin.php';

if(!empty($_GET['id'])){
    unset($_SESSION['carts'][$_GET['id']]);
    
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>