<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    // session_start();
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
                            <li class="nav-item">
                                <a href="" class="nav-link text-white">Welcome Guest</a>
                            </li>
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
                    <button class="btn btn-sm"  style="background-color: #344055;" style="background-color: #344055;">
                        <a href="insert_product.php" class="btn text-white">
                            Insert Products
                        </a>
                    </button>
                    <button class="btn btn-sm"  style="background-color: #344055;">
                        <a href="index.php?view_products" class="btn text-white">
                            View Products
                        </a>
                    </button>
                    <button class="btn btn-sm"  style="background-color: #344055;">
                        <a href="index.php?insert_category" class="btn text-white ">
                            Insert Categories
                        </a>
                    </button>
                    <button class="btn btn-sm"  style="background-color: #344055;">
                        <a href="" class="btn text-white">
                            View Categories
                        </a>
                    </button>
                    <button class="btn btn-sm"  style="background-color: #344055;">
                        <a href="index.php?insert_brand" class="btn text-white">
                            Insert Brand
                        </a>
                    </button>
                    <button class="btn btn-sm"  style="background-color: #344055;">
                        <a href="" class="btn text-white">
                            View Brand
                        </a>
                    </button>
                    <button class="btn btn-sm"  style="background-color: #344055;">
                        <a href="" class="btn text-white">
                            All Orders
                        </a>
                    </button>
                    <button class="btn btn-sm"  style="background-color: #344055;">
                        <a href="" class="btn text-white">
                            All Payment
                        </a>
                    </button>
                    <button class="btn btn-sm"  style="background-color: #344055;">
                        <a href="" class="btn text-white">
                            List Users
                        </a>
                    </button>
                    <button class="btn btn-sm"  style="background-color: #344055;">
                        <a href="" class="btn text-white">
                            Admin Logout
                        </a>
                    </button>
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