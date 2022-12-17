
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
    <div class="container">
        <h2 class="text-center">Payment Options</h2>
        <?php
            // access user id login
            $email = $_SESSION['email'];
            $select_query_session = "SELECT * FROM `user_table` WHERE user_email = '$email'";
            $result = mysqli_query($conn,$select_query_session);
            $row_data = mysqli_fetch_assoc($result);
            $user_id = $row_data['user_id'];
            
        ?>
        <div class="container">
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>">Pay Now</a>
            </div>
        </div>
    </div>
</body>
</html>