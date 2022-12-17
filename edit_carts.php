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
                        <a class="nav-link text-white" href="users_area/user_registration.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Total Price : $ <?php total_cart_price(); ?></a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <input type="submit" value = "Search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </div>
    </nav>
    <!-- <?php
        // if(isset($_GET['edit_cart'])){
        //     $edit_cart_id = $_GET['edit_cart'];
        //     $get_data = "SELECT * FROM `cart_details` WHERE product_id = $edit_cart_id";
        //     $result = mysqli_query($conn,$get_data);
        //     $row = mysqli_fetch_assoc($result);

        // }
    ?> -->
    <div class="container mt-5">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="post">
            <div class="form-outline w-50 m-auto">
                <label for="quantity">Quantity</label>
                <input type="text" id="quantity" class="form-control" name="quantity">
            </div>
            <div class="form-group w-50 m-auto">
                <label for="size">Size in EU</label>
                <select class="form-control" id="size" name="size">
                <option>37</option>
                <option>38</option>
                <option>39</option>
                <option>40</option>
                </select>
                <input type="submit" value="Update Cart" class="text-white border-0 p-2 my-2 rounded mt-3"  style="background-color: #344055;" name = "update_cart">
            </div>
        </form>
    </div>
    <?php
        include('./includes/footer.php');
    ?>
    </div>
    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- editing carts -->
<?php
    if(isset($_POST['update_cart'])){
        $edit_cart_id = $_GET['edit_cart'];
        $quantity = $_POST['quantity'];
        $size = $_POST['size'];
        // echo "<script>alert($size)</script>";
        // query to update carts
        $update_cart = "UPDATE `cart_details` SET quantity = $quantity, size = $size WHERE cart_id = $edit_cart_id";
        $result_update_cart = mysqli_query($conn,$update_cart);
        if($result_update_cart){
            echo"<script>window.open('cart.php','_self')</script>";
        }
    }
?>