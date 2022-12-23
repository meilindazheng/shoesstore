<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pimage{
            width:100px;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <h3 class="text-center">All Products</h3>
    <table class="table table-bordered mt-3" >
        <thead style="background-color: #344055;" class="text-white text-center">
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
                $get_data_query = "SELECT * FROM `products`";
                $run_get_data_query = mysqli_query($conn,$get_data_query);
                while($data_product = mysqli_fetch_assoc($run_get_data_query)){
                    $product_id = $data_product['product_id'];
                    $product_title = $data_product['product_title'];
                    $product_image1 = $data_product['product_image1'];
                    $product_price = $data_product['product_price'];
                    $product_status = $data_product['status'];?>
                    <tr>
                        <td><?php echo $product_id ?></td>
                        <td><?php echo $product_title ?></td>
                        <td class = 'text-center'><img src='./product_images/<?php echo $product_image1 ?>' alt='' class='pimage'></td>
                        <td><?php echo $product_price?></td>
                        <td>
                            <?php
                            $number =0;
                                $get_count = "SELECT * FROM `orders_pending` WHERE product_id = $product_id";
                                $run_get_count = mysqli_query($conn,$get_count);
                                while($get_count_data = mysqli_fetch_assoc($run_get_count)){
                                    $quantity_sold = $get_count_data['quantity'];
                                    $number+= $quantity_sold;
                                }
                                echo $number;
                            ?>
                        </td>
                        <td><?php echo $product_status?></td>
                        <td class='text-center'><a href='index.php?edit_products=<?php echo $product_id ?>'><i class='fa-solid fa-pen-to-square' style='color: #344055;'></i></a></td>
                        <td class='text-center'><a href=''><i class='fa-solid fa-trash' style='color: #344055;'></i></a></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>