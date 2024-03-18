 <nav>
      <ul>
        <li class="logo"><h4>BOSS-BUS</h4></li>
        <li class="btn"><span class="fas fa-bars"></span></li>
        <div class="items">
          <li><a href="home.php">Home</a></li>
          <li><a href="help.php">Help</a></li>
       <!--   <li><a href="#">Ticket Book</a></li>-->

         
         <!-- <li><a href="#">Packages</a></li>-->
          <li><a href="loginMenu.php">Login</a></li>
          <li><a href="AboutUs.php">About Us</a></li>
           <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="slide.php">Services</a></li>
            <li><a href="map.php">Map</a></li>
            <li><a href="mymap1.php">GIS</a></li>


        </div>
        
      </ul>
    </nav><!--
    <div class="content">
      <div class="text">Responsive Navbar with Searchbox</div>
      <div class="p">HTML and CSS (Flexbox) Full video tutorial</div>
    </div>-->

    <script>
      $('nav ul li.btn span').click(function(){
        $('nav ul div.items').toggleClass("show");
        $('nav ul li.btn span').toggleClass("show");
      });
    </script>