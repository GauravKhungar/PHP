<?php
session_start();
if (!(isset($_SESSION['user']))) {
    header("location:index.php");
    
    
}
else{
    
    
    include 'conn.php';
    if (isset($_GET['order_id'])) {
            // var_dump($_GET);
            //  die();
            $order_id=$_GET['order_id'];
            
        
        
            $query = "DELETE from orders WHERE order_id= '$order_id'";
        
        
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
