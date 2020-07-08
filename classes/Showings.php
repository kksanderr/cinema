<?php

class Showings {
  private $db, $data;

  public function __construct() {
		$this->db = Database::connect();
	}

  public function create($fields) {
		if(!$this->db->insert('showings', $fields)) {
			throw new Exception ('There was a problem creating your account.');
		}
  }

  // Vraca podatke za filmove na prosledjeni datum prikazivanja
  public function show($date) {
    $sql = "SELECT * FROM `showings` WHERE DATE(times) = ?";
    $sql2 = "SELECT * FROM `films` WHERE id = ?";
    // echo "<pre>";
    // print_r($this->db->query($sql, [$date])->count());
    $count = $this->db->query($sql, [$date])->count();
    $results = $this->db->query($sql, [$date])->results();
    // print_r($results);
    // echo $results[0]->id;
    // echo "<br>";
    $final = array();
    for ($i=0; $i < $count; $i++) {
      $film_info = $this->db->query($sql2, [$results[$i]->film_id])->results();
      $final[] = ['id'=>$film_info[0]->id, 'film_name'=>$film_info[0]->film_name,
                  'year'=>$film_info[0]->year, 'runtime'=>$film_info[0]->runtime,
                  'genre'=>$film_info[0]->genre, 'director'=>$film_info[0]->director,
                  'actors'=>$film_info[0]->actors, 'plot'=>$film_info[0]->plot,
                  'language'=>$film_info[0]->language, 'poster'=>$film_info[0]->poster,
                  'imdb_id'=>$film_info[0]->imdb_id, 'times'=>$results[$i]->times];
      // print_r($results[$i]->times);
      // $array[] = ['id'=>$results[$i]->id, 'times'=>$results[$i]->times];
    }
    // print_r($final);
    return $final;
  }

  public function radioChecked($name, $value) {
    if ((isset($_GET[$name]) && $_GET[$name] == $value)) {
    $checked = ' checked="checked"';
    echo $checked;
    }
  }

  // Vraca showings_id za prosledjen film_id i vreme prikazivanja
  public function returnShowingId($film, $time) {
    $sql = "SELECT * FROM `showings` WHERE `film_id` = ? AND `times` = ?";

    $id = $this->db->query($sql, [$film, $time])->results();
    // return $id;
    return $id[0]->id;
  }
}
 ?>
