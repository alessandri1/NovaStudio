<?php 
  
  class Compras extends Controlador {
    public function __construct() {
      $this->articuloModelo = $this->modelo('Articulo');
      $this->modeloProducto = $this->modelo('ProductoModelo');
      $this->modeloCompra = $this->modelo('CompraModelo');
      $this->validador = new Validator();
    }

    public function producto($producto_id) {
      $producto = $this->modeloProducto->getById($producto_id);
        $datos = [
          "producto_id" => $producto_id,
          "producto" => $producto
        ];
      if($producto){
        $this->vista('paginas/payment', $datos);
      } else {
        header("location: /webmaster/productos");
      }
    }

    public function realizarCompra() {
      session_start();
      $expected_values = [
        "nombre", 
        "apellido", 
        "email", 
        "email-confirma",
        "producto_id"
      ];

      $redirect = (isset($_POST['producto_id']) && !empty($_POST['producto_id'])) ? "/webmaster/compras/producto/".$_POST["producto_id"] : "/webmaster/productos/";
      foreach ($expected_values as $value) {
        if(!array_key_exists($value, $_POST)) {
          $_SESSION['error'] = "Falta valor: $value en parametros";
          header("location: $redirect");
        }
      }

      $company = (isset($_POST['company']) && !empty($_POST['company'])) ? $_POST['company'] : null;
      $datos = [
        "nombre" => $_POST["nombre"],
        "apellido" => $_POST["apellido"],
        "email" => $_POST["email"],
        "producto_id" => $_POST["producto_id"],
        "compania" => $company
      ];
      $emailConfirma = $_POST['email-confirma'];
      $validador = [
        'nombre' => $this->validador->onlyLettersValidator($datos['nombre']),
        'apellido' => $this->validador->onlyLettersValidator($datos['apellido']),
        'email' => $this->validador->validateCorreo($datos['email']),
        'email-confirma' => $this->validador->emailConfirmValidator($datos['email'], $emailConfirma)
      ];

      // Returning falsies

      $falsies = array_filter($validador, function($valid_object) {
        return !$valid_object['pass'];
      });

      if (count($falsies) > 0) {
        $error = '<br><ul>';
        // Asambling the Error String
        foreach ($falsies as $key => $value) {
          $message = $value["message"];
          $error.= "<li>Error en $key: $message</li>";
        }
        $error.="</ul>";
        $_SESSION["error"] = $error;
        header("location: $redirect");
      }

      $result = $this->modeloCompra->createItem($datos);
      if($result > 0) {
        $_SESSION["success"] = "Se ha creado $result compra(s)";
        $id = $this->modeloCompra->getLastId();
        $id = $id->id;
        header("location: /webmaster/compras/detalles/$id");
      } else {
        $_SESSION["error"] = "Ha ocurrido un error";
        header("location: $redirect");
      }
      return;

    }

    public function detalles($id) {
      $compra = $this->modeloCompra->getById($id);
      if($compra) {
        $producto = $this->modeloProducto->getById($compra->producto_id);
        $datos["compra"] = $compra;
        $datos["producto"] = $producto;
        $this->vista('paginas/checkout', $datos);
      } else {
        $_SESSION["error"] = "Esta pagina no existe";
        header("location: /webmaster/");
      }
    }

    public function imprimir($id) {
      $compra = $this->modeloCompra->getById($id);
      if($compra) {
        $producto = $this->modeloProducto->getById($compra->producto_id);
        $string_reporte = "Reporte de compra";
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('NovaStudio');
        $pdf->SetTitle("$string_reporte");
        $pdf->setPrintHeader(false); 
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(20, 20, 20, false); 
        $pdf->SetAutoPageBreak(true, 20); 
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->addPage();
        $content = '';
        $content .= "<div class ='container'>
          <div class = 'row'>
            <div class = 'col-md-12 text-cetner'>
            <h3>Detalles de tu compra: </h3>
            <h4>Detalles del Cliente:</h4>
            <hr/>
            <h5>Nombre: $compra->nombre</h5>
            <h5>Apellido: $compra->apellido</h5>
            <h5>Email: $compra->email</h5>
            <h5>Compañia: $compra->compania</h5>
            <hr/>
            <h4>Detalles del Producto: </h4>
            <hr />
            <h5>Nombre: $producto->nombre</h5>
            <h5>Descripcion: $producto->descripcion</h5>
            <h5>Precio: $producto->precio</h5>

            </div>
          </div>
        </div>";
        ob_end_clean();
        $pdf->writeHTML($content, true, 0, true, 0);
        $pdf->lastPage();
        $pdf->output('Reporte.pdf', 'I');
      }
      
    }

  }
?>