<?php
require "connection.php";
if (!empty($_POST["final"])) {
    if ($_POST["newpass"] == $_POST["newpass2"]) {
        //UPDATE `user_details` SET `Password` = 'samarr' WHERE `user_details`.`Email` = 'narvekargsamarth5@gmail.com';
        $sql = "UPDATE `users` SET `Password` = ' " . $_POST["newpass"] . "' WHERE `users`.`email`='" . $_POST["usere"] . "'";
        $result = mysqli_query($conn, $sql);
        if (!empty($result)) {
            // echo "Password Updated";
            header("location:Login.php");
        } else {
            echo "" . mysqli_error($conn);
        }
    } else {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oops!!</strong> The entered passwords do not match!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>CHANGE PASSWORD</title>
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

        .box {
            max-width: 400px;
            margin: 0 auto;
            background-color:rgba(255, 255, 255, 0.5);
            padding: 20px;
            border: 1px solid gray;
            border-radius: 5px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .subbtn {
             text-align: center; 
           
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="box">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usere">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="newpass">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="newpass2">
                </div>
                <div class="subbtn">
                    <input type="submit" class="btn btn-primary" name="final" value="submit">
                </div>
            <!-- <div class="tableheader">Enter Your Details</div>
            <div class="inputclass"><input type="email" name="usere" required></div>
            <div class="inputclass">Enter New Password<input type="password" name="newpass" required></div>
            <div class="inputclas">Enter New Password Again<input type="text" name="newpass2" required></div>
            <div class="subbtn"><input type="submit" class="btn" name="final" value="submit"></div> -->
        </div>
    </form>
</body>

</html>