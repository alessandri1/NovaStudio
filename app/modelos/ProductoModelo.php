<?php 
  class ProductoModelo extends Modelo {

    public function __construct() {
      $this->name = "productos";
      $this->db = new Base;
    }

    /**
     * Hace UPDATE de parametros en POST de la tabla productos
     */
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

    public function getAllProducts() {
      $query = "SELECT * from $this->name WHERE deleted = 0";
      $this->db->query($query);
      return $this->db->registros();
    }

    public function getProductsCount() {
      $query = "SELECT * from $this->name WHERE deleted = 0";
      $this->db->query($query);
      return $this->db->rowCount();
    }

    public function deleteProductById($id) {
      $query = "UPDATE $this->name SET deleted = 1 WHERE id = '$id'";
      $this->db->query($query);
      return $this->db->rowCount();
    }
  }
?>