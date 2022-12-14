<?php
    include('includes/connect.php');
    include('functions/common_function.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mei & Key Shoes Store</title>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        .nav-link{
            text-decoration: none;
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .logo{
            height: 4%;
            width: 4%;
        }
        .card:hover{
            box-shadow:  0 8px 8px -6px black;
            transform:scale(1.01);
            transition: all ease 0.3s;
        }
        .dropbtn {
        color: white;
        padding: 3px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-fixed-top" style="background-color: #344055;" style="position:fixed;">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="background-color: #344055;" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="display_all.php">Products</a>
                    </li>
                    <?php
                        if(!isset($_SESSION['email'])){
                            echo"
                            <li class='nav-item'>
                                <a class='nav-link text-white' href='users_area/user_registration.php'>Register</a>
                            </li>
                            ";
                        }else{
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link text-white' href='users_area/profile.php'>My Account</a>
                            </li>
                            ";
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- calling cart function -->
    <?php
        cart();
    ?>
    <!-- Second Child -->
    <nav class="navbar navbar-expand-lg" style="background-color: #f2f2f3 ;">
        <ul class="navbar-nav me-auto">
            <?php
                if(!isset($_SESSION['email'])){
                    echo"
                    <li class='nav-item'>
                        <a href='./users_area/user_login.php' class='nav-link'>Login</a>
                    </li>
                    ";
                }else{
                    $email = $_SESSION['email'];
                    $select_query = "SELECT * FROM `user_table` WHERE user_email = '$email'";
                    $result = mysqli_query($conn,$select_query);
                    $row_data = mysqli_fetch_assoc($result);
                    $name = $row_data['user_name'];
                    $_SESSION['name'] = $name;

                    if(!isset($_SESSION['email'])){
                        echo"
                        <li class='nav-item'>
                            <a href='#' class='nav-link'>Welcome</a>
                        </li>
                        ";
                }else{
                    echo"
                    <li class='nav-item'>
                        <a href='#' class='nav-link'>Welcome ".$_SESSION['name']."</a>
                    </li>
                    ";
                }
                    echo "
                    <li class='nav-item'>
                        <a href='./users_area/user_logout.php' class='nav-link'>Logout</a>
                    </li>
                    ";
                }
            ?>
        </ul>
    </nav>
    <!-- Third Child -->
    <div>
        <h4 class="text-center">MK Shoes Store</h4>
        <p class="text-center">One Stop Shoes Center</p>
    </div>
    <!-- Fourth Child - Table Cart -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="text-center table-bordered" style="border: 1px solid black;">
                        <!-- PHP Dynamic Data -->
                        <?php
                            global $conn;

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
                                <thead style='background-color: #344055;'>
                                <tr class='text-center text-white'>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Size</th>
                                    <th>Price per Unit</th>
                                    <th>Quantity</th>
                                    <th>Total Price per Item</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
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
                                        $product_image1 = $row_product_price['product_image1'];
                                        $product_values = array_sum($product_price);
                                        $sub_total = $price_table * $product_quantity;
                                        $total+= $sub_total;
                                        ?>
                                        <tr>
                                            <td><?php echo$product_title ?></td>
                                            <td><img src="./images/<?php echo$product_image1 ?>" alt="" style="width:75px; height =75px; object-fit:contain;"></td>
                                            <td><?php echo $product_size?></td>
                                            <td><?php echo $price_table ?></td>
                                            <td><?php echo $product_quantity?></td>
                                            <td><?php echo $price_table * $product_quantity?></td>
                                            <td><input type="checkbox" name="removeitem[]" id="" 
                                                value="
                                                    <?php
                                                        echo $product_id;
                                                    ?>">
                                            </td>
                                            <td>
                                                
                                                <input type="submit" value="Remove Cart" class="text-white border-0 p-2 my-2 rounded  mx-3"  style="background-color: #344055;" name = "remove_cart">
                                                <!-- <a href="cart.php?update_cart = <?php echo $product_id ?>"><input type="submit" value="Update Cart" class="text-white border-0 p-2 my-2 rounded  mx-3"  style="background-color: #344055;" name = "update_cart"></a> -->
                                                <a href="edit_carts.php?edit_cart=<?php echo $cart_id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                    }
                            }else{
                                echo "<h2 class='text-center'>Cart is Empty!</h2>";
                            }
                        ?>
                    </tbody>
                </table>
                <!-- Subtotal -->
                <div class="d-flex">
                    <?php
                        if(!isset($_SESSION['email'])){
                            echo "<script>window.open('./users_area/user_login.php','_self')</script>";
                        }else{
                            $email = $_SESSION['email'];
                            $select_query_session = "SELECT * FROM `user_table` WHERE user_email = '$email'";
                            $result = mysqli_query($conn,$select_query_session);
                            $row_data = mysqli_fetch_assoc($result);
                            $user_id = $row_data['user_id'];
                            $_SESSION['user_id'] = $user_id;

                            $cart_query = "SELECT * FROM `cart_details` WHERE user_id = $user_id";
                            $result = mysqli_query($conn,$cart_query);
                            $result_count = mysqli_num_rows($result);
                            if($result_count>0){
                                echo "<h4 class='p-2' style='color: #344055;'>
                                        Subtotal: <strong>  $total </strong>
                                        </h4>
                                        <input type='submit' value='Continue Shopping' class='text-white border-0 p-2 my-2 rounded  mx-3'  style='background-color: #344055;' name = 'continue_shopping'>
                                        <button class ='text-white border-0 p-2 my-2 rounded  mx-3'  style='background-color: #344055;'><a href='./users_area/checkout.php' class = 'text-light' style='text-decoration:none;'>Checkout</a></button>";
                                    }
                            if(isset($_POST['continue_shopping'])){
                                echo"<script>window.open('index.php','_self')</script>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </form>
    <!-- function to remove items -->
    <?php
        function remove_cart_item(){
            global $conn;
            if(isset($_POST['remove_cart'])){
                foreach($_POST['removeitem'] as $remove_id){
                    echo $remove_id;
                    $delete_query = "DELETE FROM `cart_details` WHERE product_id = $remove_id";
                    $run_delete = mysqli_query($conn,$delete_query);
                    if($run_delete){
                        echo "<script>window.open('cart.php','_self');</script>";
                    }
                }
            }
        }
        echo $remove_item =  remove_cart_item();
    ?>

    <!-- Last Child -->
    <?php
        include('./includes/footer.php');
    ?>
    </div>
    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>