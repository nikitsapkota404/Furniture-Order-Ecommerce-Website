<?php
if(isset($_GET['edit_categories'])){
    $edit_categories=$_GET['edit_categories'];


    $get_categories="select * from `categories` where category_id=$edit_categories";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
}
if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];
    $update_query="update `categories` set category_title='$cat_title' where category_id=$edit_categories";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script>alert('category has been updated sucessfully.')</script>";
        echo "<script>window.open('./adminstore.php?view_categories','_self')</script>";
    }
}

?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" placeholder="<?php echo $category_title?>" name="category_title" id="category_title" class="form-control" required="required">
        </div>
        <input type="submit" value="Update category" class="btn btn-info px-3 mb-3" required="required" name="edit_cat">
    </form>
</div>