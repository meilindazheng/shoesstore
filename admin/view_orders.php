<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center">All Orders</h3>
        <table class="table table-bordered mt-3" >
            <thead style="background-color: #344055;" class="text-white text-center">
                <th>No</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Total Products</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Delete</th>
            </thead>
            <tbody>
            <?php
                $get_order = "SELECT * FROM `user_order`";
                $run_get_order = mysqli_query($conn,$get_order);
                $order_number = mysqli_num_rows($run_get_order);
                if($order_number==0){
                    echo "<h2 class='text-center'>No Orders</h2>";
                }else{
                    $no = 0;
                    while ($data_order = mysqli_fetch_assoc($run_get_order)){
                        $amount_due = $data_order['amount_due'];
                        $invoice_number = $data_order['invoice_number'];
                        $total_products = $data_order['total_products'];
                        $order_date = $data_order['order_date'];
                        $order_status = $data_order['order_status'];
                        $order_id = $data_order['order_id'];
                        $no++;?>

                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $amount_due?></td>
                            <td><?php echo $invoice_number ?></td>
                            <td><?php echo $total_products ?></td>
                            <td><?php echo $order_date ?></td>
                            <td><?php echo $order_status ?></td>
                            <td class='text-center'><a href='index.php?delete_orders=<?php echo $order_id ?>'><i class='fa-solid fa-trash' style='color: #344055;'></i></a></td>
                        </tr>
                    <?php
                    }
                }
            ?>
            </tbody>
        </table>
</body>
</html>