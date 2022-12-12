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
                                <p class='card-text'>Price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:black; color:white;' >Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn' style='background-color:white; color:black; border: 1px solid black;'>View More</a>
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
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:black; color:white;' >Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn' style='background-color:white; color:black; border: 1px solid black;'>View More</a>
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
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:black; color:white;' >Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn' style='background-color:white; color:black; border: 1px solid black;'>View More</a>
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
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:black; color:white;' >Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn' style='background-color:white; color:black; border: 1px solid black;'>View More</a>
                        </div>
                    </div>
                </div>
                ";
            };
        }
    }

    // getting all products
    function get_all_products(){
        global $conn;
        // condition to check isset
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
                $select_query = "SELECT * FROM `products` ORDER BY rand()";
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
                                <p class='card-text'>Price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:black; color:white;' >Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn' style='background-color:white; color:black; border: 1px solid black;'>View More</a>
                            </div>
                        </div>
                    </div>
                    ";
                };
            }
        }
    }

    // view details logic function
    function view_details(){
        global $conn;
        // condition to check isset
        if(isset($_GET['product_id'])){
            if(!isset($_GET['category'])){
                if(!isset($_GET['brand'])){
                    $product_id = $_GET['product_id'];
                    $select_query = "SELECT * FROM `products`WHERE product_id = $product_id ";
                    $result_query = mysqli_query($conn,$select_query);
                    while($row_data = mysqli_fetch_assoc($result_query)){
                        $product_id = $row_data['product_id'];
                        $product_title = $row_data['product_title'];
                        $product_description = $row_data['product_description'];
                        $category_id = $row_data['category_id'];
                        $brand_id = $row_data['brand_id'];
                        $product_image1 = $row_data['product_image1'];
                        $product_image2 = $row_data['product_image2'];
                        $product_image3 = $row_data['product_image3'];
                        $product_price = $row_data['product_price'];
                        echo"
                        <div class='col-md-4'>
                            <!-- card -->
                            <div class='card'>
                                <img class='card-img-top'style='height:400px;' src='./admin/product_images/$product_image1' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:black; color:white;' >Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-8'>
                            <!-- related products -->
                            <div class='row'>
                                <div class='col-md-12 mb-3'>
                                    <h4 class='text-center'>Similar Products</h4>
                                    <h6 class='text-center'>All Size Ready! Do Notes on Order</h6>
                                </div>
                                <div class='col-md-6 text-center mb-1'>
                                    <img class='card-img-top'style='height:300px; width:300px;' src='./admin/product_images/$product_image2' alt='Card image cap'>
                                </div>
                                <div class='col-md-6 text-center mb-1'>
                                    <img class='card-img-top'style='height:300px; width:300px;' src='./admin/product_images/$product_image3' alt='Card image cap'>
                                </div>
                                <div class='col-md-12 text-center'>
                                    <h4 class='text-center'>Size charts</h4>
                                    <table class='table table-striped'>
                                        <thead class='thead-dark'>
                                            <tr>
                                            <th>UK</th>
                                            <th>USA</th>
                                            <th>AUS</th>
                                            <th>EU</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>4<sup>1</sup>/<sub>2</sub></td>
                                                <td>37</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5<sup>1</sup>/<sub>2</sub></td>
                                                <td>38</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>6</td>
                                                <td>6<sup>1</sup>/<sub>2</sub></td>
                                                <td>39</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>7</td>
                                                <td>7<sup>1</sup>/<sub>2</sub></td>
                                                <td>40</td>
                                            </tr>
                                        </tbody>
                                    </table>                                
                                </div>
                            </div>
                        </div>
                        ";
                    };
                }
            }
        }
    }

    // get IP function 
    function getIPAddress() {  
    //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
    //whether ip is from the remote address  
        else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }  
    return $ip;  
    }  
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  

    // cart function
    function cart(){
        if(isset($_GET['add_to_cart'])){
            global $conn;
            $get_ip_adds = getIPAddress();
            $get_product_id = $_GET['add_to_cart'];
            $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_adds' AND product_id = $get_product_id";
            $result_query = mysqli_query($conn,$select_query);
            $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows > 0){
                echo "
                    <script>
                        alert('This Item is Already Present Inside Cart');
                    </script>
                ";
                echo "
                    <script>
                        window.open('index.php','_self')
                    </script>
                ";
            }else{
                $insert_query = "INSERT INTO `cart_details` (product_id, ip_address,quantity,size)
                VALUES ($get_product_id,'$get_ip_adds',1,35)
                ";
                $result_query = mysqli_query($conn,$insert_query);
                echo "
                    <script>
                        alert('Dat Added to Cart');
                    </script>
                ";
                echo "
                    <script>
                        window.open('index.php','_self')
                    </script>
                ";
            }
        }
    }

    // function to get cart item number
    function cart_item(){
        if(isset($_GET['add_to_cart'])){
            global $conn;
            $get_ip_adds = getIPAddress();
            $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_adds'";
            $result_query = mysqli_query($conn,$select_query);
            $num_of_rows = mysqli_num_rows($result_query);
        }else{
            global $conn;
            $get_ip_adds = getIPAddress();
            $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_adds'";
            $result_query = mysqli_query($conn,$select_query);
            $num_of_rows = mysqli_num_rows($result_query);
        }
        echo $num_of_rows;
    }

    // total price function
    function total_cart_price(){
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
                $product_values = array_sum($product_price);
                $total+= $product_values;
            }
        }
        echo $total;
    }
?>