<?php
include('../includes/connect.php');
include('../function/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .registration-img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container-fluid mx-3">
        <h2 class="text-center">
            User Login
        </h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <div class="row">
                    <div class="col-lg-6 col-xl-4 align-self-start">
                        <img src="../img/userlogin.png" alt="Admin Registration" class="registration-img">
                    </div>
                    <div class="col-lg-6 col-xl-8">
                        <form action="" method="post">
                            <!-- username -->
                            <div class="form-outline mb-4">
                                <label for="user_name" class="form-label">Username</label>
                                <input type="text" id="user_name"  name="user_name" class="form-control" placeholder="Enter your username" autocomplete="off" required="required">
                            </div>
                            <!-- password -->
                            <div class="form-outline mb-4">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Login" class="bg-info py-2 px-3" name="user_login">
                                <p><b>Don't have an account?<a href="user_registration.php">Register here</a></b></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_name=$_POST['user_name'];
    $user_password=$_POST['user_password'];
    $select_query="Select * from `user_table` where user_name='$user_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart item
    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['user_name']=$user_name;
        if(password_verify($user_password, $row_data['user_password'])){
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['user_name']=$user_name;
                echo "<script>alert('Logged in successfully!');</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }else{
                $_SESSION['user_name']=$user_name;
                echo "<script>alert('Logged in successfully!');</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
    }
}
?>
