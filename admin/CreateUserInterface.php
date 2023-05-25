<?php
require_once('connect.php');

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname']; //With Dollar sign is variable name [inside sa brackets is the name element sa table header(th)]
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "Insert into user (fname, mname, lname, email, username, password) values('$firstname', '$middlename', '$lastname', '$email', '$username', '$password')"; //fname, mname etc. table name sa database nako na
    $result = mysqli_query($conn, $query);

    if ($result) {
        //echo "User Added Successfully!";
        header('location:UserManagementInterface.php'); //after click submit button redirect sa UserManageInterface
    } else {
        die(mysqli_error($conn)); //fails if no connection from database
    }

    // Generate a secure hash of the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Store the hashed password in the database
    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);
        // Execute the statement and store the user's data
    }
}


// $fname = $_GET['firstname'];
// $mname = $_GET['middlename'];
// $lname = $_GET['lastname'];
// $email = $_GET['email'];
// $username = $_GET['username'];
// $password = $_GET['password'];

// $fetched = array();
// $query = "Insert into user (fname, mname, lname, email, username, password) VALUES ('$fname', '$mname', '$lname', '$email', '$username', '$password')";
// $result = mysqli_query($conn, $query);

// if ($result) {
//     array_push($fetched, array('result' => "Success"));
// } else {
//     array_push($fetched, array('result' => "Saving user failed, Try again!"));
// }
// echo json_encode($fetched);

// //----------------------------------------------------------------------------------------------------
// // Include config file
// require_once("connectlogin.php");

// // Define variables and initialize with empty values
// $username = $password = $confirm_password = "";
// $username_err = $password_err = $confirm_password_err = "";

// // Processing form data when form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     // Validate username
//     if (empty(trim($_POST["username"]))) {
//         $username_err = "Please enter a username.";
//     } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
//         $username_err = "Username can only contain letters, numbers, and underscores.";
//     } else {
//         // Prepare a select statement
//         $sql = "SELECT user FROM username WHERE username = ?";

//         if ($stmt = mysqli_prepare($link, $sql)) {
//             // Bind variables to the prepared statement as parameters
//             mysqli_stmt_bind_param($stmt, "s", $param_username);

//             // Set parameters
//             $param_username = trim($_POST["username"]);

//             // Attempt to execute the prepared statement
//             if (mysqli_stmt_execute($stmt)) {
//                 /* store result */
//                 mysqli_stmt_store_result($stmt);

//                 if (mysqli_stmt_num_rows($stmt) == 1) {
//                     $username_err = "This username is already taken.";
//                 } else {
//                     $username = trim($_POST["username"]);
//                 }
//             } else {
//                 echo "Something went wrong. Please try again later.";
//             }

//             // Close statement
//             mysqli_stmt_close($stmt);
//         }
//     }

//     // Validate password
//     if (empty(trim($_POST["password"]))) {
//         $password_err = "Please enter a password.";
//     } elseif (strlen(trim($_POST["password"])) < 6) {
//         $password_err = "Password must have atleast 6 characters.";
//     } else {
//         $password = trim($_POST["password"]);
//     }

//     // Validate confirm password
//     if (empty(trim($_POST["confirm_password"]))) {
//         $confirm_password_err = "Please confirm password.";
//     } else {
//         $confirm_password = trim($_POST["confirm_password"]);
//         if (empty($password_err) && ($password != $confirm_password)) {
//             $confirm_password_err = "Password did not match.";
//         }
//     }

//     // Check input errors before inserting in database
//     if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

//         // Prepare an insert statement
//         $sql = "INSERT INTO user (fname, mname, lname, email, username, password) VALUES (?, ?)";

//         if ($stmt = mysqli_prepare($link, $sql)) {
//             // Bind variables to the prepared statement as parameters
//             mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

//             // Set parameters
//             $param_username = $username;
//             $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

//             // Attempt to execute the prepared statement
//             if (mysqli_stmt_execute($stmt)) {
//                 // Redirect to login page
//                 header("location: loginuser.php");
//             } else {
//                 echo "Something went wrong. Please try again later.";
//             }

//             // Close statement
//             mysqli_stmt_close($stmt);
//         }
//     }

//     // Close connection
//     mysqli_close($link);
// }
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
        <ul>
            <li><a href="/MIGHTY-MIIGHT-MOTOR/index.html">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Shop</a></li>
        </ul>
    </header>
    <!--CONTENTS-->
    <div class="contents">
        <form method="post">
            <h1>Create an Account</h1>
            <div class="grid gap-3">
                <div class="pt-5 g-col-6">
                    <input type="text" id="fname" name="firstname" placeholder="First Name" class="form-control"
                        maxlength="50" />
                </div>
                <div class="pt-4 g-col-6">
                    <input type="text" id="mname" name="middlename" placeholder="Middle Name" class="form-control"
                        maxlength="50" />
                </div>
                <div class="pt-4 g-col-6">
                    <input type="text" id="lname" name="lastname" placeholder="Last Name" class="form-control"
                        maxlength="50" />
                </div>
                <div class="pt-4 g-col-6">
                    <input type="text" id="email" name="email" placeholder="Email" class="form-control"
                        maxlength="50" />
                </div>
                <br />
                <hr />
                <div class="pt-4 g-col-6">
                    <input type="username" id="user" name="username" placeholder="Username" class="form-control"
                        maxlength="50" />
                </div>
                <div class="pt-4 g-col-6">
                    <input type="password" id="pwd" name="password" placeholder="Password" class="form-control"
                        maxlength="50" />
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary mt-4" id="btnsubmit" name="submit">
                    Submit
                </button>
            </div>
            <p class="d-flex justify-content-center mt-2"> Already have an account? <a href="loginuser.php"> Login
                    Now.</a></p>
        </form>

        <div id="insresult"></div>
    </div>
</section>

</html>