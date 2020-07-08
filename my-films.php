<?php

  require_once('core/start.php');
  $db = Database::connect();

  if(!isset($_GET['show_id'])) {
    Redirect::to('index.php');
  }

  $user_id = $user->data()->id;
  $showings_id = $_GET['show_id'];

  $data = [
    NULL,
    $user_id,
    $showings_id
  ];

  // print_r($data);
  $sql = "SELECT * FROM `users_films` WHERE `user_id` = ? AND `showings_id` = ?";
  if(empty($db->query($sql, [$user_id, $showings_id])->results())) {
    $db->insert('users_films', $data);
  }
  Redirect::to('index.php');
 ?>
