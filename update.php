<?php
session_start();
if (!(isset($_SESSION['user']))) {
    header("location:index.php");
    
    
}
else{
    
    
    include 'conn.php';
    if (isset($_GET['order_id'])) {
            // var_dump($_GET);
            // die();
            $order_id=$_GET['order_id'];
            $customer_id = $_GET['customer_id'];
            $product_name = $_GET['product_name'];
            $product_description = $_GET['product_description'];
            $product_price = $_GET['product_price'];
            $product_quantity = $_GET['product_quantity'];
            $payment_mode = $_GET['payment_mode'];
            $order_status = $_GET['order_status'];
        
        
            $query = "UPDATE orders SET product_name ='$product_name', product_description = '$product_description', product_price = '$product_price', product_quantity ='$product_quantity', payment_mode = '$payment_mode' WHERE order_id= '$order_id'";
        
        
            $result = mysqli_query($conn, $query);
            if ($result) {
              echo "success";
              header("location:orders.php");
            } else {
             echo mysqli_error($conn);
              header("location:form.php");
            }
           
          } 
          else{
              echo "lalala";
          }
}

      ?>
