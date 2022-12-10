<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
        $product_title = $_POST['product_title'];
        $product_description = $_POST['description'];
        $product_keyword = $_POST['keywords'];
        $product_category = $_POST['product_categories'];
        $product_brand = $_POST['product_brand'];
        // Accessing Image
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        // Accessing Image Temp Name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];
        
        $product_price = $_POST['product_price'];
        $product_status = 'true';

        if($product_title=='' or $product_description=='' or $product_keyword == ''
        or $product_category=='' or $product_brand=='' or $product_price==''){
            echo"
                <script>
                    alert('Please Fill All the Field');
                </script>
            ";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");
            // insert product
            $insert_products = "INSERT INTO `products`(product_title,product_description,product_keywords, category_id,brand_id, product_image1,product_image2,product_image3,product_price,date,status)
            VALUES('$product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

            $result_query = mysqli_query($conn,$insert_products);
            if($result_query){
                echo"
                    <script>
                        alert('Data Succesfully Added');
                    </script>
                ";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #344055;">
    <div class="container mt-3">
        <h2 class="text-center text-white mb-1">
            Insert Products
        </h2>
        <!-- Form Insert Products -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Product Title -->
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_title" class="form-label"><p class="text-white mb-0">Product Title</p></label>
                <input type="text" name ="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required"></input>
            </div>
            <!-- Product Description -->
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="description" class="form-label"><p class="text-white mb-0">Description</p></label>
                <input type="text" name ="description" id="description" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required"></input>
            </div>
            <!-- Product Keyword -->
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="keywords" class="form-label"><p class="text-white mb-0">Keyword</p></label>
                <input type="text" name ="keywords" id="keywords" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required"></input>
            </div>
            <!-- categories -->
            <div class="form-outline mb-3 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                        $select_categories = "SELECT * FROM `categories`";
                        $result_categories = mysqli_query($conn,$select_categories);
                        while($row_data = mysqli_fetch_assoc($result_categories)){
                            $category_title = $row_data['category_title'];
                            $category_id = $row_data['category_id'];
                            echo " 
                            <option value='$category_id'>$category_title</option>
                            ";
                        }
                    ?>
                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-3 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                        $select_brands = "SELECT * FROM `brands`";
                        $result_brands = mysqli_query($conn, $select_brands);
                        while($row_data = mysqli_fetch_assoc($result_brands)){
                            $brand_title = $row_data['brand_title'];
                            $brand_id = $row_data['brand_id'];
                            echo "
                            <option value='$brand_id'>$brand_title</option>
                            ";
                        }
                    ?>
                </select>
            </div>
            <!-- Product Image 1 -->
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_image1" class="form-label"><p class="text-white mb-0">Product Image </p></label>
                <input type="file" name ="product_image1" id="product_image1" class="form-control"required="required"></input>
            </div>
            <!-- Product Image 2 -->
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_image2" class="form-label"><p class="text-white mb-0">Product Image </p></label>
                <input type="file" name ="product_image2" id="product_image2" class="form-control"required="required"></input>
            </div>
            <!-- Product Image 3 -->
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_image3" class="form-label"><p class="text-white mb-0">Product Image </p></label>
                <input type="file" name ="product_image3" id="product_image3" class="form-control"required="required"></input>
            </div>
            <!-- Product Price -->
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_price" class="form-label"><p class="text-white mb-0">Price</p></label>
                <input type="text" name ="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required"></input>
            </div>
            <!-- Submit Button -->
            <div class="form-outline mb-3 w-50 m-auto">
            <input type="submit" class="text-white border-0 p-2 my-2 rounded mb-3 px-3"name="insert_product" value="Insert Products" style="background-color: black;" aria-label="Insert Products" aria-describedby="basic-addon1"  style="background-color: #344055;">
            </div>
        </form>
    </div>
</body>
</html>