<?php
  require_once('core/start.php');
  $db = Database::connect();

  if(Input::exists('post')) {
    $film = new Film();
    $data = [
      NULL,
      Input::get('title'),
      Input::get('year'),
      Input::get('runtime'),
      Input::get('genre'),
      Input::get('director'),
      Input::get('actors'),
      '',
      Input::get('language'),
      Input::get('poster'),
      Input::get('imdb_id')
    ];

    $film->create($data);
    // print_r($data);
    $sql = "SELECT `id` FROM `films` WHERE `imdb_id`=?";
    $film_id = $db->query($sql, [Input::get('imdb_id')])->results();
    // echo "<pre>";
    // $film_id = (array)$film_id;
    // $film_id = (array)$film_id[0];
    // var_dump($film_id);
    $film_id = (int) $film_id[0]->id;
    //$date = date_create_from_format('Y-m-d H:i:s', $_POST["datetime"]);

    $showings = new Showings();
    $data2 = [
      NULL,
      $film_id,
      date("Y-m-d h:i:s", strtotime($_POST["datetime"]))
    ];
    // var_dump($data2);
    $showings->create($data2);
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/main.css">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
  </head>
  <body class="panel">
    <a href="index.php"><< NAZAD</a>
    <form class="omdb" action="panel.php" method="get">
      <input type="text" name="imdbid" placeholder="IMDB ID">
      <input type="submit" name="" value="Prikazi">
    </form><hr>

<?php
  if (!empty($_GET["imdbid"])) {
    $imdbid = $_GET["imdbid"];

    $curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL, 'http://www.omdbapi.com/?i='.$imdbid.'&apikey=1081d8ec');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    $data = json_decode($output, true);
    curl_close($curl);
  }

?>
<form class="" action="panel.php" method="post">
  <label>Movie title</label>
  <input type="text" name="title" value="<?php isset($data["Title"]) ? print_r($data["Title"]) : '' ?>"><br>
  <label>Year</label>
  <input type="text" name="year" value="<?php isset($data["Year"]) ? print_r($data["Year"]) : '' ?>"><br>
  <label>Runtime</label>
  <input type="text" name="runtime" value="<?php isset($data["Runtime"]) ? print_r($data["Runtime"]) : '' ?>"><br>
  <label>Genre</label>
  <input type="text" name="genre" value="<?php isset($data["Genre"]) ? print_r($data["Genre"]) : '' ?>"><br>
  <label>Director</label>
  <input type="text" name="director" value="<?php isset($data["Director"]) ? print_r($data["Director"]) : '' ?>"><br>
  <label>Actors</label>
  <input type="text" name="actors" value="<?php isset($data["Actors"]) ? print_r($data["Actors"]) : '' ?>"><br>
  <label>Language</label>
  <input type="text" name="language" value="<?php isset($data["Language"]) ? print_r($data["Language"]) : '' ?>"><br>
  <label>IMDb ID</label>
  <input type="text" name="imdb_id" value="<?php isset($data["imdbID"]) ? print_r($data["imdbID"]) : '' ?>"><br>
  <label>Poster</label>
  <textarea name="poster" cols="50"><?php isset($data["Poster"]) ? print_r($data["Poster"]) : '' ?></textarea><br>
  <label>Vreme</label>
  <div id="datetimepicker" class="input-append date">
    <input type="text" name="datetime"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
    </span>
  </div>
  <div class="poster-wrapper"><img class="poster" src="<?php print_r($data["Poster"]); ?>" alt=""></div>
  <button type="submit" name="save">Sacuvaj</button><br>
    </form>


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
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'sr-RS'
      });
    </script>

  </body>
</html>
