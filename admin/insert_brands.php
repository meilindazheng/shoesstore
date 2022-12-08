<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_brand'])){
        $brand_title = $_POST['brand_title'];
        // select query
        $select_query = "SELECT * FROM `brands` WHERE brand_title = '$brand_title'";
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
            $insert_query = "INSERT INTO `brands` values ('','$brand_title')";
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
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text text-white" id="basic-addon1"  style="background-color: #344055;">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control"name="brand_title" placeholder="Brand" aria-label="Insert Brand" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="text-white border-0 p-2 my-2 rounded"name="insert_brand" value="Insert Brand" style="background-color: #344055;" aria-label="Insert Categories" aria-describedby="basic-addon1"  style="background-color: #344055;">
    </div>
</form>