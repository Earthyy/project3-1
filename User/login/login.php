<?php
session_start();
include 'condb.php';

$strSQL = "SELECT User.* FROM User
        WHERE UserName = '".mysql_real_escape_string($_POST['Username'])."' and Password = '".mysql_real_escape_string($_POST['Password'])."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);

if(!$objResult)
{
    $strSQL1 = "SELECT tbl_Admin.* FROM tbl_Admin
                WHERE AUser = '".mysql_real_escape_string($_POST['Username'])."' and APass = '".mysql_real_escape_string($_POST['Password'])."' ";
    $objQuery1 = mysql_query($strSQL1);
    $objResult1 = mysql_fetch_array($objQuery1);
    if(!$objResult1){
        echo "";
    }else {
        $_SESSION['AUser'] = $objResult1['AUser'];
        $_SESSION['APass'] = $objResult1['APass'];
        session_write_close();
            header("location:Homeadmin.php");
    }
    
}
else if($objResult)
{
    $_SESSION['UserName'] = $objResult['UserName'];
    $_SESSION['Password'] = $objResult['Password'];

    session_write_close();
      header("location:ITshop.php");
}

else{
    echo "";
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styleloginUser.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body style="background-color:#113946;">
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name="">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="Username" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="password" name="Password" placeholder="Password" required>
                <i class='bx bx-lock-open-alt'></i>
            </div>

            <input type="submit" name="submit" class="btn btn-success" value ="Submit">

            <div class="register-link">
                <p>Don't have an account? <a href="Register.php">Register</a></p>
            </div>
        </from>
    </div>
</body>

</html>