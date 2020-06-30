<?php

require_once('core/start.php');
$db = Database::connect();

if(isset($_GET['datetime'])) {
  echo date($_GET['datetime']);

  $shows = new Showings();
  $films = $shows->show(date($_GET['datetime']));
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" media="screen"
      href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
   </head>
   <body>
     <form class="" action="" method="get">
       <!-- Bootstrap Datetimepicker -->
       <div id="datetimepicker" class="input-group date">
         <input type="text" name="datetime"></input>
         <span class="add-on">
           <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
         </span>
       </div>
       <button type="submit" name="">Prikazi</button><br>
     </form>
     <?php
     if(isset($films)) {
       foreach ($films as $film) {
        ?>
        <ul>
          <li><a href="films.php?id=<?php echo $film['id'] ?>"><?php echo $film['film_name']." (".$film['year'].")"; ?></a></li>
        </ul>
        <?php
      }
     }
     ?>
     <script type="text/javascript"
      src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
     </script>
     <script type="text/javascript"
      src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
     </script>
     <script type="text/javascript"
      src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
     </script>
     <script type="text/javascript"
      src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
     </script>
     <script type="text/javascript">
       $('#datetimepicker').datetimepicker({
         format: 'yyyy-MM-dd',
         language: 'sr-RS'
       });
     </script>
   </body>
 </html>
