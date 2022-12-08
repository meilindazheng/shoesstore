<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
        $category_title = $_POST['cat_title'];

        // select query
        $select_query = "SELECT * FROM `categories` WHERE category_title = '$category_title'";
        $result_select = mysqli_query($conn,$select_query);
        $number_selected = mysqli_num_rows($result_select);
        if($number_selected>0){
            echo "
            <script>
                alert('Category Already Exists!');
            </script>
            ";
        }else{
            // insert query
            $insert_query = "INSERT INTO `categories` (category_title) values ('$category_title')";
            $result = mysqli_query($conn,$insert_query);
            if($result){
                echo "
                <script>
                    alert('Category Succesfully Added!');
                </script>
                ";
            }
        }
    }
?>

<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text text-white" id="basic-addon1"  style="background-color: #344055;">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control"name="cat_title" placeholder="Category" aria-label="Insert Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="text-white border-0 p-2 my-2 rounded"name="insert_cat" value="Insert Categories" style="background-color: #344055;" aria-label="Insert Categories" aria-describedby="basic-addon1"  style="background-color: #344055;">
    </div>
</form>