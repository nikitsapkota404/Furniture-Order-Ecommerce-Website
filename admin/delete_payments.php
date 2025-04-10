<?php
if(isset($_GET['delete_payments'])){
    $delete_payment_id=$_GET['delete_payments'];
    //delete query
    $delete_payments="delete from `user_payments` where payment_id=$delete_payment_id";
    $result_payment=mysqli_query($con,$delete_payments);
    if($result_payment){
     echo "<script>alert('Payment deleted successsfully.')</script>";
        echo "<script>window.open('./adminstore.php?list_payments','_self')</script>";
    }
}
?>