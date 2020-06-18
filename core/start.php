<?php

  //pokretanje sesije
  session_start();

  //autoloader
  spl_autoload_register(function($class) {
    require_once 'classes/'.$class.'.php';
  });

// konekcija sa bazom
  $db = Database::connect();

  $user = new User();
  $user->checkLogin();
 ?>
