<?php

  if(Session::exists('success')) {
    echo '<div class="msg success">'.Session::message('success').'</div>';
  }

  if(Session::exists('error')) {
    echo '<div class="msg error">'.Session::message('error').'</div>';
  }

  if(Session::exists('errors')) {
    $errors = Session::message('errors');
    foreach ($errors as $error) {
      echo '<div class="msg error mb-2">'.$error.'</div>';
    }
  }
 ?>
