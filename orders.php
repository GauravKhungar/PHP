<?php
session_start();
if (!(isset($_SESSION['user']))) {
  header("location:index.php");
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
  <center>
    <h3>Hello <?php echo "$active_username" ?></h3>

  </center>
  <div class="table-responsive container">

    <table class="table table-striped table-hover">
      <thead>


        <tr>
          <th> order_id</th>
          <th>customer_id</th>
          <th>product_name</th>
          <th>product_description</th>
          <th>product_price</th>
          <th> product_quantity</th>
          <th>payment_mode</th>
          <th> order_status</th>
        </tr>

      </thead>
      <tbody>
        <div class="form-group">


          <form class="form-group" action="orders.php" method="GET">

          </div>
            <input type="text" class="form-control" name="search" id="search" style="border-bottom: 3px;" placeholder="Search product_name or product_description" value="<?php if (isset($_GET['search'])) { echo $_GET['search']; } ?>">
            <div class="form-group">
              <center>
                <button class="btn btn-primary" type="submit">Search</button>
              
          </form>
          </center>
        
  </div>
  <?php


  include 'conn.php';

  if (isset($_GET['search']) && $_GET['search'] != "") {

    $search = $_GET['search'];
    $query = "SELECT * FROM ORDERS where  (product_name LIKE '%$search%' OR product_description LIKE '%$search%') AND customer_id='$active_userid'";
  } else {
    $query = "SELECT * FROM Orders WHERE customer_id=$active_userid";
  }

  $result = mysqli_query($conn, $query);
  mysqli_error($conn);



  while ($row = mysqli_fetch_assoc($result)) {
  ?>

    <tr>
      <td><?php echo $row['order_id']; ?> </td>
      <td><?php echo $row['customer_id']; ?> </td>
      <td><?php echo $row['product_name']; ?> </td>
      <td><?php echo $row['product_description']; ?> </td>
      <td><?php echo $row['product_price']; ?> </td>
      <td><?php echo $row['product_quantity']; ?> </td>
      <td><?php echo $row['payment_mode']; ?> </td>
      <td><?php echo $row['order_status']; ?> </td>
    </tr>
  <?php
  }


  ?>



  </tbody>
  </table>
  </div>

</body>

</html>