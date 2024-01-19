<?php
    session_start();
    include 'condb.php';
    include 'checklogin.php';

    $productIds = [];
    foreach($_SESSION['carts'] as $cartID => $cartQty) {
            //id=A001, Quantity = 1
            //array_push($productIds, $cartID);
            $productIds[] = $cartID;
    }
    
    if(empty($_SESSION['carts'])){
      header('location:cart.php');
    }

    $ids=0;
    if(count($productIds) > 0) {
        $ids = implode(',', $productIds);
    }
    
    $User = $_SESSION['UserName'];
    $sql = "SELECT * FROM User Where UserName = '$User'";
    $qry = mysql_query($sql, $surachet) or die(mysql_error());
    $data = mysql_fetch_array($qry);


    $sql_1 = "SELECT * FROM tbl_product WHERE Counter IN ($ids)";
    $qry_1 = mysql_query($sql_1, $surachet) or die(mysql_error());
    
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>CheckoutPorduct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="checkout.css" rel="stylesheet">
    </head>
    <body class="">
      <?php
          include('Mainmenubar.php');
      ?>
      <div class="container">
        <main>
          <form action="checkoutproduct.php" method="POST" id="register" style=" max-width:auto; max-height:auto; margin:15% 0 0 0;"class=" w3-large  w3-hide-medium">
              <div class="row g-5" style="margin-top:15%;">
                <div class="col-md-5 col-lg-5 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-primary">Your cart</span>
                      <span class="badge bg-primary rounded-pill"><?php echo $row_total; ?></span>
                    </h4>
                    <div style="background-color:#;">
                      <?php
                      while ($data_1 = mysql_fetch_array($qry_1)) { ?>
                        <ul class="list-group mb-3">
                          <li class="d-flex justify-content-between">
                            <div>
                              <h6 class="my-0"><?php echo $data_1['ProductName'];?> จำนวน <?php echo $_SESSION['carts'][$data_1['Counter']]?></h6>
                              <!-- <small class="text-body-secondary"></small> -->
                            </div>
                            <span class="text-body-secondary"><?php echo $data_1['Price'] * $_SESSION['carts'][$data_1['Counter']] ?> บาท</span>
                          </li>

                          <!-- <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                            <div class="text-success">
                              <h6 class="my-0">Promo code</h6>
                              <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">−$5</span>
                          </li> -->
                          <input type="hidden" name="product[<?php echo $data_1['Counter'];?>][ProductID]" value="<?php echo $data_1['ProductID']; ?>">
                          <input type="hidden" name="product[<?php echo $data_1['Counter'];?>][ProductName]" value="<?php echo $data_1['ProductName']; ?>">
                          <input type="hidden" name="product[<?php echo $data_1['Counter'];?>][Price]" value="<?php echo $data_1['Price']; ?>">

                          <input type="hidden" name="product[<?php echo $data_1['Counter'];?>][quantity]" value="<?php echo $_SESSION['carts'][$data_1['Counter']]?>">

                          <?php $price_total += $data_1['Price'] * $_SESSION['carts'][$data_1['Counter']]?>
                        </ul>  
                      <?php } ?>
                    </div>
                        <input type="hidden" name="totalprice" value="<?php echo $price_total ?>">
                    <li class="list-group-item d-flex justify-content-between">
                      <span>Total</span>
                      <strong><?php echo $price_total ?> บาท</strong>
                    </li>
                    
                  <!-- <form class="card p-2">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Promo code">
                      <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                  </form> -->
                  <button type="submit" class="btn btn-lg btn-success" style="width:100%; margin:20px 0 0 0;">สั่งซื้อ</button>
                </div>

                <div class="col-md-7 col-lg-7">
                  <h4 class="mb-3">Billing address</h4>
                  <form class="needs-validation" novalidate>
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label for="firstName" class="form-label"></label>
                        <p >First name :  <?php echo $data['Name'];?></p>
                        <input type="hidden" name="UID" value="<?php echo $data['User_id']; ?>">

                        <div class="invalid-feedback">
                          Valid first name is required.
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <p >Last name :  <?php echo $data['Name'];?></p>
                        <input type="hidden" name="lastname" class="form-control" id="lastName" placeholder="" value="<?php echo $data['SurName'];?>" required>
                        <div class="invalid-feedback">
                          Valid last name is required.
                        </div>
                      </div>

                      <div class="col-12">
                        <p >Username :  <?php echo $data['UserName'];?></p>
                        <div class="input-group has-validation">
                          <input type="hidden" name="username" class="form-control" value="<?php echo $data['UserName'];?>" id="username" placeholder="Username" required>
                        <div class="invalid-feedback">
                            Your username is required.
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <p >Tel :  <?php echo $data['Tel'];?></p>
                        <input type="hidden" name="Tel" class="form-control" value="<?php echo $data['Tel'];?>" id="email" placeholder="">
                        <div class="invalid-feedback">
                          Please enter a valid email address for shipping updates.
                        </div>
                      </div>

                      <div class="col-12">
                        <p >Address :  <?php echo $data['Address'];?></p>
                        <input type="hidden" name="address" class="form-control" value="<?php echo $data['Address'];?>" id="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                          Please enter your shipping address.
                        </div>
                      </div>
                      
                      </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </form>
        </main>
      </div>
      <script scr="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
