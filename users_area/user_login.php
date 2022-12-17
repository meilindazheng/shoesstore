<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    @session_start();
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
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
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
                    <div >
                        <input type="submit" value="Login" class="text-white border-0 p-2 my-2 rounded" style="background-color: #344055;" name="user_login">
                        <p class="small fw-bold mt-2 pt-1">Don't have account? <a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- logic php -->
<?php
    if(isset($_POST['user_login'])){
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $select_query = "SELECT * FROM `user_table` WHERE user_email = '$user_email'";
        $result = mysqli_query($conn,$select_query);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);

        $get_ip_adds = getIPAddress();
        
        
        $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_adds'";
        $select_cart = mysqli_query($conn,$select_query_cart);
        $row_count_cart = mysqli_num_rows($select_cart);
        if($row_count>0){
            $_SESSION['email'] = $user_email;
            if($user_password = $row_data['user_password']){
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['email'] = $user_email;
                    echo "<script>window.open('profile.php','_self')</script>";
                }else{
                    $_SESSION['email'] = $user_email;
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
                echo "<script>alert('xx')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
?>