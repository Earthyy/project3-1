<?php
    session_start();

    include('condb.php');

    $Username=$_SESSION['UserName'];

    $strSQLlog = "SELECT User.* FROM User where UserName = '$Username' ";
    $objQuerylog = mysql_query($strSQLlog);
    $objResultlog = mysql_fetch_array($objQuerylog);
        
    // && $_SESSION['Password'] != $objResultlog['Password']
    if($_SESSION['UserName'] != $objResultlog['UserName'])
    {
        header('location:index.php');   
    }else{echo "";}


        
?>