<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Us Boss Bus</title>
    <link rel="stylesheet" href="cssfile/nav.css">
    <link rel="stylesheet" href="cssfile/footer_l.css">
     <link rel="stylesheet" href="cssfile/contact_us.css">
  <!--  <link rel="stylesheet" type="text/css" href="cssfile/container.css">-->
   
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
   <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <style type="text/css">

     
       body{
       padding: 0;
       margin: 0;
       line-height: 1.5;
       box-sizing: border-box;
       color:rgba(248, 248, 248, 0.938);
       background-image: url(image/7.jpg);
       background-size: cover;
       background-repeat: no-repeat;
       background-attachment: fixed;
 
      }
      
    </style>

  </head>
  <body>



  


              <!--this is the header callling(nav bar)-->

            <?php include("nav.php");
             ?>


            <section id="fancy-form">
   <div class="container">
    <div class="form-sections">
      <!-- Form left -->
      <div class="Form-left">
        <h1>Get In Touch</h1>
        <div class="line"></div> <!--border-bottom line-->
        <p>Contact us for latest news and updates. subscribe our news letter :)</p><br>

        <!--first Heading -->
        <h4>ADDRESS</h4>
         <span>Office No. 95,
               Skyline Heights,
               Quepem,  Goa.</span>
         <hr><br><br>

         <!--second Heading -->
        <h4>PHONE</h4>
         <span>+917038382424</span>
         <hr><br><br>

       <!--third Heading -->
        <h4>EMAIL</h4>
         <span>bossbus@gmail.com</span>
         <hr> <br>

         <!-- social media icons 
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-google"></a>
          <a href="#" class="fa fa-linkedin"></a>
          <a href="#" class="fa fa-youtube"></a>-->
      </div>

      <!-- form right -->
      
       <div class="Form-right">
        <h1>Contact Us</h1>
        <div class="line"></div>
        
        <form action=c:\xampp\htdocs\busbooking4\Busbooking\contact_us_feedback.php method="POST">
          <h5>NAME</h5>
          <input type="text" id="name" name="name" required><br><br>
          <h5>EMAIL</h5>
          <input type="email" id="email" name="email" required><br><br>
          <h5>PHONE</h5>
          <input type="tel" id="phone" name="phone"><br><br>
          <h5>YOUR MESSAGE</h5>
          <textarea id="message" name="message" rows="4" cols="50" required></textarea><br>
          <input type="submit" value="Submit">       
        </form>
      </div>
    </div> 
    
    
    <!-- <form action="contact.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone"><br><br>

    <label for="message">Your Message:</label><br>
    <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

    
</form> -->

    </div>
  </section>

             


  </body>
</html>
