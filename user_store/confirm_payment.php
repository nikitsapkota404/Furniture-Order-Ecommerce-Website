<?php
include('../includes/connect.php');
include('../function/common_function.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];


}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode,date) values ($order_id,$invoice_number,$amount,'$payment_mode',NOW())";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<h3 class='text-center text-light'>Payment Sucessful!!!</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_order="update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_order);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="" class="text-light">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number; ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due; ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Select payment mode</option>
                    <option>Connect IPS</option>
                    <option>Cash on delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" name="confirm_payment" class="bg-info py-2 px-3 border-0 " value="Confirm">
            </div>
        </form>
    </div>
    
</body>
</html>
