<?php
include('condb.php');
include 'checkAdmin.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["DeleteUser"] == "Yes") {

    $id=$_POST['UID'];
    $sql = "DELETE FROM User WHERE User_id='$id'";
    $dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());

}
else{}  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="font-family: 'Itim', cursive; background-color:#132043;" class="">
        
        <?php
        include('menuadmin.php');
        ?>

    <div class="" style="margin:50px; 0 50px 0 ">
        <div class="" style=""> 
            <div class="w3-row w3-pale-yellow"> 
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">User ID</div>
                <div class="w3-col w3-margin-top w3-center" style="width:5%;">Prefix</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">Name</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">SurName</div>
                <div class="w3-col w3-margin-top w3-center" style="width:20%;">User Name</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">Password</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">Tel</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;">Address</div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;"><p>ลบข้อมูล</p></div> 
        </div> 
        <?php 
            $sql_1 = "SELECT User.* FROM User";
            $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
            $row_total= mysql_num_rows($qry_1); //จำนวนนักศึกษา ทั้งสิ้น <?php echo $row_total;

            while ($data_1 = mysql_fetch_array($qry_1)) { ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="w3-center" method="POST" name="Delete" style="width:100%;">
            <div class="w3-row w3-border-bottom w3-border-black" style="background-color:#E08E7D;">
                <div class="w3-col  w3-margin-top  w3-center" style="width:10%;"><?php echo $data_1['User_id']; ?></div>
                <div class="w3-col  w3-margin-top  w3-center " style="width:5%;"><?php echo $data_1['Prefix']; ?></div>
                <div class="w3-col  w3-margin-top  w3-center" style="width:10%;"><?php echo $data_1['Name']; ?></div> 
                <div class="w3-col  w3-margin-top  w3-center" style="width:10%;"><?php echo $data_1['SurName']; ?></div> 
                <div class="w3-col  w3-margin-top  w3-center" style="width:20%;"><?php echo $data_1['UserName']; ?></div> 
                <div class="w3-col  w3-margin-top  w3-center" style="width:10%;"><?php echo $data_1['Password']; ?></div> 
                <div class="w3-col  w3-margin-top  w3-center" style="width:10%;"><?php echo $data_1['Tel']; ?></div> 
                <div class="w3-col  w3-margin-top  w3-center" style="width:10%;"><?php echo $data_1['Address']; ?></div> 

                <input class="w3-col w3-button w3-red w3-center w3-round-large" type="submit" name="button" id="button" value="ลบ" style="width:10%; margin:5px 0;"/>
                <input class="w3-center w3-hide" type="hidden" name="UID" value="<?php echo $data_1['User_id']; ?>" />
                <input class="w3-hide" type="hidden" name="DeleteUser" value="Yes"  />

            </div>
        </form>
        <?php } ?>

</body>
</html>