<?php
if(isset($_GET['delete_users'])){
    $delete_users_id=$_GET['delete_users'];
    //delete query
    $delete_users="delete from `user_table` where user_id=$delete_users_id";
    $result_users=mysqli_query($con,$delete_users);
    if($result_users){
     echo "<script>alert('User deleted successsfully.')</script>";
        echo "<script>window.open('./adminstore.php?list_users','_self')</script>";
    }
}

?>