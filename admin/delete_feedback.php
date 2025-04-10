<?php
if(isset($_GET['delete_feedback'])){
    $delete_id=$_GET['delete_feedback'];
    //delete query
    $delete_feedbacks="delete from `feedback` where feedback_id=$delete_id";
    $result_product=mysqli_query($con,$delete_feedbacks);
    if($result_product){
     echo "<script>alert('Feedback deleted sucessfully.')</script>";
        echo "<script>window.open('./adminstore.php?see_feedback.php','_self')</script>";
    }
}

?>