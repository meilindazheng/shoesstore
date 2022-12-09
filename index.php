<?php
    include('includes/connect.php');
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
        <nav class="navbar navbar-expand-lg navbar-fixed-top" style="background-color: #344055;">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="background-color: #344055;" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Total Price : $0</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success text-white" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
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
    <!-- Fourth Child -->
    <div class="row">
        <div class="col-md-10">
            <!-- display products -->
            <div class="row px-3">
                <!-- fetching products from database -->
                <?php
                    $select_query = "SELECT * FROM `products` ORDER BY rand() limit 0,6";
                    $result_query = mysqli_query($conn,$select_query);
                    while($row_data = mysqli_fetch_assoc($result_query)){
                        $product_id = $row_data['product_id'];
                        $product_title = $row_data['product_title'];
                        $product_description = $row_data['product_description'];
                        $category_id = $row_data['category_id'];
                        $brand_id = $row_data['brand_id'];
                        $product_image1 = $row_data['product_image1'];
                        $product_price = $row_data['product_price'];
                        echo"
                        <div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img class='card-img-top'style='height:400px;' src='./admin/product_images/$product_image1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='#' class='btn' style='background-color:black; color:white;' >Add to Cart</a>
                                    <a href='#' class='btn' style='background-color:white; color:black; border: 1px solid black;'>View More</a>
                                </div>
                            </div>
                        </div>
                        ";
                    };
                ?>
            </div>
        </div>
        <!-- row ends -->
        <div class="col-md-2 p-0" style="background-color: #344055;">
            <!-- display sidenav [brand] -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item" style="background-color: #f2f2f3;">
                    <a href="#" class="nav-link"><h6>Brand</h6></a>
                </li>
                <?php
                    $select_brands = "SELECT * FROM `brands`";
                    $result_brands = mysqli_query($conn,$select_brands);
                    while($row_data = mysqli_fetch_assoc($result_brands)){
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        echo " 
                            <li class='nav-item text-white'>
                            <a href='index.php?brand=$brand_id' class='nav-link'>$brand_title</a>
                            </li>"
                        ;
                    }
                ?>
            </ul>
            <!-- display sidenav [category] -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item" style="background-color: #f2f2f3;">
                    <a href="#" class="nav-link"><h6>Category</h6></a>
                </li>
                <?php
                    $select_categories = "SELECT * FROM `categories`";
                    $result_categories = mysqli_query($conn,$select_categories);
                    while($row_data = mysqli_fetch_assoc($result_categories)){
                        $category_title = $row_data['category_title'];
                        $category_id = $row_data['category_id'];
                        echo " 
                            <li class='nav-item text-white'>
                            <a href='index.php?category=$category_id' class='nav-link'>$category_title</a>
                            </li>"
                        ;
                    }
                ?>
            </ul>
        </div>
    </div>
    <!-- Last Child -->
    <div class="p-1" style="background-color: #eeeee4">
        <p class="text-center">&copy; Meilinda & Keyko</p>
    </div>
    </div>
    <!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>