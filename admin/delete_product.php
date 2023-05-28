<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $delete_product = $_GET['deleteid'];
    // echo $delete_product;

    $delete_query = ("Delete from `product` where product_id=$delete_product");
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        header('location:ProductInterface.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>