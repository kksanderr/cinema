<?php


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ARTHAUS KINO</title>
     <link href="https://fonts.googleapis.com/css2?family=Fanwood+Text&display=swap"
     rel="stylesheet">
     <link rel="stylesheet" href="./css/main.css">
     <script type="text/javascript" src="./jquery/jquery-3.5.1.min.js"></script>
     <script type="text/javascript" src="./jquery/jquery.jcarousel.min.js"></script>

     <script type="text/javascript" src="./jquery/jcarousel.basic.js"></script>

     <script type="text/javascript" src="./js/main.js"></script>
   </head>
   <body>
     <div id="main">

     <!-- Header -->
     <?php include('./templates/header.php'); ?>
     <!-- End Header -->

     <!-- Main Carousel -->
     <div class="main-carousel-wrapper">
      <div class="main-carousel" align="center">
        <ul>
         <li> <img src="./img/img1.jpg"> </li>
         <li> <img src="./img/img2.jpg"> </li>
         <li> <img src="./img/img3.jpg"> </li>
        </ul>


        <a href="#" class="main-carousel-control-prev"><div>&lsaquo;</div></a>
        <a href="#" class="main-carousel-control-next"><div>&rsaquo;</div></a>

        <p class="main-carousel-pagination"></p>
      </div>
     </div>
     <!-- End Main Carousel -->

     <!-- Repertoar -->
     <div class="title">
       <h2>REPERTOAR</h2>
     </div>

     <div class="repertoar-row">
        <p id="days">
          <label><input type="radio" name="work_days" value="1" checked="checked"><span><?php echo date('d-M-y');?></span></label>
          <label><input type="radio" name="work_days" value="2"><span><?php echo date('d-M-y', strtotime('+1 day'));?></span></label>
          <label><input type="radio" name="work_days" value="3"><span><?php echo date('d-M-y', strtotime('+2 day'));?></span></label>
          <label><input type="radio" name="work_days" value="4"><span><?php echo date('d-M-y', strtotime('+3 day'));?></span></label>
          <label><input type="radio" name="work_days" value="5"><span><?php echo date('d-M-y', strtotime('+4 day'));?></span></label>
          <label><input type="radio" name="work_days" value="6"><span><?php echo date('d-M-y', strtotime('+5 day'));?></span></label>
          <label><input type="radio" name="work_days" value="7"><span><?php echo date('d-M-y', strtotime('+6 day'));?></span></label>
        </p>
       <div class="showings">
         <ul>
           <li class="performance">
             <div class="programme">
               <div class="poster">
                 <a href="#"><img src="./img/brazil.jpg" alt=""></a>
               </div>
               <div class="programme-info">
                 <ul>
                   <li>
                     <h3><a href="#">Brazil</a></h3>
                   </li>
                 </ul>
                 <ul class="times">
                   <li class="start-time">12:00</li>
                   <li class="start-time">18:00</li>
                 </ul>
               </div>
             </div>
           </li>

           <li class="performance">
             <div class="programme">
               <div class="poster">
                 <a href="#"><img src="./img/SunsetBlvd.jpg" alt=""></a>
               </div>
               <div class="programme-info">
                 <ul>
                   <li>
                     <h3><a href="#">Sunset Blvd.</a></h3>
                   </li>
                 </ul>
                 <ul class="times">
                   <li class="start-time">15:00</li>
                   <li class="start-time">21:00</li>
                 </ul>
               </div>
             </div>
           </li>
         </ul>
       </div>
     </div>
     <!-- End Repertoar -->
   </div>

     <!-- News -->
     <div class="title">
       <h2>Vesti</h2>
     </div>
     <div class="news-row">
       <div class="news">
         <div class="news-img">
           <a href="#"><img src="./img/news1.jpg" alt=""></a>
         </div>
         <a href="#"><h3>Lorem Ipsum 1</h3></a>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare laoreet ligula fringilla faucibus. Nunc eget est eget lacus...</p>
         <a href="#">(Čitaj još...)</a>
       </div>
       <div class="news">
         <div class="news-img">
           <a href="#"><img src="./img/news1.jpg" alt=""></a>
         </div>
         <a href="#"><h3>Lorem Ipsum 2</h3></a>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare laoreet ligula fringilla faucibus. Nunc eget est eget lacus...</p>
         <a href="#">(Čitaj još...)</a>
       </div>
       <div class="news">
         <div class="news-img">
           <a href="#"><img src="./img/news1.jpg" alt=""></a>
         </div>
         <a href="#"><h3>Lorem Ipsum 3</h3></a>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare laoreet ligula fringilla faucibus. Nunc eget est eget lacus...</p>
         <a href="#">(Čitaj još...)</a>
       </div>
     </div>
     <!-- End News -->

     <!-- Login -->

     <?php include('login.php'); ?>

     <!-- End Login -->

     <!-- Signup -->

     <?php include('signup.php'); ?>

     <!-- End Signup -->
     <script>
      function openNavLogin() {
        document.getElementById("login-sidenav").style.width = "250px";
        document.getElementById("main").style.marginRight = "250px";
      }

      function closeNavLogin() {
        document.getElementById("login-sidenav").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
      }
     </script>

     <script>
      function openNavSignup() {
        document.getElementById("signup-sidenav").style.width = "250px";
        document.getElementById("main").style.marginRight = "250px";
      }

      function closeNavSignup() {
        document.getElementById("signup-sidenav").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
      }
     </script>

   </body>

 </html>
