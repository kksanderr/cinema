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
}
 ?>
