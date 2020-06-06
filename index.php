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
   </head>
   <body>

     <!-- Header -->
     <?php include('./templates/header.php'); ?>
     <!-- End Header -->

     <!-- Main Carousel -->
     <div class="main-carousel-wrapper">
      <div class="main-carousel">
        <ul>
         <li> <img src="./img/img1.jpg"> </li>
         <li> <img src="./img/img2.jpg"> </li>
         <li> <img src="./img/img3.jpg"> </li>
        </ul>
      </div>
    </div>

    <a href="#" class="main-carousel-control-prev">&lsaquo;</a>
    <a href="#" class="main-carousel-control-next">&rsaquo;</a>

    <p class="main-carousel-pagination"></p>

     <!-- End Main Carousel -->
   </body>

 </html>
