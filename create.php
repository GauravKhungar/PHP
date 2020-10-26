<?php 
 
 session_start();
 if (!(isset($_SESSION['user']))) {
    header("location:index.php");
  }
 else{

 

 include 'conn.php';
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
<center>
  <h3>Hello <?php echo "$active_username" ?></h3>

</center>
    <form class="form-group" action="create.php" method="GET">

        <div class="container">
          <div class="form-group">
           
            <label for="item_name">Item Name</label>
            <br>
            <select class="custom-select" name="item_name" id="item" >
              <option name="pen">Pen</option>
              <option value="pencil">Pencil</option>
              <option value="book">Book</option>
              <option value="paint">Paint</option>
            </select><br>
            
            <label for="Descreption">Descreption</label>
             <select class="custom-select " name="descr" id="descr">
              <option value="Black" >Black</option>
              <option value="Blue">Blue</option>
              <option value="A4">A4</option>
              <option value="Register">Register</option>
              <option value="HB">HB</option>
              <option value="Poster">Poster</option>

            </select>
            <label for="payment_mode">Payment Mode</label>
             <select class="custom-select " name="payment_mode" id="pm">
              <option value="Card" >Card</option>
              <option value="Cash">Cash</option>
              <option value="UPI">UPI</option>
              

            </select>
          </div>
            <div class="container">
             
            <?php
              }
            
 
        
            ?>  
                 

                
            </select>
            <button type="submit" class="btn btn-success" name="buy_now">Buy Now</button>
            <?php
              if(isset($_GET['buy_now']))
              {
                  header("location:orders.php");
              }
            ?>
        </div>
    </form>
</body>
</html>