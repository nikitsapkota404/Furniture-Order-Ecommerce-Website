<?php
include('./includes/connect.php');
include('function/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture website</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
</head>
<body>
   <!-- ?navbar -->
   <div class="container-fluid">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <img src="./img/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><b>Home</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_products.php"><b>Products</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php"><b>Categories</b></a>
        </li>
        
        </li>
       
        
        <li class="nav-item">
          <a class="nav-link" href="contact.php"><b>Contact</b></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><b><i class="fa solid fa-shopping-cart"></i>(<?php
          cart_item();
          ?> items added.)</b></a>
        </li>
        
      </ul>
      <div class="navbar-text mx-auto">
        <?php
        if(!isset($_SESSION['user_name'])){
          echo "
          <a href='./user_store/user_login.php' class='btn btn-outline-light me-2'><b>Login</b></a>";
      } else {
          echo "
          <a href='./user_store/logout.php' class='btn btn-outline-light me-2'><b>Logout</b></a>";
      }
     
      if(isset($_SESSION['user_name'])){
echo "
<a href='./user_store/profile.php' class='btn btn-outline-light'><b>My account</b></a>
";
      }else{
        echo "
        
        <a href='./user_store/user_registration.php' class='btn btn-outline-light'><b>Register</b></a>";
      }

      ?>
        
    
</div>
      <form class="d-flex " action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">

<input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- second child -->
<nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav me-auto">
    
        <?php
        if(!isset($_SESSION['user_name'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'style='font-weight: bold;'>Welcome Guest</a>
        </li>";
      } else {
          echo "<li class='nav-item'>
                    <a class='nav-link' href='#' style='font-weight: bold;'>Welcome, ".$_SESSION['user_name']." </a>
                </li>";
      }
        
        ?>
    </ul>
</nav>
<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">NN Furniture</h3>
    <p class="text-center">From Affordable to premium all available</p>
   

</div>

<!-- fourth child -->
<div class="row">
<div class="col md-20">
<!-- products -->

<div class="row">
<!-- fetching products -->
<?php
 getuniqueCategories()
?>

    <!-- row end -->
    
    </div>
    <!-- col end -->
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2 bg-secondary d-flex justify-content-center">
            <ul class="navbar-nav me-auto text-center">
                <!-- <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                </li> -->
        <?php
        getCategories();
        ?>
      
    </ul>
</div>
    </div>
</div>

<!-- sidenav -->


<!-- last child -->
<div class="bg-warning p-3 text-center">
    <p>All rights reserved. Designed by NN</p>
</div>
   </div>



    <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>