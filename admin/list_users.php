<h3 class="text-center text-success">All users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">

<?php
$get_payments="select * from `user_table`";
$result=mysqli_query($con,$get_payments);
$row_count=mysqli_num_rows($result);
echo "  <tr>
<th>SN</th>
<th>Username</th>
<th>User Email</th>
<th>User Image</th>
<th>User address</th>
<th>User contact</th>
<th>Delete</th>
</tr>
</thead>
<tbody>";

if($row_count==0){
    echo "<h2 class='text-center text-danger'>No users available.</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $user_name=$row_data['user_name'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_contact=$row_data['user_contact'];
        $number++;
        echo " <tr>
        <td>$number</td>
        <td>$user_name</td>
        <td>$user_email</td>
        <td><img src='../user_store/user_img/$user_image' alt='$user_name' class='product_img'</td>
        <td>$user_address</td>
        <td>$user_contact</td>
        <td><a href='adminstore.php?delete_users=$user_id'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";

    }
}


?>

      
       
    </tbody>
</table>