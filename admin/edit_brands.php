<?php
    if(isset($_GET['edit_brands'])){
        $edit_id = $_GET['edit_brands'];
        $get_brand = "SELECT * FROM `brands` WHERE brand_id = $edit_id ";
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
    <h3 class="text-center">Edit Brand</h3>
        <form action="" method="post">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="brand_title" class="form-label">Brand Title</label>
                <input type="text" id="brand_title" name="brand_title" class="form-control" value="<?php echo $brand_title?>">
            </div>
            <div class="text-center">
                <input type="submit" value="Update Brands" class="text-white border-0 p-2 my-2 rounded mt-3"  style="background-color: #344055;" name = "update_brand">
            </div>
        </form>
</body>
</html>

<?php
    if(isset($_POST['update_brand'])){
        $brand_title_update = $_POST['brand_title'];
        $update_brand = "UPDATE `brands` SET brand_title = '$brand_title_update' WHERE brand_id = $edit_id";
        $run_update_brand = mysqli_query($conn,$update_brand);
        if($run_update_brand){
            echo"<script>alert('Succeed Updating!')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        }
    }
?>