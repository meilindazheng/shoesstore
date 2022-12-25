<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
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
        <h2 class="text-center">Admin Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <!-- username -->
                        <label for="admin_username" class="form-label">Admin name</label>
                        <input type="text" id="admin_username" class="form-control" placeholder="Name" autocomplete="off" required="required" name="admin_username">
                    </div>
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
                    <div class="form-outline mb-4">
                        <!-- confirm password -->
                        <label for="conf_admin_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_admin_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="conf_admin_password">
                    </div>
                    <div >
                        <input type="submit" value="Register" class="text-white border-0 p-2 my-2 rounded" style="background-color: #344055;" name="admin_register">
                        <p class="small fw-bold mt-2 pt-1">Already have account? <a href="admin_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<!-- php logic -->
<?php
    if(isset($_POST['admin_register'])){
        $admin_username = $_POST['admin_username'];
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];
        $conf_admin_password = $_POST['conf_admin_password'];

        // select query
        $select_query = "SELECT * FROM `user_table` WHERE user_name = '$admin_username' OR user_email = '$admin_email'";
        $result = mysqli_query($conn,$select_query);
        $num_of_rows = mysqli_num_rows($result);
        if($num_of_rows>0){
            echo "<script>alert('Username or email already exist!')</script>";
        }else if($admin_password != $conf_admin_password){
            echo "<script>alert('Password doesn't match!')</script>";
        }
        else{
            $insert_query = "INSERT INTO `user_table` (user_id, user_name,user_email,user_password,user_role)
            VALUES('','$admin_username', '$admin_email','$admin_password ','Admin')";
            $sql_execute = mysqli_query($conn,$insert_query);
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
    }
    
?>