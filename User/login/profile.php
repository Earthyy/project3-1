<?php
    session_start();

    include 'condb.php';
    include 'checklogin.php';

    $ID=$_GET['id'];
    $sql_1 = "SELECT User.* FROM User where UserName = '$ID'";
    $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
    $user = mysql_fetch_array($qry_1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile <?php echo $user['Name'];?></title>
</head>
<body>
    <?php
        include('Mainmenubar.php');
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" style=" margin:3% 0 0 0;"class=" w3-xxlarge  w3-hide-medium">
        <div style="text-align: center;" >
            <p>Profile  <a href="editprofile.php?id=<?php echo $_SESSION['UserName'];?>" class="btn btn-dark material-icons">edit</a></p>
        </div>
            <div class="w3-container w3-large  ">
                
                <div class="w3-content"style="margin:10px auto 50px auto;">
                    <div class="w3-col s12 m12 l12" ">
                        <div class="w3-col s6 m6 l6">
                            <p>Prefix:</p>
                        </div>
                        <div class="">
                            <?php echo $user['Prefix'];?>
                        </div>
                    </div>
                    <!-- ชื่อจริง -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>Name:</p>
                        </div>
                        <div class="w3-col s6 m6 l6">
                            <?php echo $user['Name'];?> <?php echo $user['SurName'];?>
                        </div>
                    </div>

                    <!-- username -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m12 l6">
                            <p>Username:</p>
                        </div>
                        <div class="">
                            <?php echo $user['UserName'];?>
                        </div>
                    </div>
                    <!-- email -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>E-mail:</p>
                        </div>
                        <div class=" w3-col s6 m6 l6">
                            <?php echo $user['Email'];?>
                        </div>
                    </div>

                    <!-- Tel -->
                    <div class="w3-col s12 m12 l12">
                        <div class="w3-col s6 m6 l6">
                            <p>Tel-Phone:</p>
                        </div>
                        <div class="w3-col s6 m6 l6 ">
                            <?php echo $user['Tel'];?>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="w3-col s12 m12 l12" style="margin-bottom:50px;">
                        <div class="w3-col s6 m6 l6 ">
                            <p>Address:</p>
                        </div>
                        <div class="w3-col s6 m6 l6 ">
                            <?php echo $user['Address'];?>
                        </div>
                    </div>

                    <div style="text-align: center;" id="botton">
                        <a href="logot.php<?php $_SESSION['UserName'];?>" class="btn btn-warning material-icons w3-display-right" style="margin:0 25% 0 0;">logout</a>
                    </div>
                </div>
            </div>
    </form>

</body>
</html>