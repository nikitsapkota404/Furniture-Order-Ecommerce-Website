
<?php
include('../includes/connect.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
        <!-- bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome link -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
<div class="row d-flex justify-content-center align-items-center">
<div class="col-lg-6 col-xl-5">
    <img src="../img/adminregs.png" alt="Admin Login" class="img-fluid">
</div>
<div class="col-lg-6 col-xl-5">
    <form action="" method="post">
        <div class="form-outline mb-4">
            <label for="admin_name" class="form-label">Username</label>
            <input type="text" id="admin_name" name="admin_name" placeholder="Enter username" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="admin_password" class="form-label">Password</label>
            <input type="password" id="admin_password" name="admin_password" placeholder="Enter password" class="form-control" required="required">
        </div>
        <div>
            <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
            <p class="small fw-bold mt-2 pt-1">Dont have an account?<a href="admin_registration.php" class="link-danger">Register</a></p>
        </div>
    </form>
</div>
</div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_name=$_POST['admin_name'];
    $admin_password=$_POST['admin_password'];
    $select_query="Select * from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    if($row_count>0){
        $_SESSION['admin_name']=$admin_name;
        if(password_verify($admin_password, $row_data['admin_password'])){
            if($row_count==1){
                $_SESSION['admin_name']=$admin_name;
                echo "<script>alert('Logged in successfully!');</script>";
                echo "<script>window.open('adminstore.php','_self')</script>";
            }else{
                $_SESSION['admin_name']=$admin_name;
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