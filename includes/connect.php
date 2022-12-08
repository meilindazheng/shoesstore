<?php
    $conn = mysqli_connect('localhost','root','','shoes_store');
    if(!$conn){
        mysqli_error($conn);
    }
?>