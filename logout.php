<?php
require_once('core/start.php');
$user->logout();

Redirect::to('index.php');
