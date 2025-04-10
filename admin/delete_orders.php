<?php
if(isset($_GET['delete_orders'])){
    $delete_id=$_GET['delete_orders'];
    //delete query
    $delete_orders="delete from `user_orders` where order_id=$delete_id";
    $result_product=mysqli_query($con,$delete_orders);
    if($result_product){
     echo "<script>alert('Order deleted sucessfully.')</script>";
        echo "<script>window.open('./adminstore.php?list_orders','_self')</script>";
    }
}

?>