<?php
    session_reset();
    include('condb.php');
    include ('checklogin.php');
    
    //ลูปจำนวนสินค้าที่เพิ่มมาในตะกร้า สามารถเเสดงค่าได้เฉพาะ Array type int เท่านั้น จึงต้องไปเพิ่ม Counter ที่ set ค่า A.I. ไว้ เเละนำมาใช้เก็บข้อมูลในตระกร้าเเทน ProductID
    $productIds = [];
    foreach($_SESSION['carts'] as $cartID => $cartQty) {
            //id=A001, Quantity = 1
            //id=A002, Quantity = 2

            $productIds[] = $cartID;
    }

    //วนลูปเพื่อเอาไปใช้กับ where เพราะข้อมูลเป็น Array
    $ids=0;
    if(count($productIds) > 0) {
        $ids = implode(',', $productIds);
    }
    //var_dump($ids);
    //IN ช่วยให้ระบุค่าได้หลายค่า เป็นตัวย่อสำหรับหลายเงื่อนไข
    $sql_1 = "SELECT * FROM tbl_product WHERE Counter IN ($ids)";
    $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
    $row_total= mysql_num_rows($qry_1);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <?php
        include('Mainmenubar.php');
    ?>
    <div class="w3-container" style="margin:15% 0 0 0;">
        <div class="w3-content" > 
            <div class="w3-row"> 
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">Picture</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">Name</div>
                <div class="w3-col w3-margin-top w3-center" style="width:30%;">Detail</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">Price</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">Qauntity</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">toatal</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">ไม่เอาเเล้ว</div>
            </div> 
            <form action="cart-update.php" id="register" class="w3-center" method="POST" name="Delete" style="width:100%;">
                <?php 
                while ($data_1 = mysql_fetch_array($qry_1)) { ?>
                        <div class="w3-row w3-border-bottom w3-border-black">
                            <div class="w3-col  w3-margin-top w3-margin-bottom w3-center" name="pic" style="width:10%;"><img src=" <?php echo $data_1['Productpic']; ?>"alt="" style="height:50px; width:50px;"></div>
                            <div class="w3-col  w3-margin-top w3-margin-bottom w3-center " name="ProductName"  style="width:10%;"><?php echo $data_1['ProductName']; ?></div>
                            <div class="w3-col  w3-margin-top w3-margin-bottom w3-center" name="DetailProduct" style="width:30%;"><?php echo $data_1['DetailProduct']; ?></div> 
                            <div class="w3-col  w3-margin-top w3-margin-bottom  w3-center" name="Price"  style="width:10%;"><?php echo $data_1['Price']; ?></div>
                           
                            <input type="number"min="1" max="5" name="product[<?php echo $data_1['Counter'];?>][quantity]" value="<?php echo $_SESSION['carts'][$data_1['Counter']]?>" class="from-control w3-col  w3-margin-top w3-margin-bottom  w3-center" style="width:10%;"> 
                            <div class="w3-col  w3-margin-top w3-margin-bottom  w3-center" name="Price"  style="width:10%;"><?php echo $data_1['Price'] * $_SESSION['carts'][$data_1['Counter']] ?></div>
                            <a onclick="confrim();" role="button" href="cart-delete.php?id=<?php echo $data_1['Counter'];?>" class="btn btn-danger w3-col  w3-center w3-margin" style="width:6%;"><span class="material-icons">remove_shopping_cart</span></a>
                        </div>
                    
                <?php } ?>
                <a href="checkout.php" class="btn btn-lg btn-primary w3-col w3-right w3-margin-right" style="margin:10px 0 0 0; width:15%;">check out</a>
                <button type="submit" class="btn btn-lg btn-success w3-col w3-right w3-margin-right" style="margin:10px 0 0 0; width:10%;">update</button>
                
            </form>

        </div>
    </div>
    <script>
        function confrim() {
            alert("Are you sure to delete");
        }
    </script>
</body>
</html>