<?php
include('condb.php');
include 'checkAdmin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["InsertStock"] == "Yes") {

    $PID=$_POST['ProductID'];
    $Pname=$_POST['ProductName'];
    $cate=$_POST['Category'];
    $branch=$_POST['Branch'];
    $file=$_POST['file'];
    $cost=$_POST['cost'];
    $price=$_POST['Price'];
    $quantity=$_POST['Quantity'];
    $detail=$_POST['Detail'];

    $locate_img ="picpro/";

    if(empty($PID)){
        $IDErr = "ProductID is empty";
    }

    // Insert File

    $filenames = $_FILES["file"]["name"];

    $allowedExts = array("doc", "docx", "pdf", "gif", "jpeg", "jpg", "png","xls","xlsx");
    $extension = end(explode(".", $_FILES["file"]["name"]));
    if (($_FILES["file"]["type"] == "application/pdf")
        || ($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "application/msword")
        || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "application/vnd.ms-excel")
        || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
        && in_array($extension, $allowedExts))
        {
            if ($_FILES["file"]["error"] > 0)
            {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            }
            else
            {

            if (file_exists($locate_img . $_FILES["file"]["name"]))

            {
            echo $_FILES["file"]["name"] . " already exists. ";
            }

            else
            {
            move_uploaded_file($_FILES["file"]["tmp_name"],$locate_img.$_FILES["file"]["name"]);


            echo "Stored in: " . $locate_img . $_FILES["file"]["name"];
            }

            }
        }
        if (empty($filenames))
        {
            $imgErr = "img is empty";
        }

        if(!empty($PID)) {
            $sql3 = "INSERT INTO tbl_product (ProductID,ProductName,CategoryID,BranchID,Productpic,Cost,Price,Quantity,DetailProduct) 
            VALUES ('$PID','$Pname','$cate','$branch','$file','$cost','$price','$quantity','$detail')";
            $dbquery = mysql_db_query($database_surachet, $sql3)or die(mysql_error());

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }    
}
 ?>
 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  
    <meta charset="utf-8">
    <title>เพิ่มสินค้า</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="insertp.css">
    
    
    <style>

      fieldset {
        margin-top: 52px;
      }

      table {
        border-radius: 10px;
      }

    </style>
  </head>
  <body style="font-family: 'Itim', cursive;"><center>
    <?php
        include('menuadmin.php');
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name="" style="color: #f0d68e;" > 
        <!-- PHP_SELF หมายถึง ตัวไฟล์นี้ -->
        
        <fieldset style="margin:50px 0 0 -50px;">
            <legend style="margin:0 0 50px 0;"><h1>เพิ่มสินค้า</h1></legend>
            <hr width="100%" color="#D67BFF">
            <div class="w3-container">
                <div class="w3-content">
                    <div class="w3-col s12 m12 l12"style="margin:60px 0 0 0;">
                        <div class="w3-col s6 m6 l6">
                                <p>ProductID:</p>
                            </div>
                            <div class="w3-left"> 
                                <input type="text" name="ProductID" size="10" maxlength="10" placeholder=" กรอก รหัสสินค้า">
                            </div>
                        </div>

                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>Category:</p>
                            </div>
                            <div class="">
                                <select class="w3-border" name="Category" style="width:50%;height:32px; background-color:#F1F6F9;">
                                    <option value=""> เลือกหมวดหมู่</option>
                                    <?php
                                    $sql_1="SELECT tbl_category.* FROM tbl_category";
                                    $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
                                    $data_1 = mysql_fetch_array($qry_1);

                                    do {  ?>
                                    <option value="<?php echo $data_1['CategoryID']?>" style="background-color:#F1F6F9;"><?php echo $data_1['CategoryName']?></option>

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
                                <select class="w3-border" name="Branch" style="width:50%;height:32px; background-color:#F1F6F9;">
                                    <option value="">เลือกยี่ห้อ</option>
                                    <?php
                                    $sql_1="SELECT tbl_branch.* FROM tbl_branch";
                                    $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
                                    $data_1 = mysql_fetch_array($qry_1);

                                    do {  ?>
                                    <option value="<?php echo $data_1['BranchID']?>"><?php echo $data_1['BranchName']?></option>

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
                                <p>รูปภาพ:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">
                                <td align="left"><input class="w3-input" type="file" name="file" id="file" style="background-color:#F1F6F9;"></td>
                            </div>
                        </div>
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>ProductName:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">  
                                <input type="text" name="ProductName" size="50" maxlength="50" style="background-color:#F1F6F9;" placeholder=" กรอก ชื่อสินค้า">
                            </div>
                        </div>
                        
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>Cost:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">
                                <input type="text" name="cost" size="50" maxlength="50" style="background-color:#F1F6F9;" placeholder=" กรอก ต้นทุน"> 
                            </div>
                        </div>
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>Price:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">
                                <input type="text" name="Price" size="50" maxlength="50" style="background-color:#F1F6F9;" placeholder=" กรอก ราคาขาย">
                            </div>
                        </div>
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6">
                                <p>Quantity:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">
                                <input type="text" name="Quantity" size="50" maxlength="50" style="background-color:#F1F6F9;" placeholder=" กรอก จำนวน">
                            </div>
                        </div>
                        <div class="w3-col s12 m12 l12" ">
                            <div class="w3-col s6 m6 l6 w3-margin-top">
                                <p>Detail Product:</p>
                            </div>
                            <div class="w3-col s6 m6 l6">
                                <textarea name="Detail" class="w3-left" id="" cols="30" rows="10" style="background-color:#F1F6F9;" placeholder=" กรอก Detail Product"></textarea>
                            </div>
                        </div>
                        
                        <div class="w3-col s12 m12 l12" style="margin-top:50px;">
                            <div class="">
                            <hr width="100%" color="#D67BFF">
                                <input type="hidden" name="InsertStock" value="Yes">
                                <input type="submit" name="submit" value ="   Submit   " style="background-color:#6D67E4; color:#00FFCA; border-radius:10px;" >  
                                <input type="reset" name="reset" value="&nbsp;   Reset   &nbsp;" style="background-color:#6D67E4; color:#00FFCA; border-radius:10px;"></td>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
              
        </fieldset>
        
    </form>
  </center>

  </body>
</html>
