<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
        <!-- bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome link -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
<div class="row d-flex justify-content-center align-items-center">
<div class="col-lg-6 col-xl-5">
    <img src="../img/adminregs.png" alt="Admin Registration" class="img-fluid">
</div>
<div class="col-lg-6 col-xl-5">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <label for="admin_name" class="form-label">Username</label>
            <input type="text" id="admin_name" name="admin_name" placeholder="Enter username" class="form-control" required="required">
        </div>
  
        <div class="form-outline mb-4">
            <label for="admin_email" class="form-label">Email</label>
            <input type="email" id="admin_email" name="admin_email" placeholder="Enter email" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4">
                        <label for="admin_image" class="form-label">Photo</label>
                        <input type="file" id="admin_image" class="form-control" required="required" name="admin_image">
                    </div>
        <div class="form-outline mb-4">
            <label for="admin_password" class="form-label">Password</label>
            <input type="password" id="admin_password" name="admin_password" placeholder="Enter password" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="conf_admin_password" class="form-label">Confirm password</label>
            <input type="password" id="conf_admin_password" name="conf_admin_password" placeholder="confirm password" class="form-control" required="required">
        </div>
        <div>
            <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_reg" value="Register">
            <p class="small fw-bold mt-2 pt-1">Already have an account?<a href="admin_login.php" class="link-danger">Login</a></p>
        </div>
    </form>
</div>
</div>
    </div>
</body>
</html>


<!-- php -->
<?php

if(isset($_POST['admin_reg'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_admin_password=$_POST['conf_admin_password'];
    $admin_image=$_FILES['admin_image']['name'];
    $admin_image_tmp=$_FILES['admin_image']['tmp_name'];

    // Check if the user already exists in the database
    $select_query="Select * from `admin_table` where admin_email='$admin_email' or admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Already exists.Please use another gmail or username.')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Passwords do not match. Please try again.')</script>";
    }else{
        move_uploaded_file($admin_image_tmp, "admin_img/$admin_image");
        $insert_query="insert into `admin_table` (admin_name,admin_email,admin_image,admin_password) values ('$admin_name','$admin_email','$admin_image','$hash_password')";
        $sql_execute=mysqli_query($con,$insert_query);

        if($sql_execute){
            echo "<script>alert('Registration successful')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
        
    }


}

?>