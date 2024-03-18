<?php 
session_start();

  include("connection.php");
  include("function.php");

  $user_data = check_login($conn);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="cssfile/payment.css">

</head>
<body>



<?php



  if(isset($_POST['checkout'])){


     $name=$_POST['name'];
     $email=$_POST['email'];
     $address=$_POST['address'];
     $city=$_POST['city'];
     $state=$_POST['state'];
     $zip=$_POST['zip'];
     $cname=$_POST['cardName'];
     $cnumber=$_POST['cardNumber'];
     $expM=$_POST['expM'];
     $expY=$_POST['expYear'];
     $cvv=$_POST['cvv'];
     $amount=$_POST['amount'];


       if($conn->connect_error)
          {
            die('Connection Failed :'.$conn->connect_error);
          }
          else
          {


              $stmt=$conn->prepare("INSERT INTO payment(amount,name,email,address,city,state,zip_code,card_name,card_number,exp_month,exp_year,cvv) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
              //table3 is the table name//

              $stmt->bind_param("isssssissssi",$amount,$name,$email,$address,$city,$state,$zip,$cname,$cnumber, $expM,$expY,$cvv);

              $stmt->execute();
                          
                           echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully added!!!');
                window.location.href='paySucess.php';
                </script>");

              
              $stmt->close();
              $conn->close();
              }
                
          
      }     
  

   ?>


<div class="container">

    <form method="POST">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                 <div class="inputBox">
                    <span>Amount Payable :</span>
                    <input type="number" value="200.00" name="amount">
                </div>

                <div class="inputBox">
                    <span>Name :</span>
                    <input type="text" value="<?php echo $user_data['username'];?>" name="name">
                </div>

                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" value="<?php echo $user_data['email'];?>" name="email">
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <input type="text" name="address">
                </div>
                <div class="inputBox">
                    <span>City :</span>
                    <input type="text" placeholder="" name="city">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>State :</span>
                        <input type="text" placeholder="" name="state">
                    </div>
                    <div class="inputBox">
                        <span>Pin Code :</span>
                        <input type="text" placeholder="XXX XXX" name="zip">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>Cards Accepted :</span>
                    <img src="image/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>Name On Card :</span>
                    <input type="text" placeholder="" name="cardName" required>
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="XXXX XXXX XXXX XXXX" name="cardNumber" required>
                </div>
                <div class="inputBox">
                    <span>Expiry Month :</span>
                    <input type="text" placeholder="" name="expM" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Exp Year :</span>
                        <input type="number" placeholder="" name="expYear" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="XXX" name="cvv" required>
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn" name="checkout">

    </form>

</div>    
    
</body>
</html>