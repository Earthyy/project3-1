<?php
    session_start();
    include 'condb.php';

    foreach ($_SESSION['carts'] as $productid => $productqty){
        if(!empty($productqty)){
            $ID=$_POST['UID'];
            $quantity=$_POST['product'][$productid]['quantity'];
            $tel=$_POST['Tel'];
            $add=$_POST['address'];
            $PID = $_POST['product'][$productid]['ProductID'];
            $PName = $_POST['product'][$productid]['ProductName'];
            $price = $_POST['product'][$productid]['Price'];
            $totalprice= $price * $quantity;

            $sql3 = "INSERT INTO tbl_order (OrderID,User_id,ProductID,ProductName,Quantity,Price,Total_price,Tel,Address) 
            VALUES (Default,'$ID','$PID','$PName','$quantity','$price','$totalprice','$tel','$add')";
            $dbquery = mysql_db_query($database_surachet, $sql3)or die(mysql_error());

            
            
            $sql_1 = "SELECT tbl_product.* FROM tbl_product Where ProductID='$PID';";
            $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
            $data_1 = mysql_fetch_array($qry_1);

            $old=$data_1['Quantity'];
            $new_quantity = $old - $quantity;
            
            $sql2 = " UPDATE tbl_product
            SET  Quantity='$new_quantity'
            WHERE ProductID='$PID'";
            $dbquery = mysql_db_query($database_surachet, $sql2)or die(mysql_error());

            unset($_SESSION['carts']);
        }
    }   
    header('location:ITshop.php'); 
    // 
    
?>