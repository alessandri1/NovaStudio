<?php 

  class Articulo {
    private $db;

    public function __construct() {
      $this->db = new Base;
    }

    public function obtenerArticulos() {
      $this->db->query("SELECT * FROM states");

      return $this->db->registro();
    }
  }

?>