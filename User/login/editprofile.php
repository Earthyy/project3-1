<?php
    session_start();

    include 'condb.php';
    include 'checklogin.php';

    $ID=$_GET['id'];
    $sql_1 = "SELECT User.* FROM User where UserName = '$ID'";
    $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
    $user = mysql_fetch_array($qry_1);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["EditProflie"] == "Yes" ) {
        $userid =$_POST['userid'];
        $pn=$_POST['Prefix'];
        $n=$_POST['Name'];
        $sn=$_POST['Sname'];
        $un=$_POST['username'];
    
        $password=$_POST['password'];     $passerror= "";
        $con_password=$_POST['confirm_password'];
        $e=$_POST['email'];
        $tel=$_POST['tel'];
        $ad=$_POST['Address'];

        
    
        if(empty($n)){
            $nameErr = "Name is empty";
        }
        if(empty($sn)){
            $SnameErr = "SurName is empty";
        }
        if(empty($un )){
            $usernameErr = "userName is empty";
        }
        if(empty($password)){
            $passwordErr = "password is empty";
        }
        if(empty($con_password )){
            $con_passErr = "comfrim_password is empty";
        }
        if(empty($e)){
            $emailErr = "email is empty";
        }
        if(empty($ad)){
            $adErr = "address is empty";
        }
    
        if(empty($tel)){
            $telErr = "Telphone is empty";
        }
        if($con_password != $password){
            $con_passErr = $passwordErr = "password don't match ";
        }
    
        else if ($password == $con_password && !empty($pn) && !empty($n)  && !empty($sn)  && !empty($un)  && !empty($password)  && !empty($e)  && !empty($ad) && !empty($tel) ) {
            $sql3 = " UPDATE User SET User_id='$userid', Prefix='$pn',Name='$n',SurName='$sn',UserName='$un',Password='$password',Email='$e',Tel='$tel',Address='$ad'
            WHERE User_id='$userid' ";
            $dbquery = mysql_db_query($database_surachet, $sql3)or die(mysql_error());

            header('location:editprofilefinish.php');   
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <?php
        include('Mainmenubar.php');
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" style=" margin:3% 0 0 0;"class=" w3-xxlarge  w3-hide-medium">
        <div style="text-align: center;" >
            <p>กรอกข้อมูล</p>
        </div>
            <div class="w3-container w3-large  ">
                
                <div class="w3-content"style="margin:10px auto 50px auto;">
                    <div class="w3-col s12 m12 l12" ">
                        <div class="w3-col s6 m6 l6">
                            <p>Prefix:</p>
                        </div>
                        <div class="">
                        <input type="radio" name="Prefix" value="Mr" <?php if (!(strcmp(Mr, $user['Prefix']))) {echo "checked=\"checked\"";} ?> >นาย
                        <input type="radio" name="Prefix" value="Miss" <?php if (!(strcmp(Miss, $user['Prefix']))) {echo "checked=\"checked\"";} ?> >นางสาว
                        
                        </div>
                    </div>
                    <!-- ชื่อจริง -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>Name:</p>
                        </div>
                        <div class="w3-col s6 m6 l6">
                            <input type="text" name="Name" size="30" maxlength="30" style="" value="<?php echo $user['Name'];?>">
                            <span class="error"><?php echo $nameErr;?></span>
                        </div>
                    </div>
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>Sname:</p>
                        </div>
                        <div class="w3-col s6 m6 l6">
                            <input type="text" name="Sname" size="30" maxlength="30" style="" value="<?php echo $user['SurName'];?>">
                            <span class="error"><?php echo $SnameErr;?></span>
                        </div>
                    </div>

                    <!-- username -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m12 l6">
                            <p>Username:</p>
                        </div>
                        <div class="w3-margin-top">
                            <input type="text" name="username" size="15" maxlength=" 15" value="<?php echo $user['UserName'];?>">
                            <span class="error"><?php echo $usernameErr;?></span>
                        </div>
                    </div>
                    <!-- password -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m12 l6">
                            <p>Password:</p>
                        </div>
                        <div class="w3-margin-top">
                            <input type="password" name="password" size="15" maxlength=" 15" value="<?php echo $user['Password'];?>">
                            <span class="error"><?php echo $passwordErr;?></span>
                        </div>
                    </div>
                    <!-- confirm_password -->
                    <div class="w3-col s12 m12 l12 w3-margin-bottom">
                        <div class="w3-col s6 m12 l6">
                            <p>Confirm Password:</p>
                        </div>
                        <div class="w3-margin-top">
                            <input type="password" name="confirm_password" size="15" maxlength=" 15" value="<?php echo $user['Password'];?>">
                            <span class="error"><?php echo $con_passErr;?></span>
                        </div>
                    </div>

                    <!-- email -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>E-mail:</p>
                        </div>
                        <div class="w3-margin-top w3-col s6 m6 l6">
                            <input type="email" name="email" size="30"" maxlength=" 30" value="<?php echo $user['Email'];?>">
                            <span class="error"><?php echo $emailErr;?></span>
                        </div>
                    </div>

                    <!-- Tel -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>Tel-Phone:</p>
                        </div>
                        <div class="w3-col s6 m6 l6 w3-margin-top">
                            <input type="tel" name="tel" size="10"" maxlength=" 10" value="<?php echo $user['Tel'];?>">
                            <span class="error"><?php echo $telErr;?></span>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="w3-col s12 m12 l12" style="margin-bottom:50px;">
                        <div class="w3-col s6 m6 l6 w3-margin-top">
                            <p>Address:</p>
                        </div>
                        <div class="w3-col s6 m6 l6 w3-margin-top">
                            <textarea name="Address" class="w3-left" id="" cols="30" rows="10" style="background-color:;" ><?php echo $user['Address'];?></textarea>
                            <span class="error"><?php echo $adErr;?></span>
                        </div>
                    </div>

                    <div style="text-align: center;" id="botton">
                        <input type="hidden" name="userid" value="<?php echo $user['User_id']; ?>">
                        <input type="hidden" name="EditProflie" value="Yes">
                        <input type="submit" name="submit" class="btn btn-success" value ="Submit" style="background-color:; border-radius:10px;" >
                    </div>

                    <div class="w3-bottom-lef">
                        <a href="profile.php?id=<?php echo $user['UserName'];?>" class="btn btn-info material-icons">arrow_back</a>
                    </div>
                </div>
            </div>
    </form>

</body>
</html>