<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
<div class="container-fluid m-3">
        <h2 class="text-center">Admin Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <!-- email -->
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" id="admin_email" class="form-control" placeholder="Email" autocomplete="off" required="required" name="admin_email">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- password -->
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Password" autocomplete="off" required="required" name="admin_password">
                    </div>
                    <div >
                        <input type="submit" value="Login" class="text-white border-0 p-2 my-2 rounded" style="background-color: #344055;" name="admin_login">
                        <p class="small fw-bold mt-2 pt-1">Don't have account? <a href="admin_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php

if(isset($_POST['admin_login'])){
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $select_query = "SELECT * FROM `user_table` WHERE user_email = '$admin_email' AND user_password = '$admin_password'";
    $result = mysqli_query($conn,$select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    if($row_count == 1){
        $_SESSION['admin_email'] = $admin_email;
        echo"<script>window.open('../admin/index.php','_self')</script>";
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>