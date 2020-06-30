<?php

require_once('core/start.php');
$db = Database::connect();

if(!isset($_GET['id'])) {
  Redirect::to('index.php');
}

$id = $_GET['id'];
// echo $id;

$sql = "SELECT * FROM `films` WHERE id = ?";

$film = $db->query($sql, [$id])->results();
// print_r($film);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ARTHAUS KINO | <?php echo $film[0]->film_name." (".$film[0]->year.")"; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Fanwood+Text&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
  </head>
  <body>
    <?php include('./templates/header.php'); ?>
    <div class="film-wrapper">
      <div class="poster" id="film-poster">
        <img src="<?php echo $film[0]->poster ?>" alt="">
        <span class="film-name"><?php echo $film[0]->film_name." (".$film[0]->year.")"; ?></span>
      </div>

      <div class="info">
        <span><label for="">Dužina trajanja: </label> <?php echo $film[0]->runtime ?> </span><br>
        <span><label for="">Žanr: </label> <?php echo $film[0]->genre ?> </span><br>
        <span><label for="">Režiser: </label> <?php echo $film[0]->director ?> </span><br>
        <span><label for="">Uloge: </label> <?php echo $film[0]->actors ?> </span><br>
        <span><label for="">Dužina trajanja: </label> <?php echo $film[0]->runtime ?> </span><br>
        <span><label for="">Jezik: </label> <?php echo $film[0]->language ?> </span><br>
        <span><a href="https://www.imdb.com/title/<?php echo $film[0]->imdb_id ?>"><img class="imdb" src="./img/imdb-logo.png" alt=""></a></span>
      </div>
    </div>
  </body>
</html>
