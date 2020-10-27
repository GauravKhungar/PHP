<?php

session_start();
if (!(isset($_SESSION['user']))) {
  header("location:index.php");
} 
else {



  include 'conn.php';
  if (isset($_GET['buy_now'])) {
    $customer_id = $_GET['customer_id'];
    $product_name = $_GET['product_name'];
    $product_description = $_GET['product_description'];
    $product_price = $_GET['product_price'];
    $product_quantity = $_GET['product_quantity'];
    $payment_mode = $_GET['payment_mode'];
    $order_status = $_GET['order_status'];


    $query = "INSERT into orders(customer_id, product_name, product_description,product_price, product_quantity, payment_mode, order_status ) values('$customer_id','$product_name','$product_description',' $product_price ','$product_quantity','$payment_mode','$order_status')";


    $result = mysqli_query($conn, $query);
    if ($result) {
      echo "success";


      header("location:orders.php");
    } else {
      mysqli_error($conn);
      header("location:create.php");
    }
   
  } 
}
?>

  
