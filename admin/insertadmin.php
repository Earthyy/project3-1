<?php

include('condb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["InsertStock"] == "Yes") {

$PID=$_POST['ProductID'];
$Pname=$_POST['ProductName'];
$cate=$_POST['Password'];
$branch=$_POST['realname'];

$sql3 = "INSERT INTO tbl_Admin (AID,AUser,APass,AName) 
        VALUES ('$PID','$Pname','$cate','$branch')";
$dbquery = mysql_db_query($database_surachet, $sql3)or die(mysql_error());

header("location:Homeadmin.php");
}
else{}  
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



    <style>

      fieldset {
        margin-top: 52px;
      }

      table {
        border-radius: 10px;

      }
    </style>
  </head>
  <body style="font-family: 'Itim', cursive; background-color:#FFF2D8;"><center>
  <?php
        include('menuadmin.php');
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name=""> 
        <!-- PHP_SELF หมายถึง ตัวไฟล์นี้ -->
        <fieldset style="margin:150px 0 0 -150px;">
            <legend style="margin:0 0 50px 0;color:#213555;">เพิ่มสินค้า</legend>
            <div class="w3-container">
                <div class="w3-content">
                <div class="w3-col s12 m12 l12"style="margin:60px 0 0 0;">
                    <div class="w3-col s6 m6 l6">
                            <p>AdminID:</p>
                        </div>
                        <div class="w3-left">
                            <input type="text" name="ProductID" size="10" maxlength="10" style="background-color:#EBE4D1;">
                        </div>
                    </div>
                    <div class="w3-col s12 m12 l12" ">
                        <div class="w3-col s6 m6 l6">
                            <p>User Name:</p>
                        </div>
                        <div class="w3-col s6 m6 l6">
                            <input type="text" name="ProductName" size="50" maxlength="50" style="background-color:#EBE4D1;">
                        </div>
                    </div>
                    
                    <div class="w3-col s12 m12 l12" ">
                        <div class="w3-col s6 m6 l6">
                            <p>Password</p>
                        </div>
                        <div class="w3-col s6 m6 l6">
                            <input type="password" name="Password" size="50" maxlength="50" style="background-color:#EBE4D1;">
                        </div>
                    </div>
                    <div class="w3-col s12 m12 l12" ">
                        <div class="w3-col s6 m6 l6">
                            <p>Name</p>
                        </div>
                        <div class="w3-col s6 m6 l6">
                            <input type="text" name="realname" size="50" maxlength="50" style="background-color:#EBE4D1;">
                        </div>
                    </div>
                    <div class="w3-col s12 m12 l12" style="margin-top:50px;">
                        <div class="">
                            <input type="hidden" name="InsertStock" value="Yes">
                            <input type="submit" name="submit" value ="Submit" style="background-color:#EAD7BB; border-radius:10px;" >
                            <input type="reset" name="reset" value="&nbsp;Reset&nbsp;" style="background-color:#EAD7BB; border-radius:10px;"></td>
                        </div>
                    </div>

                </div>
            </div>  
        </fieldset>
    </form>
  </center>

  </body>
</html>
