<h3 class="text-center text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">

<?php
$get_payments="select * from `user_payments`";
$result=mysqli_query($con,$get_payments);
$row_count=mysqli_num_rows($result);
echo "  <tr>
<th>SN</th>
<th>Invoice Number</th>
<th>Amount received</th>
<th>Payment mode</th>
<th>Order date</th>
<th>Delete</th>
</tr>
</thead>
<tbody>";

if($row_count==0){
    echo "<h2 class='text-center text-danger'>No payments received.</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $amount=$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
        $payment_date=$row_data['date'];
        $payment_mode=$row_data['payment_mode'];
        $number++;
        echo " <tr>
        <td>$number</td>
        <td>$invoice_number</td>
        <td>$amount</td>
        <td> $payment_mode</td>
        <td>$payment_date</td>
        <td><a href='adminstore.php?delete_payments'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";

    }
}


?>

      
       
    </tbody>
</table>