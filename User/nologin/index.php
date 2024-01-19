<?php
    include('condb.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Shop</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body style="background-color:#fafafa;">
    <?php
        include('menubarindex.php');
    ?>
    <div class="w3-container" >
        <div class="w3-content" >
                <div class="w3-content w3-display-container" style="max-width:100%; margin:25% 0 0 0;">
                    <div id="reccomend" style="max-height:550px;">
                        <img class="mySlides" src="ipadair5.jpg" style="width:100%; height:550px;">
                        <img class="mySlides" src="Asustuff15.jpeg" style="max-width:100%; height:550px; text-aling:center; margin:auto;">
                        <img class="mySlides" src="iphone13.jpg" style="max-width:100%; height:550px; text-aling:center; margin:auto;">
                        <div class="w3-center w3-container w3-section w3-large w3-text-black w3-display-middle" style="width:100%; heigth:100%;">
                            <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                            <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                        </div>
                    </div>  
        </div>
    </div>

    <div id="main" class="w3-contianer" style="hiegth:500px; margin-top:20px;">
        <?php
        $sql_1 = "SELECT tbl_product.* FROM tbl_product";
        $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
        $row_total= mysql_num_rows($qry_1);
        while ($data_1 = mysql_fetch_array($qry_1)) { ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="w3-center" method="POST" name="Delete" style="width:100%;">
                <div class="w3-content ">
                        <div class="w3-col l3 m6 s12">
                            <div class="w3-display-container">
                                <div class="w3-card-4" style="margin:0 12px 0 12px;">
                                    <img src="<?php echo $data_1['Productpic'];?>" style="width:100%; height:220px; object-fit:cover;">
                                    <span class="w3-tag w3-display-topleft">New</span>
                                    <div class="w3-display-middle w3-display-hover">
                                        <button class="w3-button w3-black"> <a href="login.php">Viwe</a><i class="fa fa-shopping-cart"></i></button>
                                    </div>
                                    <p style="height:100px; padding-top:20px; background-color:white;"><?php echo $data_1['ProductName']; ?><br><b><?php echo $data_1['Price']; ?></b></p>

                                </div>  
                            </div>
                        </div>      
                </div>
            </form>
            <?php } ?>
        
                
    </div> 
    <script>
        var slideIndex = 1;
            showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-black", "");
            }
            x[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " w3-black";
        }
    </script>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 5000); // Change image every 2 seconds
        }
    </script> 
</body>
</html>