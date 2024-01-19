<?php
    include 'condb.php';
    include 'checklogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Product</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include 'Mainmenubar.php';
    ?>
    <div class="w3-container" style="margin:5% 0 0 0;">
        <div class="w3-content" >
            <?php
            $sql_1 = "SELECT tbl_product.* FROM tbl_product where BranchID = 'IOS' ";
            $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
            $row_total= mysql_num_rows($qry_1);
            while ($data_1 = mysql_fetch_array($qry_1)) { ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="w3-center" method="POST" name="Delete" style="width:100%;">
                    <div class="w3-content">
                        <div class="w3-col l3 m6 s12">
                            <div class="w3-display-container">
                                <div class="w3-card-4" style="margin:0 12px 0 12px;">
                                    <img src="<?php echo $data_1['Productpic'];?>" style="width:100%; object-fit:cover; height:220px;">
                                    <span class="w3-tag w3-display-topleft">New</span>
                                    <div class="w3-display-middle w3-display-hover">
                                    <button class="w3-button w3-black"> <a href="detailproduct.php?id=<?php echo $data_1['ProductID']; ?>" target="_blank" rel="noopener noreferrer">Viwe</a><i class="fa fa-shopping-cart"></i></button>
                                    </div>
                                    <p style="height:100px; padding-top:20px; background-color:white;"><?php echo $data_1['ProductName']; ?><br><b><?php echo $data_1['Price']; ?></b></p>

                                </div>  
                            </div>
                        </div>      
                    </div>
            </form>
            <?php } ?>
        </div>
    </div>
    
</body>
</html>