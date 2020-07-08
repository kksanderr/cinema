<?php
  require_once('core/start.php');
  $db = Database::connect();

  $shows = new Showings();
  if(!isset($_GET["work_days"])) {
    // $_GET["work_days"] = date('Y-m-d');
    $films = $shows->show(date('Y-m-d'));
    // echo date('Y-m-d');
    // print_r($films);
  }
  else {
    $films = $shows->show($_GET["work_days"]);
    // echo $_GET["work_days"];
    // print_r($films);
  }
  // echo $films[0]['film_name'];
  // print_r(date('H:i', strtotime($films[0]['times'])));
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
     <!-- <script>
     function check(work_days) {
       document.getElementById("answer").value=work_days;
     }
     </script> -->
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
     <div class="title" id="title">
       <h2>REPERTOAR</h2>
     </div>

     <div class="repertoar-row">
        <form id="days" method="get" action="#title">

          <label><input type="radio" name="work_days" value="<?php echo date('Y-m-d');?>"
          <?php if (!isset($_GET["work_days"]) || $_GET["work_days"] == date('Y-m-d')) echo 'checked="checked"' ?>
          onchange="this.form.submit()"><span><?php echo date('d-M-y');?></span></label>

          <label><input type="radio" name="work_days" value="<?php echo date('Y-m-d', strtotime('+1 day'));?>"
          <?php $shows->radioChecked("work_days", date('Y-m-d', strtotime('+1 day'))) ?>
          onchange="this.form.submit()"><span><?php echo date('d-M-y', strtotime('+1 day'));?></span></label>

          <label><input type="radio" name="work_days" value="<?php echo date('Y-m-d', strtotime('+2 day'));?>"
          <?php $shows->radioChecked("work_days", date('Y-m-d', strtotime('+2 day'))) ?>
          onchange="this.form.submit()"><span><?php echo date('d-M-y', strtotime('+2 day'));?></span></label>

          <label><input type="radio" name="work_days" value="<?php echo date('Y-m-d', strtotime('+3 day'));?>"
          <?php $shows->radioChecked("work_days", date('Y-m-d', strtotime('+3 day'))) ?>
          onchange="this.form.submit()"><span><?php echo date('d-M-y', strtotime('+3 day'));?></span></label>

          <label><input type="radio" name="work_days" value="<?php echo date('Y-m-d', strtotime('+4 day'));?>"
          <?php $shows->radioChecked("work_days", date('Y-m-d', strtotime('+4 day'))) ?>
          onchange="this.form.submit()"><span><?php echo date('d-M-y', strtotime('+4 day'));?></span></label>

          <label><input type="radio" name="work_days" value="<?php echo date('Y-m-d', strtotime('+5 day'));?>"
          <?php $shows->radioChecked("work_days", date('Y-m-d', strtotime('+5 day'))) ?>
          onchange="this.form.submit()"><span><?php echo date('d-M-y', strtotime('+5 day'));?></span></label>

          <label><input type="radio" name="work_days" value="<?php echo date('Y-m-d', strtotime('+6 day'));?>"
          <?php $shows->radioChecked("work_days", date('Y-m-d', strtotime('+6 day'))) ?>
          onchange="this.form.submit()"><span><?php echo date('d-M-y', strtotime('+6 day'));?></span></label>

        </form>
       <div class="showings">
         <?php
           if(empty($films[0]['film_name'])) {
             echo "<div class='no-films'><h3>Danas nema projekcija.</h3></div>";
           }
           else {
            foreach ($films as $film) {
              ?>
              <ul>
                <li class="performance">
                  <div class="programme">
                    <div class="poster">
                      <a href="films.php?id=<?php echo $film['id'] ?>"><img src="<?php echo $film['poster'] ?>" alt=""></a>
                    </div>
                    <div class="programme-info">
                      <ul>
                        <li>
                          <h3><a href="films.php?id=<?php echo $film['id'] ?>"><?php echo $film['film_name']." (".$film['year'].")"; ?></a></h3>
                        </li>
                      </ul>
                      <ul class="times">
                        <li class="start-time"><?php echo date('H:i', strtotime($film['times'])) ?></li>
                      </ul>
                      <?php if(isset($user) && $user->isLoggedIn()) { ?>
                      <div class="my-films">
                        <a href="my-films.php?show_id=<?php echo $shows->returnShowingId($film['id'], $film['times']) ?>">➕ Moji filmovi</a>
                      </div>
                    <?php } ?>
                    </div>
                  </div>
                </li>
              </ul>
          <?php  }
           }   ?>
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






   </body>

 </html>
