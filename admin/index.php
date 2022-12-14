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
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        .logo{
            height: 4%;
            width: 4%;
        }
        body{
            overflow-x :hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <!-- first content -->
            <nav class="navbar navbar-expand-lg navbar-fixed-top" style="background-color: #344055;">
                <div class="container-fluid">
                    <img src="../images/logo.png" alt="" class="logo">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                            <?php
                            if(!isset($_SESSION['admin_email'])){
                                echo"
                                <li class='nav-item'>
                                    <a href='#' class='nav-link text-white'>Welcome Guest!</a>
                                </li>
                                ";
                            }else{
                                $email = $_SESSION['admin_email'];
                                $select_query = "SELECT * FROM `user_table` WHERE user_email = '$email'";
                                $result = mysqli_query($conn,$select_query);
                                $row_data = mysqli_fetch_assoc($result);
                                $name = $row_data['user_name'];
                                $_SESSION['name'] = $name;
                                echo"
                                <li class='nav-item'>
                                    <a href='#' class='nav-link text-white'>Welcome ".$_SESSION['name']."</a>
                                </li>
                                ";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </nav>
        <!-- second content -->
        <div style="background-color: #f2f2f3 ;">
            <h4 class="text-center">Manage Platform</h4>
        </div>
        <!-- third content -->
        <div class="row">
            <div class="col-md-12 p-2">
                <div class="text-center">
                    <?php
                        if(isset($_SESSION['admin_email'])){
                            echo "
                            <button class='btn btn-sm'  style='background-color: #344055;' style='background-color: #344055;'>
                                <a href='insert_product.php' class='btn text-white'>
                                    Insert Products
                                </a>
                            </button>
                            <button class='btn btn-sm'  style='background-color: #344055;'>
                                <a href='index.php?view_products' class='btn text-white'>
                                    View Products
                                </a>
                            </button>
                            <button class='btn btn-sm'  style='background-color: #344055;'>
                                <a href='index.php?insert_category' class='btn text-white '>
                                    Insert Categories
                                </a>
                            </button>
                            <button class='btn btn-sm'  style='background-color: #344055;'>
                                <a href='index.php?view_category' class='btn text-white'>
                                    View Categories
                                </a>
                            </button>
                            <button class='btn btn-sm'  style='background-color: #344055;'>
                                <a href='index.php?insert_brand' class='btn text-white'>
                                    Insert Brand
                                </a>
                            </button>
                            <button class='btn btn-sm'  style='background-color: #344055;'>
                                <a href='index.php?view_brands' class='btn text-white'>
                                    View Brand
                                </a>
                            </button>
                            <button class='btn btn-sm'  style='background-color: #344055;'>
                                <a href='index.php?view_orders' class='btn text-white'>
                                    All Orders
                                </a>
                            </button>
                            <button class='btn btn-sm'  style='background-color: #344055;'>
                                <a href='index.php?view_payments' class='btn text-white'>
                                    All Payment
                                </a>
                            </button>
                            <button class='btn btn-sm'  style='background-color: #344055;'>
                                <a href='index.php?view_users' class='btn text-white'>
                                    List Users
                                </a>
                            </button>
                            <button class='btn btn-sm'  style='background-color: #344055;'>
                                <a href='admin_logout.php' class='btn text-white'>
                                    Admin Logout
                                </a>
                            </button>
                            ";
                        }else{
                            echo"<div class='mt-10'>
                                    <h5><a href='admin_login.php' class='nav-link text-danger'>Login</a></h5> to perform Admin's action!
                                </div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Fourth Child -->
    <div class="container my-3">
        <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_products'])){
                include('delete_products.php');
            }
            if(isset($_GET['view_category'])){
                include('view_categories.php');
            }
            if(isset($_GET['edit_categories'])){
                include('edit_categories.php');
            }
            if(isset($_GET['delete_categories'])){
                include('delete_categories.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_brands'])){
                include('edit_brands.php');
            }
            if(isset($_GET['delete_brands'])){
                include('delete_brands.php');
            }
            if(isset($_GET['view_orders'])){
                include('view_orders.php');
            }
            if(isset($_GET['view_payments'])){
                include('view_payments.php');
            }
            if(isset($_GET['view_users'])){
                include('view_users.php');
            }
        ?>
    </div>
    <!-- Last Content -->
    <div class="p-1" style="background-color: #eeeee4; bottom:0; width:100%">
        <p class="text-center">&copy; Meilinda & Keyko</p>
    </div>
    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>