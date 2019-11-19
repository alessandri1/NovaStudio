<?php 
  
  class Shop extends Controlador {
    public function __construct() {
    }

    public function index() {      
      $this->vista('paginas/shop');
    }
  }
?>