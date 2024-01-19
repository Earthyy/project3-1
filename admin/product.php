<?php
include('condb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["DeleteProduct"] == "Yes") {

    $ID=$_POST['id'];

    $sql = "DELETE FROM tbl_product WHERE ProductID='$ID'";
    $dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{}  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Product</title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="font-family: 'Itim', cursive; background-color:#132043;" class="">
        
        <?php
            include('menuadmin.php'); 
        ?>

    <div class="" style="margin:50px; 0 50px 0 ">
        <div class="" style=""> 
            <div class="w3-row w3-pale-yellow"> 
                <div class="w3-col w3-margin-top w3-center" style="width:10%;"><p>รหัสสินค้า</p></div>
                <div class="w3-col w3-margin-top w3-center" style="width:5%;"><p>หมวดหมู่</p></div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;"><p>ยี่ห้อ</p></div>
                <div class="w3-col w3-margin-top w3-center" style="width:15%;"><p>ชื่อสินค้า</p></div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;"><p>ต้นทุน</p></div>
                <div class="w3-col w3-margin-top w3-center" style="width:10%;"><p>ราคาขาย</p></div>
                <div class="w3-col w3-margin-top w3-center" style="width:8%;"><p>จำนวน</p></div>
                <div class="w3-col w3-margin-top w3-center" style="width:8%;"><p>แก้ไข</p></div>
                <div class="w3-col w3-margin-top w3-center" style="width:5%;"><p>ลบข้อมูล</p></div> 
        </div> 
        <?php 
            $sql_1 = "SELECT tbl_product.*,tbl_category.*,tbl_branch.* FROM tbl_product join tbl_category on tbl_category.CategoryID=tbl_product.CategoryID
                                                            join tbl_branch on tbl_branch.BranchID=tbl_product.BranchID";
                $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
                $row_total= mysql_num_rows($qry_1); //จำนวนนักศึกษา ทั้งสิ้น <?php echo $row_total;

            while ($data_1 = mysql_fetch_array($qry_1)) { ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="w3-center" method="POST" name="Delete" style="width:100%;">
                    <div class="w3-row w3-border-bottom w3-border-black" style="background-color:#E08E7D;">
                        <div class="w3-col  w3-margin-top w3-margin-bottom w3-center" style="width:10%;"><?php echo $data_1['ProductID']; ?></div>
                        <div class="w3-col  w3-margin-top w3-margin-bottom w3-center " style="width:5%;"><?php echo $data_1['CategoryName']; ?></div>
                        <div class="w3-col  w3-margin-top w3-margin-bottom w3-center" style="width:10%;"><?php echo $data_1['BranchName']; ?></div> 
                        <div class="w3-col  w3-margin-top w3-margin-bottom w3-center" style="width:15%;"><?php echo $data_1['ProductName']; ?></div> 
                        <div class="w3-col  w3-margin-top w3-margin-bottom w3-center" style="width:10%;"><?php echo $data_1['Cost']; ?></div> 
                        <div class="w3-col  w3-margin-top w3-margin-bottom w3-center" style="width:10%;"><?php echo $data_1['Price']; ?></div> 
                        <div class="w3-col  w3-margin-top w3-margin-bottom w3-center" style="width:8%;"><?php echo $data_1['Quantity']; ?></div> 

                        <a class="w3-col w3-button w3-center w3-round-large" style="text-aling:center; width:8%; background-color:#CD5C08; margin:10px 10px 10px 0;" href="editproduct.php?Id=<?php echo $data_1['ProductID']; ?>">แก้ไขข้อมูล</a> 

                        <input class="w3-col w3-button w3-red w3-center w3-round-large " type="submit" name="button" id="button" value="ลบ" style="width:5%; margin:10px 0px 10px 0;" onclick="showAlert()"/>
                        <input class="w3-center w3-hide" type="hidden" name="id" value="<?php echo $data_1['ProductID']; ?>" />
                        <input class="w3-hide" type="hidden" name="DeleteProduct" value="Yes"/>


                    </div>
                </form>
            <?php } ?>

        <script>
            function showAlert() {
                if (confirm("Are you sure you want to delete this product?")) {
                    // User clicked OK, proceed with the deletion
                    var id = document.querySelector('input[name="id"]').value;
                    var deleteInput = document.querySelector('input[name="DeleteProduct"]');
                    deleteInput.value = "Yes";

                    // Submit the form
                    document.getElementById('deleteForm').submit();
                } else {
                    // User clicked Cancel, do nothing
                }
            }
        </script>

</body>
</html>
