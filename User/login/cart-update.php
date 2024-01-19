<?php
    include 'condb.php';
    session_start();
    foreach ($_SESSION['carts'] as $productid => $productqty) {
        $_SESSION['carts'][$productid]=$_POST['product'][$productid]['quantity'];
    }
    header('location:cart.php');
?>