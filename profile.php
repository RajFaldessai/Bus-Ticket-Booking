<?php 
session_start();

    include("connection.php");
    include("function.php");

    $user_data = check_login($conn);

?>

<!DOCTYPE html>

<html>
<title>PROFILE</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<head>

  <style type="text/css">
   
*{
    padding: 0;
    margin: 0;
  
    list-style: none;
    box-sizing: border-box;
}


body{
  font-family: monospace;
  background-image: url(image/busbg.jpg);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

nav{
  width:100%;
  height: 80px;
  background-color:#0B0B3B;
  
}

.logo{
  color: rgb(253, 252, 252);
  font-style:oblique;
   font-size: 35px;
   line-height: 80px;
   padding: 0px;
   font-weight: bold;
   float: left;
} 


nav ul {
  float:left;
  margin-left:20px ;
  
  
}
nav ul li{
  display: inline-block;
  line-height: 80px;
  margin: 0 5px;
  
 
}
nav ul li a {
  text-decoration: none;
  font-size: 17px;
  text-transform: uppercase;


  border-radius: 15px;           
}

nav ul li a.animation{
  position: absolute;
  


}
a:nth-child(1){
  padding: 7px 13px;
}
nav.start-home,a:nth-child(1):hover,
a:nth-child(2){
  padding: 7px 13px;
}
nav.start-home,a:nth-child(2):hover,
a:nth-child(3){
  padding: 7px 13px;
}
nav.start-home,a:nth-child(3):hover,
a:nth-child(4){
  padding: 7px 13px;
}
#sign{

  margin-left: 600px;
  padding-left: 400px 400px;
  
}


.usern{
  font-size:25px;
  font-family: Arial;
  margin-top:20px;
  left: 50%;
  padding-left: 65px;
  width: 45%;
}
.wrapper{
  position: absolute;
  top: 50%;
  left: 34%;
  height:60%;
  margin-left:170px ;
  border-radius: 15px;     
  transform: translate(-50%,-50%);
  width: 60%;
  display: flex;
  box-shadow: -15px -15px 15px  rgba(255, 255, 255, 0.2),
  15px 15px 15px  rgba(0, 0, 0, 0.1),
  inset -5px -15px 15px  rgba(255, 255, 255, 0.2),
  inset 5px 5px 5px  rgba(0, 0, 0, 0.2);



  
}
.wrapper .left{
  width: 30%;
  background:#3A5795; 
  padding: 30px 25px;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  text-align: center;
  color: #fff;
  border-radius: 15px;     
}

.wrapper .left img{
  border-radius: 5px;
  margin-bottom: 10px;
}
.right{
  width: 80%;
  left: 12%;
  top:70px;
  margin-top:46px;
  margin-right:auto;
  margin-left:auto;

  color: #fff;
  padding: 0px 200px;
  position: relative;
  font-size: 15px;
}
hr{
  border:1px solid black;
  width: 50%;
  

}
.btn1{
  margin-left: 90px;
  padding: 5px;
  width: 10%;
  background-color:#6e83b3;
  border: none;
  border-radius: 7px;
  color: white;
  

}


  .btn1:hover{
    color: rgb(235, 235, 235);
    background-color: rgb(85, 149, 179);
  }
.btn2{
  margin-left: 90px;
  padding: 5px;
  width: 10%;
  background-color:#F9522E;
  border: none;
  color: white;
  border-radius: 7px;

}
.btn3{
  margin-left: 10px;
  padding: 5px;
  width: 10%;
  background-color:#F9522E;
  border: none;
  color: white;
  border-radius: 7px;

}
.btn3:hover{
  background-color: orange;
  cursor: pointer;
}
.btn4{
  background-color:#F9522E;
  border: none;
  color: white;
  border-radius: 7px;
  height: 10%;
  padding: 5px;


}
.btn4:hover{
  background-color: orange;
  cursor: pointer;
}
.data{
     width: 50%;


}

.bu{
  margin-top: 50px;
  padding: 30px 355px; 
  
}

.focl{
  background-color: #0B0B3B;
  margin-top: 100px;
  text-align: center;

  width: 50%px;
  height:150px ;

}
#imf{
  color: white;
  border: 1px solid #ccc;
  padding-bottom: 5px ;
  padding-right: 5px ;
  padding-top: 5px;
  padding-left: 5px;
  margin-top: 10px;
}
.mr{
  margin: auto;
  width: 28%;

}
.list{
  
  padding: 1PX;
  overflow: hidden;
  margin-top: 10px;
  list-style-type: none;
  
}
li.menu{
float: left;
padding: 5px;
margin: auto;
}
li a{
  border-radius: 15px;
  color: white;
  display: inline;
  text-decoration: none;
}
li a:hover{
  color: white;
  background-color:#1b9bff;
  transition: .5s;

}
.fla{
  color: white;
}





  </style>
<link rel="stylesheet" href="cssfile/sidebar.css">
</head>
<body > 


  
       
  
          
          
          <div class="usern"><b><font color="#fff"> Hello <?php echo $user_data['username'];?></font></b></div>
            <div class="wrapper">
              <div class="left">
                  <img src="image/avatar.png"alt="user" width="200">
         
                  <br>
                  <a href="viewBus.php"><button class="btn4">Home </button></a>
              </div>
              </div>




        <div class="right">

                  
           <h3>Account Information</h3><hr/><br/>  
                <p>User name:- <?php echo $user_data['username'];?>   </p><br>
                <p>Email:- <?php echo $user_data['email'];?> </p>
                <br>
                <p>First name:-<?php echo $user_data['First_Name'];?></p><br>
                <p>Last name:-<?php echo $user_data['Last_Name'];?></p><br>
                
                <h3>LOGOUT & SECURITY</h3><hr/><br>
                <br><a href="updateProfile.php?id=<?php echo $user_data['id'];?>">
                <button class="btn3">Update</button></a>
                <a href="logout.php">
                <button class="btn3">Logout</button></a>
                <a href="deleteProfile.php?id=<?php echo $user_data['id'];?>">
                <button class="btn3">Delete</button></a>
         </div>
     
                  
                 
             
             
            
</body>
</html>
