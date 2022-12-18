<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
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
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-fixed-top" style="background-color: #344055;" style="position:fixed;">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="background-color: #344055;" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Total Price : $ <?php total_cart_price(); ?></a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="../search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <input type="submit" value = "Search" class="btn btn-outline-light" name="search_data_product">
                </form>
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
                        <a href='#' class='nav-link'>Welcome</a>
                    </li>
                    ";
                }else{
                    $email = $_SESSION['email'];
                    $select_query = "SELECT * FROM `user_table` WHERE user_email = '$email'";
                    $result = mysqli_query($conn,$select_query);
                    $row_data = mysqli_fetch_assoc($result);
                    $name = $row_data['user_name'];
                    $_SESSION['name'] = $name;
                    echo"
                    <li class='nav-item'>
                        <a href='#' class='nav-link'>Welcome ".$_SESSION['name']."</a>
                    </li>
                    ";
                }
                if(!isset($_SESSION['email'])){
                    echo"
                    <li class='nav-item'>
                        <a href='./users_area/user_login.php' class='nav-link'>Login</a>
                    </li>
                    ";
                }else{
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
    <!-- fourth child -->
    <div class="row">
        <div class="col-md-2 px-2">
            <ul class="navbar-nav text-white text-center" style="background-color: #344055; height:60vh;">
                <li class="nav-item">
                    <a href="#" class="nav-link"><h5>Your Profile</h5></a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">Pending Orders</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php?edit_account" class="nav-link">Edit Account</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php?my_orders" class="nav-link">My Orders</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php?delete_account" class="nav-link">Delete Account</a>
                </li>
                <li class="nav-item">
                    <a href="user_logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <?php
                get_user_order_details();
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_GET['my_orders'])){
                    include('my_orders.php');
                }
            ?>
        </div>
    </div>
    <?php
        include('../includes/footer.php');
    ?>
    </div>
    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>