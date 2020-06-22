<?php

class Post {

  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  public function create($fields) {
    if(!$this->db->insert('posts', $fields)) {
      throw new Exception ('There was a problem creating your account.');
    }
  }

  public function getLatest($category, $limit = null) {
    $field = (is_numeric($category)) ? 'id' : 'title';
    $result = $this->db->find('categories', '$field, $category')->first();
    if($result) {
      $category_id = $result->id;
    }
    else {
      $category_id = null;
    }

    if($category_id) {
      $sql = "SELECT * FROM posts WHERE category_id = ? ORDER BY created_at DESC";

      if($limit) {
        $sql .= " LIMIT {$limit}";
      }

      return $this->db->query($sql, [$category_id])->results();
    }

    return null;
  }

  public function findByTitle($title) {
    return $this->db->find('posts', 'title', $title)->first();
  }

  public function findById($id) {
    return $this->db->find('posts', 'id', $id)->first();
  }

  public function findByAuthor($author) {
    return $this->db->find('posts', 'author', $author)->results();
  }
}

 ?>
