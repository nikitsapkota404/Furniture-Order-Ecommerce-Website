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
    <title>Cart details.</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
<style>
    .cart_img{
    width: 50px;
    height: 50px;
    object-fit: contain;
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
    
    </div>
  </div>
</nav>
<!-- second child -->
<nav class="navbar navbar-expand-lg">
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

<!-- fourth child-vtable -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            
            <tbody>
                <!-- php to display dynamic data -->
                <?php
                
  global $con;
  $get_ip_add=getIPAddress();
  $total=0;
  $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
  $result=mysqli_query($con,$cart_query);
  $result_counts=mysqli_num_rows($result);
  if($result_counts>0){

  echo "<thead>
  <tr>
      <th>Product Title</th>
      <th>Product Image</th>
      <th>Quantity</th>
      <th>Rate</th>
      <th>Remove</th>
      <th colspan='2'>Operations</th>
  </tr>
</thead>";

  while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_product="Select * from `products` where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price=array($row_product_price['product_price']);
      $price_table=$row_product_price['product_price'];
      $product_title=$row_product_price['product_title'];
      $product_image1=$row_product_price['product_image1'];
      $product_values=array_sum($product_price);
      $total+=$product_values;
  

?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./admin/product_images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                    $get_ip_add=getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                        $result_carts=mysqli_query($con,$update_cart);
                        $total=$total * $quantities;
                    }
                    
                    ?>
                    <td><?php echo $price_table?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                        <!-- <button class="bg-info px-3 py-2 border-1 mx-3">Update</button> -->
                        <input type="submit" value="update cart" class="bg-info px-3 py-2 border-1 mx-3" name="update_cart">
                        <!-- <button class="bg-info px-3 py-2 border-1 mx-3">Delete</button> -->
                        <input type="submit" value="remove cart" class="bg-info px-3 py-2 border-1 mx-3" name="remove_cart">
                    </td>

                </tr>
                <?php
                  }
                }
                }else{
                    echo"<h2 class='text-center text-danger'>Cart is empty!!</h2>";
                }
                ?>
            </tbody>
        </table>
        <!-- \subtotal -->
        <div class="d-flex mb-3">
            <?php
             global $con;
             $get_ip_add=getIPAddress();
             $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
             $result=mysqli_query($con,$cart_query);
             $result_counts=mysqli_num_rows($result);
             if($result_counts>0){
                echo"<h4 class='px-3'>Subtotal: <strong class='text-info'>$total</strong></h4>
                <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-1 mx-3' name='continue_shopping'>
                <input type='submit' value='Continue Payment' class='bg-info px-3 py-2 border-1 mx-3' name='continue_payment'>";
             }else{
                echo"<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-1 mx-3' name='continue_shopping'>";
             }

             if(isset($_POST['continue_shopping'])){
                echo "'<script>window.open('index.php','_self')</script>";
             }
             if(isset($_POST['continue_payment'])){
                echo "'<script>window.open('./user_store/checkout.php','_self')</script>";
             }
            ?>
            
        </div>
    </div>
</div>
</form>

<!-- function to remove items -->
<?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach( $_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="Delete from `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo remove_cart_item();

?>

<!-- last child -->
<div class="bg-warning p-3 text-center">
    <p>All rights reserved. Designed by NN</p>
</div>
   </div>
   



    <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>