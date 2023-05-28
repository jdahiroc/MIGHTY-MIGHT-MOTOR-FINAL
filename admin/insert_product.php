<?php
include('../admin/connect.php');

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_price = $_POST['product_price'];
    $product_status = "true";
    // accessing images shesshh
    $product_image = $_FILES['product_image']['name'];
    // accessing image tmp_name
    $temp_image = $_FILES['product_image']['tmp_name'];


    //checks empty condition
    if ($product_title == '' or $product_description == '' or $product_keywords == '' or $product_image == '' or $product_price == '') {
        echo "<script>alert('Please Fill in the fields!')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image, "./uploaded_product_images/$product_image");
    }

    // query for insert products
    $query = "Insert into `product` (item_name, item_description, item_keyword, item_image, item_price, date, status) values ('$product_title', '$product_description', '$product_keywords', '$product_image', '$product_price', NOW(), $product_status)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Product Added Succesfully!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS link -->
    <link rel="stylesheet" href="../css/insert_product.css">;

    <!-- tab icon link -->
    <link rel=" shortcut icon" type="image/x-icon" href="/MIGHTY-MIIGHT-MOTOR/img/head-icon.ico" />

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Insert Product</title>
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Add Product</h1>
        <!-- forms -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- product title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control"
                    placeholder="Enter Description" autocomplete="off" required="required">
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                    placeholder="Enter Keywords" autocomplete="off" required="required">
            </div>
            <!-- image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Add Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control" required="required">
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Add Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                    placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>
            <!-- submit button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-dark mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
</body>

</html>