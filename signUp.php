<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>BOSS-BUS SIGN UP</title>
  <link rel="stylesheet" href="cssfile/nav.css">
  <!--  <link rel="stylesheet" href="cssfile/footer_l.css">-->
  <link rel="stylesheet" href="cssfile/signUp.css">
  <!--  <link rel="stylesheet" type="text/css" href="cssfile/container.css">-->

  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">-->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <style type="text/css">
    body {

      background-image: url(image/8.jpg);
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;

    }

    .confirm {

      background-color: black;
      margin-top: 5px;


    }
  </style>

</head>

<body>

  <!--this is the header callling(nav bar)-->

  <?php include("nav.php");
  ?>

  <div class="confirm">

    <?php
    function isStrongPassword($password) {
      // Define password criteria
      $minLength = 8;
      $hasUppercase = preg_match('/[A-Z]/', $password);
      $hasLowercase = preg_match('/[a-z]/', $password);
      $hasDigit = preg_match('/\d/', $password);
      $hasSpecialChar = preg_match('/[^A-Za-z0-9]/', $password);
  
      // Check if the password meets all criteria
      if (strlen($password) < $minLength) {
          return false;
      } elseif (!$hasUppercase) {
          return false;
      } elseif (!$hasLowercase) {
          return false;
      } elseif (!$hasDigit) {
          return false;
      } elseif (!$hasSpecialChar) {
          return false;
      } else {
          return true;
      }
  }

    include("connection.php");
    include("function.php");


    session_start();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      //   //something was posted
      $user_name = $_POST['user_name'];

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $con_pass = $_POST['cpassword'];
      $sube = $_POST['submit_email'];

      $_SESSION['email'] = $email;
      $_SESSION['sub'] = $sube;
      //echo $user_name;
    

      if(isStrongPassword($password)){
      if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {


        if ($password == $con_pass) {


          //   $password=md5($password);
          //save to database
          $user_id = random_num(20);
          $query = "insert into users (user_id,First_Name,Last_Name,username,email,password) values ('$user_id','$fname','$lname','$user_name','$email','$password')";

          mysqli_query($conn, $query);

          echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully your Sign Up!!!');
    window.location.href='sign_bet_login.php';
    </script>");

        } else {

          echo "Please enter confirm password as previous one!!";

        }
      } else {

        echo "Please enter some valid information!";

      }
      header("Location: sign_bet_login.php");
    }else{
      echo "<script>
              alert('Enter a strong password! Must contain uppercase lcase nums and special chars');
            </script>";
    }
    }
    ?>

  </div>

  <div class="wrapper">
    <div class="registration_form">
      <div class="title">
        Sign Up for BOSS-BUSS Service
      </div>
      <form action="signUp.php" method="post">
        <div class="form_wrap">
          <div class="input_grp">
            <div class="input_wrap">
              <label for="fname">First Name</label>
              <input type="text" id="fname" name="fname" placeholder="First Name" required>
            </div>
            <div class="input_wrap">
              <label for="lname">Last Name</label>
              <input type="text" id="lname" name="lname" placeholder="Last Name" required>
            </div>
          </div>
          <div class="input_wrap">
            <label for="email">Email Address</label>
            <input type="text" id="email" name="email" placeholder="E-mail" required>
          </div>
          <div class="input_wrap">
            <label for="uname">Username</label>
            <input type="text" id="uname" name="user_name" placeholder="Username" required>
          </div>
          <div class="input_wrap">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="password" required>
          </div>
          <div class="input_wrap">
            <label for="Confirm_password">Confirm Password</label>
            <input type="password" id="password" name="cpassword" placeholder="password" required>
          </div>

          <div class="input_wrap">
            <input type="submit" value="Register Now" name="submit_email" class="submit_btn">
          </div>

        </div>
      </form>
    </div>
  </div>






</body>

</html>