<?php

class Film {
  private $db, $data;

  public function __construct() {
		$this->db = Database::connect();
	}

  public function create($fields) {
		if(!$this->db->insert('films', $fields)) {
			throw new Exception ('There was a problem creating your account.');
		}
  }

  public function checkImdb($input) {
    if(strlen($input) == 9 && substr($input, 0, 2) == 'tt' && is_numeric(substr($input, 2))) {
      return true;
    }
    else {
      return false;
    }
  }

  public function myFilms($user_id) {
    $sql = "SELECT `showings_id`, `id` FROM `users_films` WHERE `user_id` = ?";
    $shows = $this->db->query($sql, [$user_id])->results();
    // print_r($shows);

    $sql2 = "SELECT `film_id`, `times` FROM `showings` WHERE `id` = ?";
    foreach($shows as $show) {
      $film_id = $this->db->query($sql2, [$show->showings_id])->results();
      $film_ids[] = [$film_id[0], $show->id];
      // print_r($film_id);
    }
    // print_r($film_ids);
    return $film_ids;

  }
}
 ?>
