<?php
    session_start();
    include('condb.php');   
    $ID=$_GET['id'];
    $name=$_GET['search'];
    
    include 'checklogin.php';

        $sql_1 = "SELECT tbl_product.* FROM tbl_product Where ProductID='$ID';";
        $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
        $row_total= mysql_num_rows($qry_1);
        $data_1 = mysql_fetch_array($qry_1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data_1['ProductName']; ?></title>
</head>
<body>
    <?php
        include('Mainmenubar.php');
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST" style=" max-width:auto; max-height:auto; margin:15% 0 0 0;"class=" w3-xxlarge  w3-hide-medium">
        <div class="w3-container">
            <div class="w3-content">
                <div class="w3-row">
                    <div class="w3-col s12 m6 l6">
                        <img src="<?php echo $data_1['Productpic']; ?>" alt="" style="height:450px; object-fit:cover; width:450px;">
                    </div>
                    <div class="w3-col s12 m6 l6">
                        <p><?php echo nl2br($data_1['ProductName']);?></p>                      
                        <a href="cart-add.php?id=<?php echo $data_1['Counter'];?>" class="btn btn-primary" style="margin:50px 0 0 0;" onclick="showAlert(event)"><span class="material-icons " onclick="showAlert()">add_shopping_cart</span></a>
                    </div>
                    <div class="w3-col s12 m12 l12" style="margin:100px 0 0 0; text-align:center; margin:50px 0 50px 0;">
                        <p>รายละเอียดสินค้า</p>                   
                        <?php echo nl2br($data_1['DetailProduct']);?>
                    </div>
                </div>
            </div>
        </div>
                

    </form>
    <script scr="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function showAlert(event) {
            event.preventDefault(); // Prevent the default link behavior (optional)

            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500,
            }).then(result => window.location.href="cart-add.php?id=<?php echo $data_1['Counter'];?>");
        }
    </script>
</body>
</html>