<?php
    if(isset($_GET['edit_account'])){
        $user_email = $_SESSION['email'];
        $select_user_query = "SELECT * FROM `user_table` WHERE user_email = '$user_email'";
        $run_select_user_query = mysqli_query($conn,$select_user_query);
        $fetch_select_user = mysqli_fetch_assoc($run_select_user_query);
        $user_id = $fetch_select_user['user_id'];
        $user_name = $fetch_select_user['user_name'];
        $user_email = $fetch_select_user['user_email'];
        $user_password = $fetch_select_user['user_password'];
        $user_address = $fetch_select_user['user_address'];
        $user_mobile = $fetch_select_user['user_mobile'];
    }
    if(isset($_POST['update_data'])){
        $update_id = $user_id;
        $user_name_update = $_POST['user_name'];
        $user_address_update = $_POST['user_address'];
        $user_mobile_update = $_POST['user_mobile'];
        $update_query = "UPDATE `user_table` SET user_name = '$user_name_update', user_address = '$user_address_update',user_mobile = '$user_mobile_update' WHERE user_id = $update_id";
        $run_update_query = mysqli_query($conn,$update_query);
        if($run_update_query){
            echo"<script>window.open('profile.php?edit_account','_self')</script>";
        }
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
    <h3 class="text-center mb-4">Edit Profile</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" id="user_name"name="user_name" class="form-control w-50 m-auto" value="<?php echo $user_name ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" name="user_address" class="form-control w-50 m-auto" value="<?php echo $user_address ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" name="user_mobile" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>">
        </div>
        <input type="submit" name ="update_data" class='text-white border-0 p-2 rounded'  style='background-color: #344055;'>
    </form>
</body>
</html>