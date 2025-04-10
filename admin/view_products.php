<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .img_product{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
        <tr>
            <th>Product ID</th>
            <th>Product title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
            <?php
            $get_products="select * from `products` ";
            $result=mysqli_query($con,$get_products);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $status=$row['status'];
                $number++;
                ?>

                 <tr class='text-center'>
                <td><?php echo $number ?></td>
                <td><?php echo $product_title ?></td>
                <td><img src='./product_images/<?php echo $product_image1 ?>' class='img_product' alt=''></td>
                <td><?php echo $product_price ?></td>
                <td><?php
                $get_count="select * from `orders_pending` where product_id=$product_id";
                $result_count=mysqli_query($con,$get_count);
                $rows_count=mysqli_num_rows($result_count);
                echo $rows_count;
                ?></td>
                <td><?php echo $status ?></td>
                <td><a href='adminstore.php?edit_products=<?php echo $product_id?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='adminstore.php?delete_products=<?php echo $product_id?>'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
        
            ?>

       
    </tbody>
</table>
</body>
</html>