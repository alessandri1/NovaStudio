<?php 
  class CompraModelo extends Modelo {

    public function __construct() {
      $this->name = "compra";
      $this->db = new Base;
    }

    public function getAllCompras() {
      $query = "SELECT DISTINCT compra.* FROM 
      compra INNER JOIN compra_producto INNER JOIN productos
      ON compra_producto.producto_id = productos.id
      AND compra_producto.compra_id = compra.id";
      $this->db->query($query);
      $compra = $this->db->registros();
      $query = "SELECT productos.nombre, productos.precio FROM productos INNER JOIN compra_producto WHERE compra_producto.compra_id = 1 AND compra_producto.producto_id = productos.id";
      $this->db->query($query);
      $products = $this->db->registros();
      return $products;
    }
  }
?>