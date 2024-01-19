<?php
include('condb.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="/picpro/favicon.avif" type="image/x-icon">
</head>
<body>
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
                <h3 class="w3-wide w3-center"><b>Admin</b></h3>
            </div>
            <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
                <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">Manage Admin <i class="fa fa-caret-down"></i></a>
                <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                    <a href="Homeadmin.php" class="w3-bar-item w3-button"><i class="w3-margin-right"></i>Admin list</a>
                    <a href="insertadmin.php" class="w3-bar-item w3-button"><i class="w3-margin-right"></i>Add Admin</a>
                </div>

                <a onclick="myAccFunc1()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn1">Manage Product <i class="fa fa-caret-down"></i></a>
                <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                    <a href="product.php" class="w3-bar-item w3-button"><i class="w3-margin-right"></i>Product list</a>
                    <a href="insertproduct.php" class="w3-bar-item w3-button"><i class="w3-margin-right"></i>Add Product</a>
                </div>


                <a onclick="myAccFunc2()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align " id="myBtn1">Manage User<i class="fa fa-caret-down w3-margin-left"></i></a>
                <div id="demoAcc2" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                    <a href="userlist.php" class="w3-bar-item w3-button"><i class="w3-margin-right"></i>User list</a>
                    <a href="Orderadmin.php" class="w3-bar-item w3-button"><i class="w3-margin-right"></i>Order</a>
                </div>
                

            </div>
            <a href="Adminlogout.php" class="w3-bar-item w3-button w3-padding">Logout</a> 
    </nav>

        <!-- Top menu on small screens -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-padding-24 w3-wide">Admin</div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        </header>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px">

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>

    <script>
        // Accordion 
        function myAccFunc() {
            var x = document.getElementById("demoAcc");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
        // Click on the "Jeans" link on page load to open the accordion for demo purposes
        //document.getElementById("myBtn").click();
        // Open and close sidebar
            function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
            }
            
            function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
        
        function myAccFunc1() {
            var x = document.getElementById("demoAcc1");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
            function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
            }
            
            function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        function myAccFunc2() {
            var x = document.getElementById("demoAcc2");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
            function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
            }
            
            function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
        
    </script>
</body>
</html>