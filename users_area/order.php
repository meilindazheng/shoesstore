<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');

    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }
    // getting total items and total price
    $total =0;
    $cart_query_price = "SELECT * FROM `cart_details` WHERE user_id = $user_id";
    $result_cart_price = mysqli_query($conn,$cart_query_price);
    $count_cart = mysqli_num_rows($result_cart_price);
    while($row = mysqli_fetch_assoc($result_cart_price)){
        $product_id = $row['product_id'];
        $product_quantity = $row['quantity'];
        $product_query_price = "SELECT * FROM `products` WHERE product_id = $product_id";
        $result_product_price = mysqli_query($conn,$product_query_price);
        while($row_product = mysqli_fetch_assoc($result_product_price)){
            $product_price = $row_product['product_price'];
            $sub = $product_price * $product_quantity;
            $total+= $sub;
        }
    }
    echo $total;
?>

