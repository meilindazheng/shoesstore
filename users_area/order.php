<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');

    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }
    // getting total items and total price
    $total =0;
    $total_quantity = 0;
    // query cart
    $cart_query_price = "SELECT * FROM `cart_details` WHERE user_id = $user_id";
    $result_cart_price = mysqli_query($conn,$cart_query_price);
    $invoice_number = mt_rand();
    $status = 'pending';
    $count_cart = mysqli_num_rows($result_cart_price);
    while($row = mysqli_fetch_assoc($result_cart_price)){
        $product_id = $row['product_id'];
        $product_quantity = $row['quantity'];
        $total_quantity+= $product_quantity;
        // query product
        $product_query_price = "SELECT * FROM `products` WHERE product_id = $product_id";
        $result_product_price = mysqli_query($conn,$product_query_price);
        while($row_product = mysqli_fetch_assoc($result_product_price)){
            $product_price = $row_product['product_price'];
            $sub = $product_price * $product_quantity;
            $total+= $sub;
        }
    }
    // query to insert orders
    $insert_order = "INSERT INTO `user_order` VALUES ('',$user_id,$total,$invoice_number,$total_quantity,NOW(),'$status')";
    $run_insert_order = mysqli_query($conn,$insert_order);
    if($run_insert_order){
        echo"<script>echo('Data Inserted Successfully')</script>";
        echo"<script>window.open('profile.php','_self')</script>";
    }

    // query to insert order pending
    $cart_query = "SELECT * FROM `cart_details` WHERE user_id = $user_id";
    $result_cart_query = mysqli_query($conn,$cart_query_price);
    while($row_cart = mysqli_fetch_assoc($result_cart_query)){
        $cart_product_id = $row_cart['product_id'];
        $cart_quantity = $row_cart['quantity'];
        $insert_order_pending = "INSERT INTO `orders_pending` VALUES ($user_id,$invoice_number,$cart_product_id,$cart_quantity,'$status')";
        $run_insert_order_pending = mysqli_query($conn,$insert_order_pending);
        if($run_insert_order_pending){
            echo"<script>echo('Data Inserted Successfully')</script>";
            echo"<script>window.open('profile.php','_self')</script>";
        }   
    }

    // delete items from cart
    $empty_cart_query = "DELETE FROM `cart_details` WHERE user_id = $user_id";
    $run_empty_cart_query = mysqli_query($conn,$empty_cart_query);
?>

