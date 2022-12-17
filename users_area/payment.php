<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
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
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <?php
        $email = $_SESSION['email'];
        $select_query_session = "SELECT * FROM `user_table` WHERE user_email = '$email'";
        $result = mysqli_query($conn,$select_query_session);
        $row_data = mysqli_fetch_assoc($result);
        $user_id = $row_data['user_id'];

        global $conn;

        $email = $_SESSION['email'];
        $select_query_session = "SELECT * FROM `user_table` WHERE user_email = '$email'";
        $result = mysqli_query($conn,$select_query_session);
        $row_data = mysqli_fetch_assoc($result);
        $user_id = $row_data['user_id'];
        $_SESSION['user_id'] = $user_id;
    ?>
    <div class="container">
        <h2 class="text-center mb-4">Confirmation and Payment Options</h2>
        <div class="row">
            <div class="col-md-4">
                <label for="size" class="mb-1">Payment Method</label>
                    <select class="form-control" id="size" name="size">
                    <option>VA Bank Central Asia</option>
                    <option>VA Bank Rakyat Indonesia</option>
                    <option>VA Bank Negara Indonesia</option>
                    <option>VA Bank Mandiri</option>
                </select>
                <div class="d-flex">
                <?php
                        if(!isset($_SESSION['email'])){
                            echo "<script>window.open('./users_area/user_login.php','_self')</script>";
                        }else{
                            $total=0;
                            $email = $_SESSION['email'];
                            $select_query_session = "SELECT * FROM `user_table` WHERE user_email = '$email'";
                            $result = mysqli_query($conn,$select_query_session);
                            $row_data = mysqli_fetch_assoc($result);
                            $user_id = $row_data['user_id'];
                            $_SESSION['user_id'] = $user_id;

                            $cart_query = "SELECT * FROM `cart_details` WHERE user_id = $user_id";
                            $result = mysqli_query($conn,$cart_query);
                            while($row = mysqli_fetch_assoc($result)){
                                $product_id = $row['product_id'];
                                $product_quantity = $row['quantity'];
                                $select_products = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                                $result_products = mysqli_query($conn,$select_products);
                                while($row_product_price = mysqli_fetch_array($result_products)){
                                    $price_table = $row_product_price['product_price'];
                                    $sub = $price_table * $product_quantity;
                                    $total+= $sub;
                                }
                            }

                            $result_count = mysqli_num_rows($result);
                            if($result_count>0){
                                echo "<h4 class='p-2' style='color: #344055;'>
                                        Subtotal: <strong>  $total </strong>
                                        </h4>";
                                    }
                            if(isset($_POST['continue_shopping'])){
                                echo"<script>window.open('index.php','_self')</script>";
                            }
                        }
                    ?>
                </div>
                <button class ='text-white border-0 px-5 py-2 my-3 rounded'  style='background-color: #344055;'><a href='order.php?user_id=<?php echo $user_id ?>' class = 'text-light' style='text-decoration:none;'>Pay Now</a></button>
            </div>
            <div class="col-md-8">
                <?php
                    $email = $_SESSION['email'];
                    $select_query_session = "SELECT * FROM `user_table` WHERE user_email = '$email'";
                    $result = mysqli_query($conn,$select_query_session);
                    $row_data = mysqli_fetch_assoc($result);
                    $user_id = $row_data['user_id'];
                    $_SESSION['user_id'] = $user_id;

                    $total = 0;
                    $cart_query = "SELECT * FROM `cart_details` WHERE user_id = $user_id";
                    $result = mysqli_query($conn,$cart_query);
                    $result_count = mysqli_num_rows($result);
                if($result_count>0){
                    echo"
                        <div class='col-md-6'>
                        <table class='m-auto' style='table-layout: fixed; width: 800px;'>
                        <thead style='background-color: #344055;'>
                        <tr class='text-center text-white'>
                            <th>Product Title</th>
                            <th>Size</th>
                            <th>Price per Unit</th>
                            <th>Quantity</th>
                            <th>Total Price per Item</th>
                        </tr>
                        </thead>
                        </div>
                ";
                while($row = mysqli_fetch_array($result)){
                    $cart_id = $row['cart_id'];
                    $product_id = $row['product_id'];
                    $product_quantity = $row['quantity'];
                    $product_size = $row['size'];
                    $select_products = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                    $result_products = mysqli_query($conn,$select_products);
                    while($row_product_price = mysqli_fetch_array($result_products)){
                        $product_price = array($row_product_price['product_price']);
                        $price_table = $row_product_price['product_price'];
                        $product_title = $row_product_price['product_title'];
                        $product_values = array_sum($product_price);
                        $sub_total = $price_table * $product_quantity;
                        $total+= $sub_total;
                        ?>
                        <tr>
                            <td><?php echo$product_title ?></td>
                            <td class="text-center"><?php echo $product_size?></td>
                            <td class="text-center"><?php echo $price_table ?></td>
                            <td class="text-center"><?php echo $product_quantity?></td>
                            <td class="text-center"><?php echo $price_table * $product_quantity?></td>
                        </tr>
                        <?php
                        }
                    }
                }else{
                    echo "<h2 class='text-center'>Cart is Empty!</h2>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>