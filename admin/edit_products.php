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
                <input type="text" id="product_title" name="product_title" class="form-control">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" name="product_description" class="form-control">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" class="form-control">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label">Product Category</label>
                <select name="product_category" id="product_category" class="form-select">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_brand" class="form-label">Product Brand</label>
                <select name="product_brand" id="product_brand" class="form-select">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <div class="d-flex">
                    <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto">
                    <img src="./product_images/nike_2.jpeg" alt="" class="image_size" style="width:50px; object-fit:contain;">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <div class="d-flex">
                    <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto">
                    <img src="./product_images/nike_2.jpeg" alt="" class="image_size" style="width:50px; object-fit:contain;">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <div class="d-flex">
                    <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto">
                    <img src="./product_images/nike_2.jpeg" alt="" class="image_size" style="width:50px; object-fit:contain;">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" class="form-control">
            </div>
            <div class="text-center">
            <input type="submit" value="Update Product" class="text-white border-0 p-2 my-2 rounded mt-3"  style="background-color: #344055;" name = "update_product">
            </div>
        </form>
    </div>
</body>
</html>