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
            <h1>
                <center>Sign-In</center>
            </h1>
            <form action="login.php" method="POST">

                <div class="form-group">
                    <label for="user_email"><b>Email:</b> </label>
                    <input type="email" name="user_email" class="form-control" id="user_email">
                </div>
                <div class="form-group">
                    <label for="pwd"><b>Password:</b> </label>
                    <input type="password" name="pwd" class="form-control" id="pwd">
                </div>
                <hr>
                <center>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="register.php"><input type="button" class="btn btn-primary" value="Register"></a>

                </center>
            </form>


        </div>
</body>

</html>