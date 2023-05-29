<?php
require_once('../admin/connect.php');
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $barangay = $_POST['barangay'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $street_name = $_POST['streetname'];
    $postal = $_POST['postal'];
    $paymentmethod = $_POST['paymentmethod'];

    $query = "Insert into customertbl (cus_FName, cus_MName, cus_LName, phone_number, barangay, province, city, street_name, postal, paymentmethod) 
    values('$firstname', '$middlename', '$lastname', '$phonenumber', '$barangay', '$province', '$city', '$street_name', '$postal', '$paymentmethod')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Order Added Successfully!');</script>";
        header('location:/MIGHTY-MIIGHT-MOTOR/index.html');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" type="image/x-icon" href="/MIGHTY-MIIGHT-MOTOR/img/head-icon.ico" />
    <link rel="stylesheet" href="/MIGHTY-MIIGHT-MOTOR/css/CreateUserInterface.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />

    <script type="text/javascript" src="/MIGHTY-MIIGHT-MOTOR/scripts/CreateUser.js"></script>

    <title>Sign up</title>
</head>

<body>

</body>
<section>
    <header>
        <a href="/MIGHTY-MIIGHT-MOTOR/index.html"><img src="/MIGHTY-MIIGHT-MOTOR/img/logo.jpg" class="logo"
                alt="Mighty_Might_Motor" /></a>
    </header>
    <!--CONTENTS-->
    <div class="contents">
        <form method="post">
            <h1>Order Form</h1>
            <div class="grid gap-3">
                <div class="form-floating mt-3 g-col-6">
                    <input type="text" id="fname" name="firstname" placeholder="First Name" class="form-control"
                        autocomplete="off" required="required" />
                    <label for="floatingTextarea">First Name</label>
                </div>
                <div class="form-floating mt-3 g-col-6">
                    <input type="text" id="mname" name="middlename" placeholder="Middle Name" class="form-control"
                        autocomplete="off" required="required" />
                    <label for="floatingTextarea">Middle Name</label>
                </div>
                <div class="form-floating mt-3 g-col-6">
                    <input type="text" id="lname" name="lastname" placeholder="Last Name" class="form-control"
                        autocomplete="off" required="required" />
                    <label for="floatingTextarea">Last Name</label>
                </div>
                <div class="form-floating mt-3 g-col-6">
                    <input type="text" id="phonenumber" name="phonenumber" placeholder="Email" class="form-control"
                        maxlength="11" autocomplete="off" required="required" />
                    <label for="floatingTextarea">Phone Number</label>
                </div>
                <br />
                <hr />
                <h2>Address</h2>
                <div class="form-floating mt-3 g-col-6">
                    <input type="text" id="barangay" name="barangay" placeholder="Barangay" class="form-control"
                        autocomplete="off" required="required" />
                    <label for="floatingTextarea">Barangay</label>
                </div>
                <div class="form-floating mt-3 g-col-6">
                    <input type="text" id="province" name="province" placeholder="province" class="form-control"
                        autocomplete="off" required="required" />
                    <label for="floatingTextarea">Province</label>
                </div>
                <div class="form-floating mt-3 g-col-6">
                    <input type="text" id="city" name="city" placeholder="city" class="form-control" autocomplete="off"
                        required="required" />
                    <label for="floatingTextarea">City</label>
                </div>
                <div class="form-floating mt-3 g-col-6">
                    <input type="text" id="streetname" name="streetname" placeholder="streetname" class="form-control"
                        autocomplete="off" required="required" />
                    <label for="floatingTextarea">Street Name</label>
                </div>
                <div class="form-floating mt-3 g-col-6">
                    <input type="text" id="postal" name="postal" placeholder="postal" class="form-control"
                        autocomplete="off" required="required" />
                    <label for="floatingTextarea">Postal</label>
                </div>
            </div>
            <div>
                <select class="form-select form-select-lg mb-3 mt-4" name="paymentmethod"
                    aria-label=".form-select-lg example">
                    <option selected>Payment Method</option>
                    <option value="1">Cash On Delivery</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary mt-4" id="btnsubmit" name="submit">
                    Submit
                </button>
            </div>

        </form>

        <div id="insresult"></div>
    </div>
</section>

</html>