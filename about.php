<?php
  require_once('core/start.php');
  $db = Database::connect();


  // public function isAdmin() {
  //   $sql = "SELECT role FROM 'users' WHERE ?";
  //   $result = query($sql, $user->data()->username);
  //   echo $result;
  // }
  //
  // isAdmin();

// Your code here!
$curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL, "http://www.omdbapi.com/?i=tt0060827&apikey=9bb1c226");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    // print_r($output);

    $data = json_decode($output, true);
    //json_last_error();
    //print_r($data);
    print_r($data["Title"]);
    echo "<br>";
    print_r($data["Year"]);
    echo "<br>";
    print_r($data["Poster"]);
    curl_close($curl);

 ?>
