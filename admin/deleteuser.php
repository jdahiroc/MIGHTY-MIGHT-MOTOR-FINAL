<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $query = "DELETE from user WHERE user_id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:UserManagementInterface.php');
    } else {
        die(mysqli_error($conn));
    }
}

?>