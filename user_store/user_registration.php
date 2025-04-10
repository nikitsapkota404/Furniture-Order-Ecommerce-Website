
<?php
include('../includes/connect.php');
include('../function/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        
    </style>
</head>
<body>
    <div class="container-fluid mx-3">
        <h2 class="text-center">New user registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-xl-4 align-self-start">
                <img src="../img/userlogin.png" alt="Admin Registration" class="registration-img">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-label">Username</label>
                        <input type="text" id="user_name" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_name">
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Photo</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>
                    <!-- password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!-- confpassword -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <!-- address -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                    </div>
                    <!-- contact -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Register" class="bg-info py-2 px-3" name="user_registration">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<!-- php -->
<?php

if(isset($_POST['user_registration'])){
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

    // Check if the user already exists in the database
    $select_query="Select * from `user_table` where user_email='$user_email' or user_name='$user_name'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Already exists.Please use another gmail or username.')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Passwords do not match. Please try again.')</script>";
    }else{
        // Insert the user into the database
        move_uploaded_file($user_image_tmp, "user_img/$user_image");
        $insert_query="insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_contact) values ('$user_name','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);

        if($sql_execute){
            echo "<script>alert('Registration successful')</script>";
            echo "<script>window.open('user_login.php','_self')</script>";
        }
        
    }

    //selecting cart items
    $select_cart_item="select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_item);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_name;
        echo "<script>alert('You have items in your cart.')</script>";
        echo "<script>window.open('checkout.php')</script>";
    }else{
        echo "<script>window.open('../index.php</script>";
    }

}

?>