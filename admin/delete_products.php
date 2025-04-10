<?php
if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    //delete query
    $delete_products="delete from `products` where product_id=$delete_id";
    $result_product=mysqli_query($con,$delete_products);
    if($result_product){
     echo "<script>alert('Product deleted sucessfully.')</script>";
        echo "<script>window.open('./adminstore.php?view_products','_self')</script>";
    }
}

?>