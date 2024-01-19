
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

</head>
<body style="font-family: 'Itim', cursive;">
    <!-- Navbar -->
    <div class="w3-top " style="background-color:#303f9f; color:#FFFFFF;">
        <div class="w3-bar w3-left-align w3-large w3-container " style="height:50%;">
            <div class="w3-content">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large " href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>
                <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">NoteBook</a>
                <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Apple</a>
                
                
                <!-- <div class="w3-dropdown-hover">
                    <button class="w3-button w3-black">Hover Over Me!</button>
                    <div class="w3-dropdown-content w3-bar-block w3-border">
                        <a href="#" class="w3-bar-item w3-button">Link 1</a>
                        <a href="#" class="w3-bar-item w3-button">Link 2</a>
                        <a href="#" class="w3-bar-item w3-button">Link 3</a>
                    </div>
                </div> -->
                <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-right">Login</a>
                <a href="Register.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-right">Register</a>
                <a href="" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-right"><span class="material-icons ">shopping_cart</span></a>
            </div>   
        </div>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
        <a href="Notebook.php" class="w3-bar-item w3-button w3-padding-large">NoteBook</a>
        <a href="Apple.php" class="w3-bar-item w3-button w3-padding-large">Apple</a>
    </div>
    </div>
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