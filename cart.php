<?php
    include('includes/connect.php');
    include('functions/common_function.php');
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
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Register</a>
                    </li>
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
            <li class="nav-item">
                <a href="#" class="nav-link">Welcome</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Welcome</a>
            </li>
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
            <table class="text-center table-bordered" style="border: 1px solid black;">
                <thead style="background-color: #344055;">
                    <tr class="text-center text-white">
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan="2">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP Dynamic Data -->
                    <?php
                        global $conn;
                        $get_ip_adds = getIPAddress();
                        $total = 0;
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_adds'";
                        $result = mysqli_query($conn,$cart_query);
                        while($row = mysqli_fetch_array($result)){
                            $product_id = $row['product_id'];
                            $select_products = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                            $result_products = mysqli_query($conn,$select_products);
                            while($row_product_price = mysqli_fetch_array($result_products)){
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total+= $product_values;
                    ?>
                    <tr>
                        <td><?php echo$product_title ?></td>
                        <td><img src="./images/<?php echo$product_image1 ?>" alt="" style="width:75px; height =75px; object-fit:contain;"></td>
                        <td><input type="text" name="" id="" class="form-input w-50"></td>
                        <td><?php echo $price_table ?></td>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>
                            <button  class="text-white border-0 p-2 my-2 rounded  mx-3"  style="background-color: #344055;">Update</button>
                            <button  class="text-white border-0 p-2 my-2 rounded  mx-3"  style="background-color: #344055;">Remove</button>
                        </td>
                    </tr>
                    <?php
                                                }
                                            }
                    ?>
                </tbody>
            </table>
            <!-- Subtotal -->
            <div class="d-flex">
                <h4 class="p-2" style="color: #344055;">
                    Subtotal: <strong><?php echo $total ?></strong>
                </h4>
                <a href="index.php"><button  class="text-white border-0 p-2 my-2 rounded px-3 py-2 mx-3"  style="background-color: #344055;">Continue Shopping</button></a>
                <a href="index.php"><button  class="text-white border-0 p-2 my-2 rounded  px-3 py-2""  style="background-color: #344055;">Checkout</button></a>
            </div>
        </div>
    </div>
    <!-- Last Child -->
    <?php
        include('./includes/footer.php');
    ?>
    </div>
    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>