<?php
include('./includes/connect.php');

// getting products

    function getproducts(){
        global $conn;
        // condition to check isset
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
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
            }
        }
    }

    // getting unique categories
    function get_unique_categories(){
        global $conn;
        // condition to check isset
        if(isset($_GET['category'])){
            $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` WHERE category_id = $category_id";
        $result_query = mysqli_query($conn,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h3 class='text-center'>No Stock Available</h3>";
        }
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
        }
    }

    function getbrands(){
        global $conn;
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
    }

    // getting unique brands
    function get_unique_brands(){
        global $conn;
        // condition to check isset
        if(isset($_GET['brand'])){
            $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM `products` WHERE brand_id = $brand_id";
        $result_query = mysqli_query($conn,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h3 class='text-center'>No Stock Available</h3>";
        }
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
        }
    }

    function getcategories(){
        global $conn;
        $select_categories = "SELECT * FROM `categories`";
        $result_categories = mysqli_query($conn,$select_categories);
        while($row_data = mysqli_fetch_assoc($result_categories)){
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo 
            " 
                <li class='nav-item text-white'>
                <a href='index.php?category=$category_id' class='nav-link'>$category_title</a>
                </li>"
            ;
        }
    }

    function search_product(){
        global $conn;
        $search_data_value = $_GET['search_data'];
        if(isset($_GET['search_data_product'])){
            // condition to check isset
            $search_query ="SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
            $result_query = mysqli_query($conn,$search_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo "<h3 class='text-center'>No Stock Available</h3>";
            }
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
        }
    }
?>