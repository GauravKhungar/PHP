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
    <h3>Hello <?php echo "#$active_userid $active_username" ?></h3>

  </center>
  <div class="table-responsive container">

   
        <div class="form-group">


          <form class="form-group" action="orders.php" method="GET">

            <input type="text" class="form-control" name="search" id="search" style="border-bottom: 3px;" placeholder="Search product_name or product_description" value="<?php if (isset($_GET['search'])) {
                                                                                                                                                                            echo $_GET['search'];
                                                                                                                                                                          } ?>">
            <div class="form-group">
              <center>
                <button class="btn btn-primary" type="submit">Search</button>

              </center>


            </div>
            
            <?php


            include 'conn.php';

            if (isset($_GET['search']) && $_GET['search'] != "") {

              $search = $_GET['search'];
              $query = "SELECT * FROM orders where  (product_name LIKE '%$search%' OR product_description LIKE '%$search%') AND customer_id='$active_userid'";
            } else {
              $query = "SELECT * FROM orders";
            }

            $result = mysqli_query($conn, $query);
           echo mysqli_error($conn);
           $empty='';
           if(mysqli_num_rows($result)==0)
           {
             ?>
             <div class="container">
               <h4 style="color:red">Please place an order first!!</h4>
               </div>
             <?php
             $empty='display:none';
           }

           ?>
             <table class="table table-striped table-hover" style="<?php echo $empty;?>">
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
          <th> operations</th>
        </tr>

      </thead>
           <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
    
      <tbody>
              <tr>
                <td><?php echo $row['order_id']; ?> </td>
                <td><?php echo $row['customer_id']; ?> </td>
                <td><?php echo $row['product_name']; ?> </td>
                <td><?php echo $row['product_description']; ?> </td>
                <td><?php echo $row['product_price']; ?> </td>
                <td><?php echo $row['product_quantity']; ?> </td>
                <td><?php echo $row['payment_mode']; ?> </td>
                <td><?php echo $row['order_status']; ?> </td>
                <td><a href="form.php?order_id=<?php echo $row['order_id'];?>&"><button class="btn btn-warning" type="button">Update</button></a>  </td>
              </tr>
            <?php
            }
            
            ?>


          </form>
        </div>
      </tbody>
    </table>
  </div>

</body>

</html>