<?php
    if(isset($_GET['edit_products'])){
        $edit_id = $_GET['edit_products'];
        $get_product_query = "SELECT * FROM `products` WHERE product_id = $edit_id";
        $run_get_product_query = mysqli_query($conn,$get_product_query);
        $data_product = mysqli_fetch_assoc($run_get_product_query);

        // data product
        $product_id = $data_product['product_id'];
        $product_title = $data_product['product_title'];
        $product_description = $data_product['product_description'];
        $product_keywords = $data_product['product_keywords'];
        $product_category = $data_product['category_id'];
        $product_brand = $data_product['brand_id'];
        $product_image1 = $data_product['product_image1'];
        $product_image2 = $data_product['product_image2'];
        $product_image3 = $data_product['product_image3'];
        $product_price = $data_product['product_price'];

        // fetching category 
        $get_category = "SELECT * FROM `categories` WHERE category_id = $product_category";
        $run_get_category = mysqli_query($conn,$get_category);
        $data_category = mysqli_fetch_assoc($run_get_category);
        $category_id = $data_category['category_id'];
        $category_title = $data_category['category_title'];
        
        // fetching brands
        $get_brand = "SELECT * FROM `brands` WHERE brand_id = $product_brand";
        $run_get_brand = mysqli_query($conn,$get_brand);
        $data_brand = mysqli_fetch_assoc($run_get_brand);
        $brand_id = $data_brand['brand_id'];
        $brand_title = $data_brand['brand_title'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" value="<?php echo $product_title?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" name="product_description" class="form-control" value="<?php echo $product_description ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" class="form-control" value="<?php echo $product_keywords ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label">Product Category</label>
                <select name="product_category" id="product_category" class="form-select">
                    <option value="<?php echo $category_id?>"><?php echo $category_title?></option>
                    <?php
                    $get_category = "SELECT * FROM `categories` WHERE NOT category_title = '$category_title'";
                    $run_get_category = mysqli_query($conn,$get_category);
                    while($data_category = mysqli_fetch_assoc($run_get_category)){
                        $category_id = $data_category['category_id'];
                        $category_title = $data_category['category_title'];
                        echo "<option value=$category_id>$category_title</option> ";
                    };
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_brand" class="form-label">Product Brand</label>
                <select name="product_brand" id="product_brand" class="form-select">
                    <option value="<?php echo $brand_id?>"><?php echo $brand_title?></option>
                    <?php
                    $get_brand = "SELECT * FROM `brands`";
                    $run_get_brand = mysqli_query($conn,$get_brand);
                    while($data_brand = mysqli_fetch_assoc($run_get_brand)){
                        $brand_id = $data_brand['brand_id'];
                        $brand_title = $data_brand['brand_title'];
                        echo "<option value='$brand_id'>$brand_title</option> ";
                    };
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <div class="d-flex">
                    <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto">
                    <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="image_size" style="width:50px; object-fit:contain;">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <div class="d-flex">
                    <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto">
                    <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="image_size" style="width:50px; object-fit:contain;">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <div class="d-flex">
                    <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto">
                    <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="image_size" style="width:50px; object-fit:contain;">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" class="form-control" value=<?php echo $product_price ?>>
            </div>
            <div class="text-center">
            <input type="submit" value="Update Product" class="text-white border-0 p-2 my-2 rounded mt-3"  style="background-color: #344055;" name = "update_product">
            </div>
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST['update_product'])){
        $product_title_update = $_POST['product_title'];
        $product_description_update = $_POST['product_description'];
        $product_keywords_update = $_POST['product_keywords'];
        $product_category_update = $_POST['product_category'];
        $product_brand_update = $_POST['product_brand'];
        $product_price_update = $_POST['product_price'];

        $product_image1_update = $_FILES['product_image1']['name'];
        $product_image2_update = $_FILES['product_image2']['name'];
        $product_image3_update = $_FILES['product_image3']['name'];

        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        
        move_uploaded_file($temp_image1,"./product_images/$product_image1_update");
        move_uploaded_file($temp_image2,"./product_images/$product_image2_update");
        move_uploaded_file($temp_image3,"./product_images/$product_image3_update");

        $update_query = "UPDATE `products` SET brand_id = $product_brand_update, category_id = $product_category_update,
                        product_title = '$product_title_update', product_description = '$product_description_update',
                        product_keywords = '$product_keywords_update',
                        product_price = '$product_price_update',
                        product_image1 = '$product_image1_update',
                        product_image2 = '$product_image2_update',
                        product_image3 = '$product_image3_update'
                        WHERE product_id = $edit_id";
        $run_update_query = mysqli_query($conn,$update_query);
        if($run_update_query){
            echo"<script>alert('Succeed Updating!')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        }else{
            echo"<script>alert('Succeed Updating!')</script>";
        }
    }
?>