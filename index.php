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
     <div class="repertoar">
       <h2>REPERTOAR</h2>
     </div>

     <div class="repertoar-row">
       <section class="date-selector">
         <div class="day"><p>Danas</p></div>
         <div class="day"><p>Danas+1</p></div>
         <div class="day"><p>Danas+2</p></div>
         <div class="day"><p>Danas+3</p></div>
         <div class="day"><p>Danas+4</p></div>
         <div class="day"><p>Danas+5</p></div>
         <div class="day"><p>Danas+6</p></div>
       </section>

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
         </ul>
       </div>
     </div>
     <!-- End Repertoar -->
   </body>

 </html>
