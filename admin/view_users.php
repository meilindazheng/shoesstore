<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center">All Payments</h3>
        <table class="table table-bordered mt-3" >
            <thead style="background-color: #344055;" class="text-white text-center">
                <th>No</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Address</th>
                <th>User Mobile</th>
            </thead>
            <tbody>
            <?php
                $get_order = "SELECT * FROM `user_table` WHERE user_role = 'User'";
                $run_get_order = mysqli_query($conn,$get_order);
                $order_number = mysqli_num_rows($run_get_order);
                if($order_number==0){
                    echo "<h2 class='text-center'>No Orders</h2>";
                }else{
                    $no = 0;
                    while ($data_order = mysqli_fetch_assoc($run_get_order)){
                        $user_name = $data_order['user_name'];
                        $user_email = $data_order['user_email'];
                        $user_address = $data_order['user_address'];
                        $user_mobile = $data_order['user_mobile'];
                        $no++;?>

                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $user_name?></td>
                            <td><?php echo $user_email ?></td>
                            <td><?php echo $user_address ?></td>
                            <td><?php echo $user_mobile ?></td>
                        </tr>
                    <?php
                    }
                }
            ?>
            </tbody>
        </table>
</body>
</html>