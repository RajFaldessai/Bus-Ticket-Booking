<?php
require "connection.php";
require "mail_function.php";
date_default_timezone_set("Asia/Kolkata");

session_start();
$email = $_SESSION["email"];
$otp = rand(10000, 99999);
$mail_status = sendOTP($email, $otp);

if ($mail_status == 1) {
    $result = mysqli_query($conn, "INSERT INTO otp_expiry (otp, is_expired, create_at) VALUES ( '" . $otp . "' , '0' ,  CURRENT_TIMESTAMP )");
    $current_id = mysqli_insert_id($conn);
} else {
    echo "Invalid Email!<br>";
}


if (!empty($_POST["submit_otp"])) {
    $sql = "SELECT otp FROM otp_expiry WHERE otp = '" . $otp . "' AND is_expired = 0";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if (!empty($count > 0)) {
        $sql = "UPDATE otp_expiry SET is_expired=1 WHERE otp = '" . $otp . "'";
        $result = mysqli_query($conn, $sql);
    }
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTHENTICATION</title>
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
            margin: 0;
        }

        .container {
            max-width: 600px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5);
            border: 1px solid gray;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center the content horizontally */
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid gray;
            border-radius: 5px;
        }

        .btn-container {
            margin-top: 15px; /* Add margin to separate the button from the inputs */
        }

        .btn-primary {
            background-color: green;
            color: white;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="mb-3">
                <label for="inputPassword2" class="form-label">PLEASE ENTER OTP SENT ON YOUR EMAIL</label>
                <input type="text" class="form-control" id="inputPassword2" placeholder="OTP">
            </div>
            <div class="btn-container">
                <input type="submit" class="btn btn-primary" value="CONFIRM OTP" name="submit_otp">
            </div>
        </form>
    </div>
</body>

</html>

