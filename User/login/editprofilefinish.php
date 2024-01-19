<?php
    session_start();

    include 'condb.php';
    include 'checklogin.php';
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
        <div class="w3-cotainer">
            <div class="w3-content">
                <a href="profile.php?id=<?php echo $_SESSION['UserName'];?>" class="btn btn-info material-icons w3-display-middle">arrow_back</a>
            </div>
        </div>
    </form>

</body>
</html>