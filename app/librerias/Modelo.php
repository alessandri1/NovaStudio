<?php 

  class Modelo {
    
    protected $db;
    protected $name;

    public function __construct() {
      $this->db = new Base;
    }

    public function getCount() {
      $this->db->query("SELECT * FROM $this->name");
      return $this->db->rowCount();
    }

    public function getByAttribute($attribute, $value, $name = "") {
      $name = $name == "" ? $this->name : $name;
      $this->db->query("SELECT * FROM $name WHERE $attribute = '$value'");
      $total = $this->db->rowCount();
      if($total < 1){
        return null;
      } else {
        return $this->db->registros();
      }
    }

    public function getAll() {
      $this->db->query("SELECT * FROM $this->name");
      return $this->db->registros();
    }

    public function getById($id, $name = "") {
      $name = $name == "" ? $this->name : $name;
      $this->db->query("SELECT * FROM $name WHERE id = '$id'");
      $total = $this->db->rowCount();
      if($total < 1){
        return null;
      } else {
        return $this->db->registro();
      }
    }

    public function getLastId() {
      return $this->db->lastId();
    }

    public function deleteById($id) {
      $query = ("DELETE FROM $this->name WHERE id = '$id'");
      $this->db->query($query);
      return $this->db->rowCount();
    }

    public function createItem($datos) {
      $keys = "";
      $values = "";
      foreach ($datos as $key => $value) {
        $keys .= "$key, ";
        $values .= "'$value', ";
      }

      $keys = substr($keys, 0,-2);
      $values = substr($values, 0,-2);
      $query = "INSERT INTO $this->name ($keys) VALUES ($values)";
      $this->db->query($query);
      return $this->db->rowCount();
    }

  }

?>