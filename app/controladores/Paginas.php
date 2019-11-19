<?php 
  
  class Paginas extends Controlador {
    public function __construct() {
      $this->articuloModelo = $this->modelo('Articulo');
    }

    public function index() {
      $this->vista('paginas/index');
    }

    public function about() {
      $this->vista('paginas/about');
    }

    public function checkout() {
      $this->vista('paginas/checkout');
    }

    public function contact() {
      $this->vista('paginas/contact');
    }

    public function payment() {
      $this->vista('paginas/payment');
    }

    public function product() {
      $this->vista('paginas/product');
    }

    public function shop() {
      $this->vista('paginas/shop');
    }
  }
?>