<?php

session_start();
if (!(isset($_SESSION['user']))) {
  header("location:index.php");
} else {

}
?>
<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Order Management</title>
  </head>

  <body>
    <?php
    include 'nav.php';
    $active_username = $_SESSION['user']['customer_name'];
    $active_userid = $_SESSION['user']['customer_id'];
    
    ?>
    <div class="row mt-3">
      <div class="column col-sm-4 col-md-4">
        <center>
          <span>
            <h3>Hello <?php echo "#$active_userid $active_username" ?></h3>
          </span>

        </center>
      </div>
      <form class="form-group" action="<?php if(isset($order_id)){echo "update.php";} else{echo "create.php";}?>" method="GET">

          <div class="column col-sm-8 col-md-8">

          <div class="form-group">

            <input type="number" class="form-control" name="customer_id" id="customer_id" style="display: none;" value="<?php if (isset($_SESSION['user'])) {
                                                                                                                                    echo "$active_userid";
                                                                                                                                  } ?>">
            <input type="number" class="form-control" name="order_id" id="order_id" style="display: none;" value="<?php if (isset($order_id)) {
                                                                                                                                    echo "$order_id";
                                                                                                                                  } ?>">
            <br>
            <label for="product_name"><b>Product Name</b></label>
            <br>
            <select class="custom-select" name="product_name" id="product_name">
              <option value="pen">Pen</option>
              <option value="pencil">Pencil</option>
              <option value="book">Book</option>
              <option value="paint">Paint</option>
            </select><br>

            <label for="product_description"><b>Descreption</b></label>
            <select class="custom-select " name="product_description" id="product_description">
              <option value="Black">Black</option>
              <option value="Blue">Blue</option>
              <option value="A4">A4</option>
              <option value="Register">Register</option>
              <option value="HB">HB</option>
              <option value="Poster">Poster</option>

            </select><br><br>

            <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Enter Price">
            <br>
            <input type="number" class="form-control" name="product_quantity" id="product_quantity" placeholder="Enter Product Quantity">
            <br>
            <label for="payment_mode"><b>Payment Mode</b></label>
            <select class="custom-select " name="payment_mode" id="pm">
              <option value="Card">Card</option>
              <option value="Cash">Cash</option>
              <option value="UPI">UPI</option>
            </select>
            <label for="order_status"><b>Order Status</b></label>
            <select class="custom-select " name="order_status" id="order_status">
              <option value="Shipped">Shipped</option>
              <option value="In Transit">In Transit</option>
              <option value="Received">Received</option>
            </select>

          </div>

        </div>


      


      </select>
      <a href="create.php">
          <button type="submit" class="btn btn-success" name="buy_now">Buy Now</button>
        </a>
      <?php 
      $order_id= $_GET['order_id'] ;
      ?>
      <a href="update.php?order_id=<?php echo $order_id;?>">
        <button type="submit" class="btn btn-warning" name="update" value="update">Update</button>
        </a>
        <a href="delete.php?order_id=<?php echo $order_id;?>">

            <input type="button" class="btn btn-danger" name="delete" value="Delete">
        </a>
      
      <?php
     


      ?>

    </div>
    </form>
  </body>
  </html>