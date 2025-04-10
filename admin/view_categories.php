<?php
include('../includes/connect.php');
?>
<h3 class="text-center text-success">All categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
        <tr>
            <th>SN</th>
        <th>Category title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
        <?php
$select_cat="select * from `categories`";
$result=mysqli_query($con,$select_cat);
$number=0;
while($row=mysqli_fetch_assoc($result)){
    $category_id=$row['category_id'];
    $category_title=$row['category_title'];
$number++;

        ?>
        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo $category_title ?></td>
            <td><a href='adminstore.php?edit_categories=<?php echo $category_id ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='adminstore.php?delete_categories=<?php echo $category_id ?>'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
}
?>
    </tbody>
</table>