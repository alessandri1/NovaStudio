<?php 

  class AdminModelo extends Modelo {
    
    public function __construct() {
      $this->name = "vendedor";
      $this->db = new Base;
    }

    public function doLoggin($user, $password) {
      $this->db->query("SELECT * FROM vendedor WHERE usuario = '$user' AND clave = '$password'");
      return $this->db->rowCount();
    }

    public function getUser($user, $password) {
      $this->db->query("SELECT * FROM vendedor WHERE usuario = '$user' AND clave = '$password'");
      return $this->db->registro();
    }

    public function getUsernameExistence($username) {
      $query = "SELECT * FROM $this->name WHERE usuario = '$username'";
      $this->db->query($query);
      return $this->db->rowCount() > 0;
    }

    public function updateById($id, $valueChanged) {
      $subquery = "";
      foreach ($valueChanged as $key => $value) {
        $subquery .= "$key = '$value', ";
      }

      $subquery = substr($subquery, 0, -2);
      $query = "UPDATE $this->name SET $subquery WHERE id = '$id'";

      $this->db->query($query);
      return $this->db->rowCount();
    }
  }

?>