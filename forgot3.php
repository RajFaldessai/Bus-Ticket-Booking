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
        if ($mail_status == 1) {
            $result = mysqli_query($conn, "INSERT INTO otp_expiry (otp, is_expired, create_at) VALUES ( '" . $otp . "' , '0' ,  CURRENT_TIMESTAMP )");
            $current_id = mysqli_insert_id($conn);
        }
    }
    if (!empty($current_id)) {
        $success = 1;
    } else {
        $error_message = "Email does not exist<br>";
    }
}

if (!empty($_POST["submit_otp"])) {
    $result = mysqli_query($conn, "SELECT otp FROM otp_expiry WHERE otp='" . $_POST["Er_otp"] . "' AND is_expired = 0");
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
        body {
            background-image: url(image/busbg.jpg);
           background-size: cover;
          background-repeat: no-repeat;
          background-attachment: fixed;
            font-family: Arial, sans-serif;
          display: flex; 
             justify-content: center; 
            align-items: center; 
            height: 100vh;
            
        }

        #container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5);
            border: 1px solid gray;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            align-items: center;
        }

        #subbtn {
            width: 100%;
            background-color: green;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid gray;
            border-radius: 5px;
        }

        .pls {
            margin: 20px 0;
            padding: 20px;
            /* border: 1px solid gray; */
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="container">
        <?php
        if (!empty($success == 1)) {
        ?>
            <form class="row g-3" method="post">
                <div class="pls">
                    <label for="inputPassword2">Enter OTP</label>
                    <input type="text" class="form-control" id="inputPassword2" placeholder="OTP" name="Er_otp">
                    <input type="submit" class="btn btn-primary mb-3" value="CONFIRM OTP" name="submit_otp">
                </div>
            </form>
        <?php
        } else if (!empty($success == 2)) {
            echo '<p style="color: green;">OTP Confirmed. Redirecting...</p>';
            echo '<script>setTimeout(function(){ window.location.href = "change_passnew1.php"; }, 2000);</script>';
        } else {
        ?>
            <form method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" required>
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" id="subbtn" name="submit_email" value="Submit">
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>
