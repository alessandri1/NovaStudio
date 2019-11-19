<?php 
  /**
   * Get the URL on the web browser.
   * 1 - Controlador
   * 2 - Metodo
   * 3 - Parametro
   * Ejemplo: /artiulos/actualizar/4
   */

   class Core {
     protected $controladorActual = 'Paginas';
     protected $metodoActual = 'index';
     protected $parametros = [];

     public function __construct() {
       $url = $this->getUrl();
      // Check if controllers if controller existe
       if(file_exists('../app/controladores/' . ucwords($url[0]).'.php' )) {
        // if exists is setted as default Controller
        $this->controladorActual = ucwords($url[0]);
        unset($url[0]);
       }
       require_once '../app/controladores/' . $this->controladorActual . '.php';
       $this->controladorActual = new $this->controladorActual;

       //Checking the rest of the URL

       //Checking for method
       if(isset($url[1])){
         if(method_exists($this->controladorActual, $url[1])) {
           $this->metodoActual = $url[1];
           unset($url[1]);
         }
       }

       // echo $this->metodoActual;

       //Checking for params
       $this->parametros = $url ? array_values($url) : [];
       call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);

     }

     public function getUrl() {
       //echo $_GET['path'];
       if (isset($_GET['path'])) {
         $path = rtrim($_GET['path'], '/');
         $path = filter_var($path, FILTER_SANITIZE_URL);
         $path = explode('/', $path);
         return $path;
       }
     }
   }
?>