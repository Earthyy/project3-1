<?php
    session_start();
    include 'condb.php';
    include ('checklogin.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #176B87; 
        border-radius: 50px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }
    </style>

</head>
<body style="font-family: 'Itim', ">
    <!-- Navbar -->
    <form action="" class="" method="POST"  name="">
        <div class="w3-top " style=" bcursive; background-color:#303f9f; color:#FFFFFF;">
            <div class="w3-bar w3-left-align w3-large w3-container" style="height:50%;">
                <div class="w3-content">
                    
                    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                    <a href="ITshop.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
                    <a href="Notebook.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">NoteBook</a>
                    <a href="Apple.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Apple</a>

                    <!-- <form action="detailproduct.php" class="" method="GET">
                        <input type="search" name="search" id="form1" class="form-control w3-col l3 s3 m3 w3-bar-item w3-padding-large w3-hide-small w3-hide-medium " style="margin-top:8px;"/>
                        <a href="detailproduct.php" type="submit" class="btn btn-primary  material-icons w3-col  w3-bar-item  w3-hide-small w3-hide-medium" style="margin-top:8px;">search</a>
                    </form>  -->
                    

                                        
                    <!-- <div class="w3-dropdown-hover w3-hide-small">
                        <button class="w3-button w3-black w3-padding-large">Apple</button>
                        <div class="w3-dropdown-content w3-bar-block w3-border">
                            <a href="Ipho.php" class="w3-bar-item w3-button">Iphone</a>
                            <a href="#" class="w3-bar-item w3-button">Ipad</a>
                            <a href="#" class="w3-bar-item w3-button">Accessories</a>
                        </div>
                    </div> -->
                    <a href="profile.php?id=<?php echo $_SESSION['UserName'];?>" name="logout" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-right material-icons">person</a>
                    <a href="cart.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-right"><span class="material-icons ">shopping_cart</span><?php echo count($_SESSION['carts']);?></a>
                </div>   
            </div>
        

        <!-- Navbar on small screens -->
            <div id="navDemo" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium w3-large">
                <a href="Notebook.php" class="w3-bar-item w3-button w3-padding-large">NoteBoo</a>
                <a href="Apple.php" class="w3-bar-item w3-button w3-padding-large">Apple</a>
                <a href="cart.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white"><span class="material-icons ">shopping_cart</span><?php echo count($_SESSION['carts']);?></a>
            </div>
        </div>
    </form>
</body>
    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else { 
                x.className = x.className.replace(" w3-show", "");
            }
    }
    </script>
    
</html>