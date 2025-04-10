<?php
if(isset($_GET['delete_categories'])){
    $delete_cat_id=$_GET['delete_categories'];
    //delete query
    $delete_categories="delete from `categories` where category_id=$delete_cat_id";
    $result_category=mysqli_query($con,$delete_categories);
    if($result_category){
     echo "<script>alert('Category deleted successsfully.')</script>";
        echo "<script>window.open('./adminstore.php?view_categories','_self')</script>";
    }
}

?>