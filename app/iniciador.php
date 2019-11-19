<?php
  //Loading libs
  require_once 'config/Configurar.php';

  //Autoload PHP

  spl_autoload_register(function($name) {
    require_once 'librerias/'.$name.'.php';
  });

  require_once 'helpers/tcpdf/tcpdf.php';
  require_once 'helpers/Validator.php';
?>