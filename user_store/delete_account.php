
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Deletion?</title>
</head>
<body>
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5" >
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Back">
        </div>
    </form>
</body>
</html>

<?php
$username_session=$_SESSION['user_name'];
if(isset($_POST['delete'])){
    $delete_query="delete from `user_table` where user_name='$user_name'";
    $result=mysqli_query($con,$delete_query);
    if($result){
            session_destroy();
            echo "<script>alert('Account Deleted sucessfully.')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['dont_delete'])){
    echo "<script>window.open('./profile.php','_self')</script>";
}
?>