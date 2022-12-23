<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center">All Categories</h3>
    <table class="table table-bordered mt-3" >
        <thead style="background-color: #344055;" class="text-white text-center">
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
                $get_category = "SELECT * FROM `categories`";
                $run_get_category  = mysqli_query($conn,$get_category);
                while($data_category = mysqli_fetch_assoc($run_get_category)){
                    $category_id = $data_category['category_id'];
                    $category_title = $data_category['category_title'];?>
                    <tr>
                        <td class="text-center"><?php echo $category_id ?></td>
                        <td class="text-center"><?php echo $category_title ?></td>
                        <td class='text-center'><a href='index.php?edit_categories=<?php echo $category_id ?>'><i class='fa-solid fa-pen-to-square' style='color: #344055;'></i></a></td>
                        <td class='text-center'><a href='index.php?delete_categories=<?php echo $category_id ?>'><i class='fa-solid fa-trash' style='color: #344055;'></i></a></td>
                    </tr>
                <?php
                }
                ?>
        </tbody>
    </table>
</body>
</html>