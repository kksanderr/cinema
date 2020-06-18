<?php

  class Database {
    private static $connection = null;

    private $pdo,
            $query,
            $results,
            $error = false,
            $count = 0;

    private function __construct() {
      try {
        $this->pdo = new PDO(Config::DB_SOURCE, Config::DB_USER, Config::DB_PASS);
      }
      catch (PDOException $e) {
        die($e->getMessage());
      }
    }

    public static function connect() {
      if(!isset(self::$connection)) {
        self::$connection = new Database();
      }
      return self::$connection;
    }
    // $params = ['ivan', 'nikolic', 'adresa']
    public function query($sql, $params = []) {
      $this->error = false;
      $this->count = 0;
      $this->query = $this->pdo->prepare($sql);

      if($this->query) {
        // bindovanje parametara
        if(count($params)) {
          $i=1;
          foreach($params as $param) {
            $this->query->bindValue($i, $param);
            $i++;
          }
        } //end if(count($params))
        if($this->query->execute()) {
          $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
          $this->count = $this->query->rowcount();
        }
        else {
          $this->error = true;
        }
      } // end if($this->query)
      return $this;
    } // end query

    public function results() {
      return $this->results;
    }

    public function first() {
      if(!empty($this->results)) {
        return $this->results()[0];
      }
      return null;
    }

    public function count() {
      return $this->count;
    }

    //CRUD - create, read, update, delete

    // insert
    public function insert($table, $fields=[]) {
      $values = '';
      $i = 1;

      foreach($fields as $field) {
        $values .= '?';

        if($i<count($fields)) {
          $values .= ', ';
        }
        $i++;
      }

      $sql = "INSERT INTO {$table} VALUES ({$values})";
      $this->query($sql, $fields);
      if(!$this->error) {
        return true;
      }
      return false;
    }

    // find
    // $where = ['ime', 'bojana'];
    // metod prima niz u kome je prvi clan polje a drugi vrednost
    // dodati operator u metodu, domaci
    // public function find($table, $where=[], $log_operators=[]) {
    //   if(count($where)===3) {
    //      $sql = "SELECT * FROM {$table} WHERE ";
    //      $i = 0;
    //      $value=[];
    //
    //      // visedimenzionalni nizovi
    //      if(is_array($where[0])) {
    //         while($i < count($where[0])) {
    //           $field = $where[0][$i];
    //           array_push($value, $where[1][$i]);
    //           $operator = $where[2][$i];
    //
    //           if(isset($log_operators[$i])) {
    //             $sql .= "{$field} {$operator} ? $log_operators[$i] ";
    //           }
    //           else {
    //             $sql .= "{$field} {$operator} ?";
    //           }
    //           $i++;
    //         }
    //       $this->query($sql, $value);
    //     }
    //
    //     // jednodimenzionalni nizovi
    //     else {
    //       $field = $where[0];
    //       $value = $where[1];
    //       $operator = $where[2];
    //
    //       $sql .= "{$field} {$operator} ?";
    //       $this->query($sql, [$value]);
    //     }
    //
    //     if(!$this->error) {
    //       return $this;
    //     }
    //   }
    //   return null;
    // }


    public function find($table, $field, $value) {
             $sql = "SELECT * FROM {$table} WHERE {$field} = ?" ;

              $this->query($sql, [$value]);
              if(!$this->error) {
                return $this;
            }

         return null;
    }

    // update
    // $fields = [
    //   'ime' => 'Zoran',
    //   'prezime' => 'Kostic'
    // ];
    public function update($table, $id, $fields=[]) {
      $set = '';
      $i = 1;
             //array as $key => $value
      foreach($fields as $field => $value) {
        $set .= "{$field} = ?";
        if($i < count($fields)) {
          $set .= ', ';
        }

        $i++;
      }
      $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
      $this->query($sql, $fields);
      if(!$this->error) {
        return true;
      }
      return false;
    }

    // delete
    public function delete($table, $id) {
      $sql = "DELETE FROM {$table} WHERE id = ?";
      $this->query($sql, [$id]);
      if($this->count()) {
        return true;
      }
      return false;
    }

  }

 ?>
