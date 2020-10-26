<?php
    if (isset($_GET['submit'])) {
         

         $username= $_GET['uname'];
         $user_email = $_GET['user_email'];
         $pass=$_GET['pass'];
         $conf_pass=$_GET['conf_pass'];
        
        
    
    include 'conn.php';
    if($pass==$conf_pass)
    {
        $query = "INSERT into customers(user_email, pass, customer_name) values('$user_email','$pass','$username')";

    }
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "success";
        header("location:index.php");
    } else {
        header("location:register.php");
    }
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
    <div class="container">
        <center>
            <h1>Registration Form</h1>
        </center>
        <form class="form-group" action="register.php" method="GET">
            <div class="form-group">

                <input type="text" class="form-control" name="uname" id="uname" placeholder="User Name">

            </div>
            <div class="form-group">

                <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Email">

            </div>
            <div class="form-group">

                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">

            </div>
            <div class="form-group">

                <input type="password" class="form-control" name="conf_pass" id="conf_pass" placeholder="Confirm password">

            </div>
           
            <center>
                <hr>
                <div class="container">


                    <input name="submit" id="submit" class=" btn btn-info btn-block" type="submit" value="Submit">

                </div>
            </center>


        </form>
    </div>
</body>

</html>