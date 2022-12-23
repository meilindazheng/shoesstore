<?php
    if(isset($_GET['edit_categories'])){
        $edit_id = $_GET['edit_categories'];
        $get_category = "SELECT * FROM `categories` WHERE category_id = $edit_id ";
        $run_get_category = mysqli_query($conn,$get_category);

        $data_category = mysqli_fetch_assoc($run_get_category);
        $category_id = $data_category['category_id'];
        $category_title = $data_category['category_title'];
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
    <h3 class="text-center">Edit Category</h3>
    <form action="" method="post">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" id="category_title" name="category_title" class="form-control" value="<?php echo $category_title?>">
        </div>
        <div class="text-center">
            <input type="submit" value="Update Category" class="text-white border-0 p-2 my-2 rounded mt-3"  style="background-color: #344055;" name = "update_category">
        </div>
    </form>
</body>
</html>

<?php
    if(isset($_POST['update_category'])){
        $category_title_update = $_POST['category_title'];
        $update_category = "UPDATE `categories` SET category_title = '$category_title_update' WHERE category_id = $edit_id";
        $run_update_category = mysqli_query($conn,$update_category);
        if($run_update_category){
            echo"<script>alert('Succeed Updating!')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        }
    }
?>