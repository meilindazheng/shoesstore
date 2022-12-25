<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center">All Payments</h3>
        <table class="table table-bordered mt-3" >
            <thead style="background-color: #344055;" class="text-white text-center">
                <th>No</th>
                <th>Amount</th>
                <th>Invoice Number</th>
                <th>Payment Date</th>
                <th>Payment Method</th>
            </thead>
            <tbody>
            <?php
                $get_order = "SELECT * FROM `user_payments`";
                $run_get_order = mysqli_query($conn,$get_order);
                $order_number = mysqli_num_rows($run_get_order);
                if($order_number==0){
                    echo "<h2 class='text-center'>No Orders</h2>";
                }else{
                    $no = 0;
                    while ($data_order = mysqli_fetch_assoc($run_get_order)){
                        $amount_due = $data_order['amount'];
                        $invoice_number = $data_order['invoice_number'];
                        $order_date = $data_order['date'];
                        $payment_method = $data_order['payment_mode'];
                        $no++;?>

                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $amount_due?></td>
                            <td><?php echo $invoice_number ?></td>
                            <td><?php echo $order_date ?></td>
                            <td><?php echo $payment_method ?></td>
                        </tr>
                    <?php
                    }
                }
            ?>
            </tbody>
        </table>
</body>
</html>