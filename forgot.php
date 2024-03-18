<?php
require "connection.php";
require "mail_function.php";
date_default_timezone_set("Asia/Kolkata");
$success = "0";
$error_message = "";
if (!empty($_POST["submit_email"])) {
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email= '" . $_POST["email"] . "'");
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $otp = rand(10000, 99999);
        $mail_status = sendOTP($_POST["email"], $otp);
        if ( $mail_status == 1) {
            $result = mysqli_query($conn, "INSERT INTO otp_expiry (otp, is_expired, create_at) VALUES ( '" . $otp . "' , '0' ,  CURRENT_TIMESTAMP )");
            $current_id = mysqli_insert_id($conn);
        }
    }
    if (!empty($current_id)) {
        $success = 1;
    } else {
        $error_message = "Email does not exists<br>";
    }
}

if (!empty($_POST["submit_otp"])) {
    $result = mysqli_query($conn, "SELECT otp FROM otp_expiry WHERE otp='" . $_POST["Er_otp"] . "'AND is_expired = 0");
    $count = mysqli_num_rows($result);
    if (!empty($count)) {
        $result = mysqli_query($conn, "UPDATE otp_expiry SET is_expired=1 WHERE otp= ' " . $_POST["Er_otp"] . "'");
        $success = 2;
    } else {
        $success = 1;
        $error_message = "Invalid OTP";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORGOT PASSWORD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        #subbtn {
            margin-left: 47vw;
            height: 5vh;
            width: 8vw;
            align-items: center;
            background-color: blue;
            color: black;
        }

        .form-control {
            width: 50vw;
            margin-left: 5vw;
            margin-right: 5vw;
        }

        .pls {
            margin: 8vh 10vw 60vh 10vw;
            border: 0.6vh solid blue;
        }
    </style>
</head>

<body>
    <?php
    if (!empty($success == 1)) {
        ?>
        <form class="row g-3" method="post">
            <div class="pls">
                <div class="col-auto">
                    <label for="staticEmail2" class="visually-hidden" style="margin-left: 10vw">Enter OTP</label>
                </div>
                <div class="col-auto">
                    <!-- <label for="inputPassword2" class="visually-hidden" style="margin-left: 10vw"></label> -->
                    <input type="text" class="form-control" id="inputPassword2" placeholder="OTP" style="margin-left: 10vw"
                        name="Er_otp" style="margin-top: 1vh; margin-bottom: 1vh;">
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary mb-3" value="CONFIRM OTP" name="submit_otp"
                        style="margin-left: 10vw;">
                </div>
            </div>
        </form>
        <!-- <div class="tableheader"> Enter OTP </div>
            <p style="color:black;">Check your email for otp </p>
            <input type="text" class="txt" name="Er_otp" required>
            <div class="btnsubmit"> <input type="submit" class="btnsubmit" name="submit_otp" value="Submit"> </div> -->
        <?php
    } else if (!empty($success == 2)) {
         header("Location: change_passnew.php");
         exit();
    } else {
        ?>
            <form method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" style="margin-left: 5vw;"> Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp"
                        required>
                    <br>
                    <hr><br>
                </div>
                <div class="mb3">
                    <label for="exampleInputEmail1" class="form-label" style="margin-left: 5vw;"> Email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text" style="margin-left: 5vw;">We'll never share your email with anyone
                        else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"></label>
                    <input type="submit" class="form-control" id="subbtn" name="submit_email" value="Submit">
                </div>

            
            </form>
        <?php
    }
    ?>
</body>

</html>