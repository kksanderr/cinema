<?php

class User {
  private $db,
          $data,
          $isLoggedIn = false;

  public function __construct() {
    $this->db = Database::connect();
  }

  public function create($fields) {
    if(!$this->db->insert('users', $fields)) {
      throw new Exception ('There was a problem creating your account.');
    }
  }

  public function find($user = null) {
    if($user) {
      $field = (is_numeric($user)) ? 'id' : 'email';
      $data = $this->db->find('users', $field, $user);
      if($data->count()) {
        $this->data = $data->first();
        return $this;
      }
    }
    return null;
  }

  public function login($email, $password) {
    if($this->find($email)) {
      $user = $this->data();

      //pass check
      if(Hash::make($password) === $user->password) {
        Session::set('user', $user->id);
        $this->isLoggedIn = true;
        return true;
      }
    }

    return false;
  }

  public function logout() {
    Session::delete('user');
    // session_destroy();
    return $this->isLoggedIn = false;
  }

  public function checkLogin() {
    if(Session::exists('user')) {
      if($this->find(Session::get('user'))) {
        return $this->isLoggedIn = true;
      }
    }
    return $this->isLoggedIn = False;
  }

  public function data() {
    return $this->data;
  }

  public function isLoggedIn() {
    return $this->isLoggedIn;
  }
}

 ?>
