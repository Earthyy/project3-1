<?php
    include('condb.php');

    $AdminAcc = $_SESSION['AUser'];
    $strSQL = "SELECT tbl_Admin.* FROM tbl_Admin where AUser = '$AdminAcc' ";
    $objQuery = mysql_query($strSQL);
    $objResult = mysql_fetch_array($objQuery);

        if($_SESSION['AUser'] != $objResult['AUser'])
        {
            header('location:index.php');
        }else {echo "";}
    
?>