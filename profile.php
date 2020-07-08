<?php

  require_once('core/start.php');
  $db = Database::connect();

  $user_id = $user->data()->id;
  $films = new Film();
  $datas = $films->myFilms($user_id);
  // echo "<pre>";
  // print_r($datas);

  foreach ($datas as $data) {
    $results = $db->find('films', 'id', $data[0]->film_id)->results();
    $film_info[] = [$results[0], $data[0]->times, $data[1]];
    // Brisanje iz baze
    if(isset($_POST['delete'])) {
      $db->delete('users_films', $_GET['id']);
      Redirect::to('profile.php');
    }
  }
  // echo "<pre>";
  // print_r($film_info);

  foreach($film_info as $value) {
    if(isset($_POST['delete-'.$value[1]])) {
      // echo "Klik".$value[1];
    }
  }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Moj Profil</title>
   </head>
   <body>
     <a href="index.php"><< NAZAD</a>
     <h2>Moji Filmovi</h2>
     <?php foreach($film_info as $value) {?>
     <ul>
       <li><?php echo $value[0]->film_name; ?></li>
       <li><?php echo $value[0]->year; ?></li>
       <li><?php echo $value[1]; ?></li>
     </ul>
     <form action="profile.php?id=<?php echo $value[2] ?>" method="post">
       <input type="submit" name="delete" value="OBRISI" />
     </form>
   <?php } ?>
   </body>
 </html>
