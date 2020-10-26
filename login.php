<?php 
if(isset($_POST['user_email']))
{
  $user_email=$_POST['user_email'];
  $pwd=$_POST['pwd'];
 include 'conn.php';
 $query="SELECT * FROM customers where  user_email='$user_email' AND pass = '$pwd'";
 $result=mysqli_query($conn,$query);

 if(mysqli_num_rows($result)==1)
 {
   $user=mysqli_fetch_assoc($result);  
   echo "success";
   session_start();
   $_SESSION['user']=$user;
   header("location:orders.php");
 }
 else{
     header("location:index.php");
 }
}
else
{
  header("location:index.php");
}
