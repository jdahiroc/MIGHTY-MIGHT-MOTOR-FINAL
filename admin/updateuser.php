<?php
include 'connect.php';

//e display ang e update nimo bali reference lng sa data 
$id = $_GET['updateid'];
$querysql = "Select * from user where user_id=$id";
$result = mysqli_query($conn, $querysql);
$row = mysqli_fetch_assoc($result);
$fname = $row['fname'];
$mname = $row['mname'];
$lname = $row['lname'];
$em = $row['email'];
$user = $row['username'];
$pwd = $row['password'];

//when clicking submit button 
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname']; //$firstname variable name lng na inside bracket name element sa table or textfields ge input sa user
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "Update user set user_id=$id,fname='$firstname',mname='$middlename',lname='$lastname',email='$email',username='$username',password='$password' where user_id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        //echo "Updated User Successfully!";
        header('location:UserManagementInterface.php'); //after clicking update button redirect sa UserManagementInterface
    } else {
        die(mysqli_error($conn));
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

    <title>Update User</title>
</head>

<body>
    <section>
        <header>
            <a href="/MIGHTY-MIIGHT-MOTOR/index.html"><img src="/MIGHTY-MIIGHT-MOTOR/img/logo.jpg" class="logo"
                    alt="Mighty_Might_Motor" /></a>
        </header>
        <div class="contents">
            <form method="post">
                <h1>Update User</h1>
                <div class="grid gap-3">
                    <div class="pt-5 g-col-6">
                        <input type="text" id="fname" name="firstname" placeholder="First Name" class="form-control"
                            maxlength="50" value=<?php echo $fname; ?>>
                        <!--Display ang na fetch na data from database by using the variable name-->
                    </div>
                    <div class="pt-4 g-col-6">
                        <input type="text" id="mname" name="middlename" placeholder="Middle Name" class="form-control"
                            maxlength="50" value=<?php echo $mname; ?>>
                        <!--Display ang na fetch na data from database by using the variable name-->
                    </div>
                    <div class="pt-4 g-col-6">
                        <input type="text" id="lname" name="lastname" placeholder="Last Name" class="form-control"
                            maxlength="50" value=<?php echo $lname; ?>>
                        <!--Display ang na fetch na data from database by using the variable name-->
                    </div>
                    <div class="pt-4 g-col-6">
                        <input type="text" id="email" name="email" placeholder="Email" class="form-control"
                            maxlength="50" value=<?php echo $em; ?>>
                        <!--Display ang na fetch na data from database by using the variable name-->
                    </div>
                    <br />
                    <hr />
                    <div class="pt-4 g-col-6">
                        <input type="username" id="user" name="username" placeholder="Username" class="form-control"
                            maxlength="50" value=<?php echo $user; ?>>
                        <!--Display ang na fetch na data from database by using the variable name-->
                    </div>
                    <div class="pt-4 g-col-6">
                        <input type="password" id="pwd" name="password" placeholder="Password" class="form-control"
                            maxlength="50" value=<?php echo $pwd; ?>>
                        <!--Display ang na fetch na data from database by using the variable name-->
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary mt-4" id="btnsubmit" name="submit">
                        Update
                    </button>
                </div>
            </form>
            <div id="insresult"></div>
        </div>
    </section>
</body>

</html>