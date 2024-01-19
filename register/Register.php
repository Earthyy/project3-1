<?php
session_start();

include('condb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["InsertNewStudent"] == "Yes" ) {

    $pn=$_POST['Prefix'];
    $n=$_POST['Name'];
    $sn=$_POST['Sname'];
    $un=$_POST['username'];

    $password=$_POST['password'];     $passerror= "";
    $con_password=$_POST['confirm_password'];
    $e=$_POST['email'];
    $tel=$_POST['tel'];
    $ad=$_POST['Address'];

    function isValidNameSurname($n) {
        // Use a regular expression to check if the input consists of alphabetic characters and spaces
        return preg_match("/^[a-zA-Z\s]+$/", $n);
    }

    if(empty($pn)){
        $pnErr = "PrefixName is empty";
    }
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
    if(!isValidNameSurname($n ,$sn)){
        $Errorsnytexname = "use only English.";
    }

    if($password != $con_password){
        $passdontmatch = "password don't match ";
    }
    
    else if (isValidNameSurname($n ,$sn) && $password == $con_password && !empty($pn) && !empty($n)  && !empty($sn)  && !empty($un)  && !empty($password)  && !empty($e)  && !empty($ad) && !empty($tel)) {
        
        $sql3 = "INSERT INTO User (User_id,Prefix,Name,SurName,UserName,Password,Email,Tel,Address) 
            VALUES (Default,'$pn','$n','$sn','$un','$password','$e','$tel','$ad')";
        $dbquery = mysql_db_query($database_surachet, $sql3)or die(mysql_error());
        header("location:login.php");   
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="register.css">

    <title>กรอกข้อมูล</title>

</head>

<body style="font-family: 'Itim', cursive;" class="" >

    <?php
        include('menubarindex.php');
    ?>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" style=" margin:3% 0 0 0;"class=" w3-xxlarge  w3-hide-medium">
        <div style="text-align: center;" >
            <p>กรอกข้อมูล</p>
        </div>
            <div class="w3-container w3-large">
                
                <div class="w3-content"style="margin:10px auto 50px auto;">
                    <div class="w3-col s12 m12 l12" ">
                        <div class="w3-col s6 m6 l6">
                            <p>Prefix:</p>
                        </div>
                        <div class="">
                            <input type="radio" name="Prefix" value="Mr">Mr
                            <input type="radio" name="Prefix" value="Miss">Miss
                            <span class="error"><?php echo $pnErr;?></span>
                        </div>
                    </div>
                    <!-- ชื่อจริง -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>Name:</p>
                        </div>
                        <div class="w3-col s6 m6 l6">
                            <input type="text" name="Name" size="30" maxlength="30" style="">
                            <span class="error"><?php echo $nameErr;?></span>
                            <span class="error"><?php echo $Errorsnytexname;?></span>
                        </div>
                    </div>
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>Sname:</p>
                        </div>
                        <div class="w3-col s6 m6 l6">
                            <input type="text" name="Sname" size="30" maxlength="30" style="">
                            <span class="error"><?php echo $SnameErr;?></span>
                            <span class="error"><?php echo $Errorsnytexname;?></span>
                        </div>
                    </div>

                    <!-- username -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m12 l6">
                            <p>Username:</p>
                        </div>
                        <div class="w3-margin-top">
                            <input type="text" name="username" size="15" maxlength=" 15">
                            <span class="error"><?php echo $usernameErr;?></span>
                            <span class="error"><?php echo $usernameErr;?></span>
                        </div>
                    </div>
                    <!-- password -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m12 l6">
                            <p>Password:</p>
                        </div>
                        <div class="w3-margin-top">
                            <input type="password" name="password" size="15" maxlength=" 15">
                            <span class="error"><?php echo $passwordErr;?></span>
                            <span class="error"><?php echo $passdontmatch;?></span>
                        </div>
                    </div>
                    <!-- confirm_password -->
                    <div class="w3-col s12 m12 l12 w3-margin-bottom">
                        <div class="w3-col s6 m12 l6">
                            <p>Confirm Password:</p>
                        </div>
                        <div class="w3-margin-top">
                            <input type="password" name="confirm_password" size="15" maxlength=" 15">
                            <span class="error"><?php echo $con_passErr;?></span>
                            <span class="error"><?php echo $passdontmatch;?></span>
                        </div>
                    </div>

                    <!-- email -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>E-mail:</p>
                        </div>
                        <div class="w3-margin-top w3-col s6 m6 l6">
                            <input type="email" name="email" size="30"" maxlength=" 30">
                            <span class="error"><?php echo $emailErr;?></span>
                        </div>
                    </div>

                    <!-- Tel -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>Tel-Phone:</p>
                        </div>
                        <div class="w3-col s6 m6 l6 w3-margin-top">
                            <input type="tel" name="tel" size="10"" maxlength=" 10">
                            <span class="error"><?php echo $telErr;?></span>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="w3-col s12 m12 l12" style="margin-bottom:50px;">
                        <div class="w3-col s6 m6 l6 w3-margin-top">
                            <p>Address:</p>
                        </div>
                        <div class="w3-col s6 m6 l6 w3-margin-top">
                            <textarea name="Address" class="w3-left" id="" cols="30" rows="10" style="background-color:;"></textarea>
                            <span class="error"><?php echo $adErr;?></span>
                        </div>
                    </div>

                    <div style="text-align: center;" id="botton">
                        <input type="hidden" name="InsertNewStudent" value="Yes">
                        <input type="submit" name="submit" value ="Submit" style="background-color:; border-radius:10px;" >
                        <input type="reset" name="reset" value="&nbsp;Reset&nbsp;" style="background-color; border-radius:10px;"></td>
                    </div>
                </div>
            </div>
    </form>


</body>

</html>