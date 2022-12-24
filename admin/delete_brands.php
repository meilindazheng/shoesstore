<?php

    if(isset($_GET['delete_brands'])){
        $delete_id = $_GET['delete_brands'];
        $delete_product = "DELETE FROM `brands`WHERE brand_id = $delete_id ";
        $run_delete_product = mysqli_query($conn,$delete_product);
        if(isset($run_delete_product)){
            echo "<script>alert('Data succesfully deleted!')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        }
    }
?>