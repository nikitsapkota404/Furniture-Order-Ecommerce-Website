<?php
include('../includes/connect.php');
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['admin_name'])) {
    // Redirect to the login page
    header("Location: admin_login.php");
    exit(); // Stop further execution
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome link -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        .adminimg{
            width: 100px;
            object-fit: contain;
        }
        .footer{
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .product_img{
            object-fit: contain;
            width: 100px;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <img src="../img/logo.jpg" alt="" class="logo">
            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <ul class="navbar-nav ">
                <?php
        if(!isset($_SESSION['admin_name'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'><b>Welcome Guest</b></a>
          </li>";
        } else {
            echo "<li class='nav-item'>
                      <a class='nav-link' href='#'><b>Welcome, ".$_SESSION['admin_name']." </b></a>
                  </li>";
        }
       
        if(!isset($_SESSION['admin_name'])){
            echo "<li class='nav-item'>
                      <a class='nav-link' href='admin_login.php'><b>Login</b></a>
                  </li>";
        } else {
            echo "<li class='nav-item'>
                      <a class='nav-link' href='admin_logout.php'><b>Logout</b></a>
                  </li>";
        }
        ?>
                </ul>
            </nav>
        </div>
        </nav>

        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    
        <?php
                    $admin_name = $_SESSION['admin_name'];
                    $admin_image_query = "SELECT admin_image FROM admin_table WHERE admin_name='$admin_name'";
                    $admin_image_result = mysqli_query($con, $admin_image_query);
                    $row_image = mysqli_fetch_assoc($admin_image_result);
                    $admin_image = $row_image['admin_image'];

                    if ($admin_image) {
                        echo " 
                                <img src='admin_img/$admin_image' class='adminimg my-4' alt=''>";
                    }
                    ?>
                    <p class="text-light text-center"><?php echo $_SESSION['admin_name']?></p>
                </div>
                <div class="button text-center">
                    <button  class="my-1"><a href="insert_products.php" class="nav-link text-dark bg-warning my-1">Insert Products</a></button>
                    <button  class="my-1"><a href="adminstore.php?view_products" class="nav-link text-dark bg-warning my-1">View Products</a></button>
                    <button  class="my-1"><a href="adminstore.php?insert_category" class="nav-link text-dark bg-warning my-1">Insert Categories</a></button>
                    <button  class="my-1"><a href="adminstore.php?view_categories" class="nav-link text-dark bg-warning my-1">View Categories</a></button>
                    <button  class="my-1"><a href="adminstore.php?list_orders" class="nav-link text-dark bg-warning my-1">All orders</a></button>
                    <button  class="my-1"><a href="adminstore.php?list_payments" class="nav-link text-dark bg-warning my-1">All payments</a></button>
                    <button  class="my-1"><a href="adminstore.php?list_users" class="nav-link text-dark bg-warning my-1">List users</a></button>
                    <button  class="my-1"><a href="adminstore.php?feedback_users" class="nav-link text-dark bg-warning my-1">Feedback from users</a></button>

                </div>
            </div>
        </div>
        <div class="container my-5">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_products'])){
                include('delete_products.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['edit_categories'])){
                include('edit_categories.php');
            }
            if(isset($_GET['delete_categories'])){
                include('delete_categories.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['delete_payments'])){
                include('delete_payments.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['delete_users'])){
                include('delete_users.php');
            }
            if(isset($_GET['feedback_users'])){
                include('see_feedback.php');
            }
            if(isset($_GET['delete_feedback'])){
                include('delete_feedback.php');
            }
            if(isset($_GET['delete_orders'])){
                include('delete_orders.php');
            }
          
           
            ?>
        </div>
    </div>
        <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

