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
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <!-- username -->
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Name" autocomplete="off" required="required" name="user_username">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- email -->
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- password -->
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- confirm password -->
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- address -->
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Name" autocomplete="off" required="required" name="user_address">
                    </div>
                    <div class="form-outline mb-2">
                        <!-- contact -->
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Name" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div >
                        <input type="submit" value="Register" class="text-white border-0 p-2 my-2 rounded" style="background-color: #344055;" name="user_register">
                        <p class="small fw-bold mt-2 pt-1">Already have account? <a href="user_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php logic -->
<?php
    if(isset($_POST['user_register'])){
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $conf_user_password = $_POST['conf_user_password'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_ip = getIPAddress();


        // select query
        $select_query = "SELECT * FROM `user_table` WHERE user_name = '$user_username' OR user_email = '$user_email'";
        $result = mysqli_query($conn,$select_query);
        $num_of_rows = mysqli_num_rows($result);
        if($num_of_rows>0){
            echo "<script>alert('Username already exist!')</script>";
        }else if($user_password != $conf_user_password){
            echo "<script>alert('Password doesn't match!')</script>";
        }
        else{
            $insert_query = "INSERT INTO `user_table` 
            VALUES('','$user_username', '$user_email','$user_password','$user_ip','$user_address','$user_contact')";
            $sql_execute = mysqli_query($conn,$insert_query);
        }
    }

?>