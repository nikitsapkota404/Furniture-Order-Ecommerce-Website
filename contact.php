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
<style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: lightgray;
    text-align: center;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    text-align: left;
}

h1, h2 {
    color: #333;
}

p {
    margin: 5px 0;
}

label {
    font-weight: bold;
}

textarea {
    max-width: 50%; /* Make sure it doesn't exceed container width */
    padding: 10px;
    margin: 10px;
    border-radius: 30px;
    border: 2px solid black;
    resize: vertical;
    box-sizing: border-box; /* Include padding in width calculation */
}

input[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: -10px;
    margin-bottom: 15px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
img {
    max-width: 50%; /* Make the image responsive */
    height: 50%; /* Maintain aspect ratio */
    display: block; /* Remove any extra spacing */
    margin: 0 auto; /* Center the image horizontally */
    max-height: 200px; /* Set maximum height */
}

    </style>

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
      <form class="d-flex flex-nowrap align-items-center" action="search_product.php" method="get">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
    <button type="submit" class="btn btn-outline-light">Search</button>
</form>
    </div>
  </div>
</nav>
<!-- second child -->
<nav class="navbar navbar-expand-lg custom">
    <ul class="navbar-nav me-auto">
    
        <?php
        if(!isset($_SESSION['user_name'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='#' style='font-weight: bold;'>Welcome Guest</a>
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
    <!-- Contact Information (Left Side) -->
    <div class="col-md-6">
        <h2><i>Contact Information:</i></h2>
        <p>Name: NN Furniture</p>
        <p>Email: nnfurniture@gmail.com</p>
        <p>Phone: 049421049</p>

        <h2><i>Office Location:</i></h2>
        <p>Address: Jawalakhel, Lalitpur</p>
        <p>Click on the map below to see location</p>
        <a href="https://www.google.com/maps?q=vedas college,M8F9+439, Lalitpur 44600" target="_blank">
    <img src="img/map.jpg" alt="Your Location">
</a>
</div>

<!-- Feedback Form (Right Side) -->
<div class="col-md-6">
    <h2><i>Feedback Form:</i></h2>
    <form action="submit_feedback.php" method="post">
        <label for="feedback">Your Feedback:</label><br>
        <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>
</div>
<!-- End of row -->

<!-- Fetching products -->
<?php
$ip = getIPAddress();  
cart();
?>

<!-- End of row -->
<div class="bg-warning p-3 text-center">
    <p>All rights reserved. Designed by NN</p>
</div>
</div> <!-- End of container-fluid -->

<!-- Bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

