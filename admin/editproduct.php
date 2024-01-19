<?php
include('condb.php');
include 'checkAdmin.php';

$ID=$_GET['Id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["EditStock"] == "Yes") {

  $id=$_POST['ProductID'];
  $cate=$_POST['Category'];
  $bra=$_POST['Branch'];
  $name=$_POST['ProductName'];
  $cost=$_POST['cost'];
  $price=$_POST['Price'];
  $quan=$_POST['Quantity'];
  $de=$_POST['Detail'];

  $sql3 = " UPDATE tbl_product
        SET  ProductID='$id',ProductName='$name',CategoryID='$cate',BranchID='$bra',Cost='$cost',Price='$price',Quantity='$quan',DetailProduct='$de'
        WHERE ProductID='$id'";
  $dbquery = mysql_db_query($database_surachet, $sql3)or die(mysql_error());

header('Location:product.php'); //เมื่อกด submit ส่งงข้อมูลเสร็จจะยังอยู่หน้าเดิม
// ส่วนหัว ("ตำแหน่ง: Lab7menu.php"); คำสั่งใน PHP ใช้ในการเปลี่ยนเส้นทางฝั่งเซิร์ฟเวอร์ไปยังหน้าเว็บอื่น เมื่อเรียกใช้โค้ดบรรทัดนี้ จะสั่งให้เว็บเซิร์ฟเวอร์ส่งส่วนหัวการตอบกลับ HTTP ที่บอกให้เบราว์เซอร์เปลี่ยนเส้นทางไปยัง URL ที่ระบุ ในกรณีนี้คือ "Lab7menu.php"
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="insertpd.css">

    <style>

      fieldset {
        margin-top: 30px;
      }

      table {
        border-radius: 10px;
        bgcolor="#BCA37F"

      }
    </style>

  </head>
  <body style="font-family: 'Itim', cursive; background-color:#f4dc99;"><center>
    <?php
        include('menuadmin.php');
        $sql_2="SELECT  tbl_product.* FROM tbl_product WHERE tbl_product.ProductID='$ID'
            ORDER BY ProductID ASC";
            
        $qry_2 = mysql_query($sql_2,$surachet) or die(mysql_error());
        $data_2 = mysql_fetch_array($qry_2);
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name="" style="color:#6D67E4;"> 
        <!-- PHP_SELF หมายถึง ตัวไฟล์นี้ -->
        <fieldset style="margin:50px 0 0 -50px;">
            <legend style="margin:0 0 50px 0;color:#6D67E4;"><h1>เพิ่มสินค้า</h1></legend>
            <hr width="100%" color="#EF9595">
            <div class="w3-container">
                <div class="w3-content">
                    <div class="w3-col s12 m12 l12"style="margin:60px 0 0 0;">
                        <div class="w3-col s6 m6 l6">
                                <p>ProductID:</p>
                            </div>
                            <div class="w3-left">
                                <input type="text" name="ProductID" size="10" maxlength="10" style="background-color:#EBE4D1;" placeholder=" ใส่ ProductID" value="<?php echo $data_2['ProductID']?>">
                            </div>

                        </div>

                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>Category:</p>
                            </div>
                            <div class="">
                                <select class="w3-border" name="Category" style="width:50%;height:32px; background-color:#EBE4D1;">
                                    <option value="">เลือกหมวดหมู่</option>
                                    <?php
                                    $sql_1="SELECT tbl_category.* FROM tbl_category";
                                    $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
                                    $data_1 = mysql_fetch_array($qry_1);

                                    do {  ?>
                                    <option value="<?php echo $data_1['CategoryID']?>" <?php if (!(strcmp($data_2['CategoryID'], $data_1['CategoryID']))) {echo "selected=\"selected\"";} ?> > <?php echo $data_1['CategoryName']?> </option>

                                    <?php
                                    } while ($data_1 = mysql_fetch_assoc($qry_1));
                                    $rows = mysql_num_rows($qry_1);
                                    if($rows > 0) {
                                    mysql_data_seek($qry_1, 0);
                                    $data_1 = mysql_fetch_assoc($qry_1);
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>Branch:</p>
                            </div>
                            <div class="">
                                <select class="w3-border" name="Branch" style="width:50%;height:32px; background-color:#EBE4D1;">
                                    <option value="">เลือกยี่ห้อ</option>
                                    <?php
                                    $sql_1="SELECT tbl_branch.* FROM tbl_branch";
                                    $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
                                    $data_1 = mysql_fetch_array($qry_1);

                                    do {  ?>
                                    <option value="<?php echo $data_1['BranchID']?>" <?php if (!(strcmp($data_2['BranchID'], $data_1['BranchID']))) {echo "selected=\"selected\"";} ?> > <?php echo $data_1['BranchName']?> </option>

                                    <?php
                                    } while ($data_1 = mysql_fetch_assoc($qry_1));
                                    $rows = mysql_num_rows($qry_1);
                                    if($rows > 0) {
                                    mysql_data_seek($qry_1, 0);
                                    $data_1 = mysql_fetch_assoc($qry_1);
                                    } ?>
                                </select>
                            </div>
                        </div>

                        
                        
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>ProductName:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">
                                <input type="text" name="ProductName" size="50" maxlength="50" style="background-color:#EBE4D1;" placeholder=" ใส่ ProductName" value="<?php echo $data_2['ProductName']?>">
                            </div>
                        </div>
                        
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>Cost:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">
                                <input type="text" name="cost" size="50" maxlength="50" style="background-color:#EBE4D1;" placeholder=" ใส่ Cost" value="<?php echo $data_2['Cost']?>">
                            </div>
                        </div>
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>Price:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">
                                <input type="text" name="Price" size="50" maxlength="50" style="background-color:#EBE4D1;" placeholder=" ใส่ Price" value="<?php echo $data_2['Price']?>">
                            </div>
                        </div>
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>Quantity:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">
                                <input type="text" name="Quantity" size="50" maxlength="50" style="background-color:#EBE4D1;" placeholder=" ใส่ Quantity" value="<?php echo $data_2['Quantity']?>">
                            </div>
                        </div>
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6 w3-margin-top">
                                <p>Detail Product:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">
                                <textarea name="Detail" class="w3-left" id="" cols="30" rows="10" style="background-color:#EBE4D1;" placeholder="กรอก Detail Product" value=""><?php echo $data_2['DetailProduct']?></textarea>
                            </div>
                        </div>
                        <div class="w3-col s12 m12 l12" style="margin-top:50px;">
                            <div class="">
                            <hr width="100%" color="#EF9595">
                                <input type="hidden" name="EditStock" value="Yes">
                                <input type="submit" name="submit" value ="   Submit   " style="background-color:#EF9595; color:#6D67E4; border-radius:10px;" >
                                <input type="reset" name="reset" value="&nbsp;   Reset   &nbsp;" style="background-color:#EF9595; color:#6D67E4; border-radius:10px;"></td>
                            </div>
                        </div>
                        <div stlye="width:100%;margin-top:50px"><a href="product.php"  class="w3-button w3-margin-top w3-black w3-round-xlarge">กลับไปหน้าก่อน</a></div>
                    </div>
            </div>  
        </fieldset>
    </form>
  </center>

  </body>
</html>
