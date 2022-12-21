<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];

        $select_data = "SELECT * FROM `user_order` WHERE order_id = $order_id";
        $run_select_data = mysqli_query($conn,$select_data);
        $get_data = mysqli_fetch_assoc($run_select_data);
        $invoice = $get_data['invoice_number'];
        $amount = $get_data['amount_due'];
    }
    if(isset($_POST['confirm_payment'])){
        $invoice_number = $_POST['invoice_number'];
        $amount_due = $_POST['amount'];
        $payment_method = $_POST['payment_method'];

        $insert_query = "INSERT INTO `user_payments` VALUES('',$order_id,$invoice,$amount_due,'$payment_method',NOW())";
        $run_insert_query = mysqli_query($conn,$insert_query);
        if($run_insert_query){
            echo "success";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        }
        $update_query = "UPDATE `user_order` SET order_status= 'completed' WHERE order_id = $order_id";
        $run_update_query = mysqli_query($conn,$update_query);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #344055;">
    <div class="conatainer text-center">
        <form action="" method="post">
            <h6 class="text-white mt-5">Payment Method</h4>
            <select class="form-control w-25 m-auto" id="payment_method" name="payment_method">
                <option>VA Bank Central Asia</option>
                <option>VA Bank Rakyat Indonesia</option>
                <option>VA Bank Negara Indonesia</option>
                <option>VA Bank Mandiri</option>
            </select>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <h6 class="text-white">Invoice Number</h6>
                <input type="text" class="form-control m-auto w-50" name="invoice_number" readonly value="<?php echo $invoice ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <h6 class="text-white">Amount</h6>
                <input type="text" class="form-control m-auto w-50" name="amount" readonly value="<?php echo $amount?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" name ="confirm_payment" class='text-white border-0 p-2 rounded'  style='background-color: black;'>
            </div>
        </form>
    </div>
</body>
</html>