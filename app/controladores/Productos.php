<?php 
  
  class Productos extends Controlador {
    public function __construct() {
      $this->articuloModelo = $this->modelo('Articulo');
      $this->modeloProducto = $this->modelo('ProductoModelo');
    }

    public function index() {
      $productos = $this->modeloProducto->getAll();
      $datos = [
        "productos" => $productos
      ];
      $this->vista('paginas/shop', $datos);
    }

    public function especifico($id) {
      $producto = $this->modeloProducto->getById($id);
      if($producto){
        $datos["producto"] = $producto;
        $this->vista('paginas/product', $datos);
      } else {
        header("location: /webmaster/productos");
      }
    }

  }
?>