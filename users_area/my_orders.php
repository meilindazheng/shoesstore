<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center">All My Orders</h3>
    <table class="table table-bordered mt-2 mx-0">
        <thead>
            <tr class="text-center text-white" style='background-color: #344055;'>
                <th>No</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete / Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $email = $_SESSION['email'];
                $get_user_id = "SELECT * FROM `user_table` WHERE user_email = '$email'";
                $run_get_user_id = mysqli_query($conn,$get_user_id);
                $user_data = mysqli_fetch_assoc($run_get_user_id);
                $user_data_id = $user_data['user_id'];

                $get_user_order = "SELECT * FROM `user_order` WHERE user_id = $user_data_id";
                $run_get_user_order = mysqli_query($conn,$get_user_order);
                $total = 0;
                while($user_order_data = mysqli_fetch_assoc($run_get_user_order)){
                    $total+=1;
                    $user_data_order_number = $user_order_data['order_id'];
                    $user_data_order_amount = $user_order_data['amount_due'];
                    $user_data_order_total_products = $user_order_data['total_products'];
                    $user_data_order_invoice_number = $user_order_data['invoice_number'];
                    $user_data_order_date = $user_order_data['order_date'];
                    // $user_data_order_number = $user_order_data['order_id'];
                    $user_data_order_status = $user_order_data['order_status'];
                    if($user_order_data['order_status']=='pending'){
                        $user_data_order_status = 'Incomplete';
                    }else{
                        $user_data_order_status = 'Complete';
                    }
                    echo"
                    <tr>
                        <td class='text-center'>$total</td>
                        <td class='text-center'>$user_data_order_amount</td>
                        <td class='text-center'>$user_data_order_total_products</td>
                        <td class='text-center'>$user_data_order_invoice_number</td>
                        <td class='text-center'>$user_data_order_date</td>
                        <td class='text-center'>$user_data_order_status</td>
                        <td class='text-center'><a href='confirm_payment.php?order_id=$user_data_order_number'>Confirm</td>
                    </tr>
                    
                    ";
                };
            ?>
        </tbody>
    </table>
</body>
</html>