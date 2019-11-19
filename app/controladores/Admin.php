<?php 
  class Admin extends Controlador {

    public function __construct() {
      $this->modeloAdmin = $this->modelo('AdminModelo');
      $this->modeloProducto = $this->modelo('ProductoModelo');
      $this->modeloCompra = $this->modelo('CompraModelo');
      $this->validador = new Validator();
    }

    public function index() {
      session_start();
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        $datos = [
          "user_count" => $this->modeloAdmin->getCount(),
          "product_count" => $this->modeloProducto->getCount(),
          "compra_count" => $this->modeloCompra->getCount(),
          "user" => $this->modeloAdmin->getByAttribute("usuario", $_SESSION["user"])
        ];
        $this->vista('paginas/admin/index', $datos);
      } else {
        $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
        header('location: /webmaster/');
      }
    }

    public function usuarios() {
      session_start();
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        if(isset($_SESSION['logged_user']) && $_SESSION["logged_user"]->super_admin){
          $datos = [
            "user" => $this->modeloAdmin->getAll(),
            "cantidad" => $this->modeloAdmin->getCount()
          ];
          $this->vista('paginas/admin/user', $datos);
        } else {
          $_SESSION["error"] = "No tienes permisos para usar este modulo";
          header('location: /webmaster/admin/index.php');
        }
      } else {
        $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
        header('location: /webmaster/');
      } 
    }

    public function compras() {
      session_start();
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        $datos = [
          "compras" => $this->modeloCompra->getAll(),
        ];
        $datos =json_encode($datos);
        echo $datos;
        return;
        $this->vista('paginas/admin/productos', $datos);
      } else {
        $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
        header('location: /webmaster/');
      }
    }


    public function createProductsPDF() {
      session_start();
      $expected_values = ['reporte_name'];
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {

        foreach ($expected_values as $value) {
          if(!array_key_exists($value, $_POST)) {
            $_SESSION['error'] = "Falta valor: $value en parametros";
            header('location: /webmaster/admin/productos/');
          }
        }

        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('NovaStudio');
        $pdf->SetTitle($_POST['reporte_name']);
        $pdf->setPrintHeader(false); 
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(20, 20, 20, false); 
        $pdf->SetAutoPageBreak(true, 20); 
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->addPage();
        $productos = $_SESSION['productos'];
        $content = '';
        $content .= '
          <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align:center;">'.$_POST['reporte_name'].'</h1>
  
            <table border="1" cellpadding="5">
              <thead>
                <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripcion</th>
                </tr>
              </thead>
        ';
        $content.="<tbody>";
        foreach ($productos as $product) {
          $content.="
            <tr>
              <td>$product->nombre</td>
              <td>$product->precio</td>
              <td>$product->descripcion</td>
            </tr>
          ";
        }
        $content.="</tbody>";
        $content .= '</table>';

        // unsetting
        foreach ($expected_values as $value) {
          unset($_POST[$value]);
        }
        unset($_SESSION["productos"]);
        ob_end_clean();
        $pdf->writeHTML($content, true, 0, true, 0);
        $pdf->lastPage();
        $pdf->output('ReporteCompra.pdf', 'I');
      }

    }

    public function updateProduct() {
      session_start();
      $expected_values = ['name', 'precio', 'descripcion', 'id'];
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        foreach ($expected_values as $value) {
          if(!array_key_exists($value, $_POST)) {
            $_SESSION['error'] = "Falta valor: $value en parametros";
            header('location: /webmaster/admin/productos/');
          }
        }
        $currentProduct = $this->modeloProducto->getById($_POST['id']);
        $nombre_imagen = $_FILES['imagen']['name'];
        $validator = $nombre_imagen!=='';
        $imagen = $validator ? RUTA_URL."/public/images/uploaded/".$nombre_imagen : $currentProduct->imagen;
        $path = $_SERVER['DOCUMENT_ROOT']."/webmaster/public/images/uploaded/".$nombre_imagen;
        $datos = [
          "nombre" => $_POST['name'],
          "precio" => $_POST['precio'],
          "descripcion" => $_POST['descripcion'],
          "imagen" => $imagen,
          "server_image" => $validator ? $path : null
        ];


        $id = $_POST['id'];

        // unsetting
        foreach ($expected_values as $value) {
          unset($_POST[$value]);
        }

        if($_FILES['imagen']['size'] > 2097152) {
          $_SESSION['error'] = "La imagen no puede pesar mas de 2MB";
          header('location: /webmaster/admin/productos');          
        }

        $result = $this->modeloProducto->updateById($id, $datos);
        if ($result >= 0) {
          if($validator) move_uploaded_file($tmp_file, $path);
          $_SESSION["success"] = "Se han actualizados $result producto(s)";
          header('location: /webmaster/admin/productos');
        } else {
          $_SESSION["error"] = "Ha ocurrido un error";
          header('location: /webmaster/admin/productos');
        }
      } else {
        $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
        header('location: /webmaster/');
      }
    }

    public function createProduct() {
      session_start();
      $expected_values = ['name', 'precio', 'descripcion'];
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        foreach ($expected_values as $value) {
          if(!array_key_exists($value, $_POST)) {
            $_SESSION['error'] = "Falta valor: $value en parametros";
            header('location: /webmaster/admin/productos/');
          }
        }
        $nombre_imagen = $_FILES['imagen']['name'];
        $validator = $nombre_imagen!=='';
        $imagen = RUTA_URL."/public/images/uploaded/".$nombre_imagen;
        $path = $_SERVER['DOCUMENT_ROOT']."/webmaster/public/images/uploaded/".$nombre_imagen;
        $datos = [
          "nombre" => $_POST['name'],
          "precio" => $_POST['precio'],
          "descripcion" => $_POST['descripcion'],
          "imagen" => $validator ? $imagen : RUTA_URL."/public/images/uploaded/default.png",
          "server_image" => $validator ? $path : null
        ];

        $tmp_file = $_FILES['imagen']['tmp_name'];

        //Unsetting
        foreach ($expected_values as $value) {
          unset($_POST[$value]);
        }

        if($_FILES['imagen']['size'] > 2097152) {
          $_SESSION['error'] = "La imagen no puede pesar mas de 2MB";
          header('location: /webmaster/admin/productos');          
        }

        move_uploaded_file($tmp_file, $path);

        $result = $this->modeloProducto->createItem($datos);
        if($result > 0) {
          $_SESSION["success"] = "Se han actualizados $result producto(s)";
          header('location: /webmaster/admin/productos');
        } else {
          $_SESSION["error"] = "Ha ocurrido un error";
          header('location: /webmaster/admin/productos');
        }
      } else {
        $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
        header('location: /webmaster/');
      }
    }

    public function deleteProduct() {
      session_start();
      $expected_values = ['id'];
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        foreach ($expected_values as $value) {
          if(!array_key_exists($value, $_POST)) {
            $_SESSION['error'] = "Falta valor: $value en parametros";
            header('location: /webmaster/admin/productos/');
          }
        }
        
        $id = $_POST['id'];

        //Unsetting
        foreach ($expected_values as $value) {
          unset($_POST[$value]);
        }

        $result = $this->modeloProducto->deleteProductById($id);
        if($result > 0) {
          $_SESSION["success"] = "Se han eliminado $result producto(s)";
          header('location: /webmaster/admin/productos');
        } else {
          $_SESSION["error"] = "Ha ocurrido un error";
          header('location: /webmaster/admin/productos');
        }        
    } else {
      $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
      header('location: /webmaster/');
    }
  }
    
  public function getProductosbyId() {
    session_start();
    if(isset($_SESSION['logged']) && $_SESSION['logged']) {
      if(isset($_GET['id']) && $_GET['id']) {
        $datos = [
          "producto" => $this->modeloProducto->getById($_GET['id'])
        ];
        $response = json_encode($datos);
        echo $response;
      } else {
        $datos = [
          "error" => "parametros no enviados"
        ];
        $response = json_encode($datos);
        echo $response;
      }
    } else {
      $datos = [
        "error" => "no tienes privilegios para esta consulta"
      ];
      $response = json_encode($datos);
    }
  }

  public function productos() {
    session_start();
    if(isset($_SESSION['logged']) && $_SESSION['logged']) {
      $datos = [
        "productos" => $this->modeloProducto->getAllProducts(),
        "cantidad" => $this->modeloProducto->getProductsCount()
      ];
      $this->vista('paginas/admin/productos', $datos);
    } else {
      $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
      header('location: /webmaster/');
    }
  }
    public function createUser() {
      session_start();
      $expected_values = [
        'name', 
        'apellido', 
        'username', 
        'password', 
        'password-repeat',
        'admin'
      ];

      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        if(isset($_SESSION['logged_user']) && $_SESSION["logged_user"]->super_admin){
          foreach ($expected_values as $value) {
            if(!array_key_exists($value, $_POST) && !empty($_POST[$value])) {
              $_SESSION['error'] = "Falta valor: $value en parametros";
              header('location: /webmaster/admin/usuarios/');
            }
          }

          $datos = [
            'nombre' => $_POST['name'],
            'apellido' => $_POST['apellido'],
            'usuario' => $_POST['username'],
            'clave' => $_POST['password'],
            'super_admin' => $_POST['admin'] == "admin"
          ];

          $passwordConfirm = $_POST['password-repeat'];

          //Unsetting
          foreach ($expected_values as $value) {
            unset($_POST[$value]);
          }

          //Starting validations
          $validador = [
            'nombre' => $this->validador->onlyLettersValidator($datos['nombre']),
            'apellido' => $this->validador->onlyLettersValidator($datos['apellido']),
            'usuario' => $this->validador->onlyLettersValidator($datos['usuario']),
            'clave' => $this->validador->passwordValidator($datos['clave']),
            'confirma_clave' => $this->validador->passwordConfirmValidator($datos['clave'], $passwordConfirm)
          ];

          // Returning falsies

          $falsies = array_filter($validador, function($valid_object) {
            return !$valid_object['pass'];
          });

          //Means that there are errors
          if (count($falsies) > 0) {
            $error = '<br><ul>';
            // Asambling the Error String
            foreach ($falsies as $key => $value) {
              $message = $value["message"];
              $error.= "<li>Error en $key: $message</li>";
            }
            $error.="</ul>";
            $_SESSION["error"] = $error;
            header("location: /webmaster/admin/usuarios");
          }

          // If follow here... then there's everything Ok
          // Starting to save new User
          $result = $this->modeloAdmin->createItem($datos);
          if($result > 0) {
            $_SESSION["success"] = "Se ha creado $result usuario(s)";
            header('location: /webmaster/admin/usuarios');
          } else {
            $_SESSION["error"] = "Ha ocurrido un error";
            header('location: /webmaster/admin/usuarios');
          }
        } else {
          $_SESSION['error'] = "No tienes permiso para realizar esta accion";
          header('location: /webmaster/admin/');
        }
      } else {
        $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
        header('location: /webmaster/');
      }
    }

    public function checkUserExistence(){
      session_start();
      $expected_values = ['username'];
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        if(isset($_SESSION['logged_user']) && $_SESSION["logged_user"]->super_admin){
            foreach ($expected_values as $value) {
            if(!array_key_exists($value, $_GET)) {
              $_SESSION['error'] = "Falta valor: $value en parametros";
              header('location: /webmaster/admin/productos/');
            }
          }
          $username = $_GET['username'];
          foreach ($expected_values as $value) {
            unset($_GET[$value]);
          }
          $result = $this->modeloAdmin->getUsernameExistence($username);
          $dato = [
            "code" => $result ? 1 : 2,
            "response" => $result ? "El usuario ya ha sido tomado": ""
          ];
          $response = json_encode($dato);
          echo $response;
        } else {
            $_SESSION["error"] = "No tienes permisos para usar este modulo";
            header('location: /webmaster/admin/index.php');
        } 
      }else {
        $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
        header('location: /webmaster/');
      } 
    }


    public function getUserById() {
      $expected_values = ['id'];
      session_start();
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        if(isset($_SESSION['logged_user']) && $_SESSION["logged_user"]->super_admin){
            foreach ($expected_values as $value) {
            if(!array_key_exists($value, $_GET)) {
              $_SESSION['error'] = "Falta valor: $value en parametros";
              header('location: /webmaster/admin/usuarios/');
            }

            $id = $_GET['id'];
            unset($_GET['id']);
            $result = $this->modeloAdmin->getById($id);
            if($result) {
              echo json_encode([
                "user" => $result
              ]);
            } else {
              echo json_encode([
                "user" => $result
              ]);
            }
          }
          } else {
            $_SESSION["error"] = "No tienes permisos para usar este modulo";
            header('location: /webmaster/admin/index.php');
        } 
      }else {
        $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
        header('location: /webmaster/');
      } 
    }


    public function deleteUser() {
      session_start();
      $expected_values = ['id'];
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        foreach ($expected_values as $value) {
          if(!array_key_exists($value, $_POST)) {
            $_SESSION['error'] = "Falta valor: $value en parametros";
            header('location: /webmaster/admin/productos/');
          }
        }
        
        $id = $_POST['id'];

        //Unsetting
        foreach ($expected_values as $value) {
          unset($_POST[$value]);
        }

        $result = $this->modeloAdmin->deleteById($id);
        if($result > 0) {
          $_SESSION["success"] = "Se han eliminado $result usuario(s)";
          header('location: /webmaster/admin/usuarios');
        } else {
          $_SESSION["error"] = "Ha ocurrido un error";
          header('location: /webmaster/admin/usuarios');
        }        
      } else {
        $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
        header('location: /webmaster/');
      }
    }

    public function updateUser() {
      session_start();
      $expected_values = [
        'name', 
        'apellido', 
        'username', 
        'password', 
        'password-repeat',
        'admin',
        'id'
      ];
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        foreach ($expected_values as $value) {
          if(!array_key_exists($value, $_POST)) {
            $_SESSION['error'] = "Falta valor: $value en parametros";
            header('location: /webmaster/admin/usuarios/');
          }
        }
        
        $datos = [
          "nombre" => $_POST['name'],
          "apellido" => $_POST['apellido'],
          "usuario" => $_POST['username'],
          "clave" => $_POST['password'],
          "super_admin" => $_POST['admin'] == "admin"
        ];


        $id = $_POST['id'];
        $passwordConfirm = $_POST['password-repeat'];
        //Unsetting
        foreach ($expected_values as $value) {
          unset($_POST[$value]);
        }

        //Starting validations
        $validador = [
          'nombre' => $this->validador->onlyLettersValidator($datos['nombre']),
          'apellido' => $this->validador->onlyLettersValidator($datos['apellido']),
          'usuario' => $this->validador->onlyLettersValidator($datos['usuario']),
          'clave' => $this->validador->passwordValidator($datos['clave']),
          'confirma_clave' => $this->validador->passwordConfirmValidator($datos['clave'], $passwordConfirm)
        ];

        // Returning falsies
        $falsies = array_filter($validador, function($valid_object) {
          return !$valid_object['pass'];
        });

        // unsetting
        foreach ($expected_values as $value) {
          unset($_POST[$value]);
        }

        //Means that there are errors
        if (count($falsies) > 0) {
          $error = '<br><ul>';
          // Asambling the Error String
          foreach ($falsies as $key => $value) {
            $message = $value["message"];
            $error.= "<li>Error en $key: $message</li>";
          }
          $error.="</ul>";
          $_SESSION["error"] = $error;
          header("location: /webmaster/admin/usuarios");
        }

        $result = $this->modeloAdmin->updateById($id, $datos);
        if ($result > 0) {
          $_SESSION["success"] = "Se han actualizados $result usuario(s)";
          header('location: /webmaster/admin/usuarios');
        } else {
          $_SESSION["error"] = "Ha ocurrido un error";
          header('location: /webmaster/admin/usuarios');
        }
      } else {
        $_SESSION['error'] = "Tienes que estar loggeado para poder visitar esta pagina";
        header('location: /webmaster/');
      }
    }

    public function createUsersPDF() {
      session_start();
      $expected_values = ['reporte_name', 'tipo'];
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {

        foreach ($expected_values as $value) {
          if(!array_key_exists($value, $_POST)) {
            $_SESSION['error'] = "Falta valor: $value en parametros";
            header('location: /webmaster/admin/usuarios/');
          }
        }

        $tipo = $_POST["tipo"];
        $usuarios = [];
        if ($tipo == "none")
          $usuarios = $this->modeloAdmin->getAll();
        else 
          $usuarios = $this->modeloAdmin->getByAttribute('super_admin', $tipo == "admin");
        // var_dump($tipo == "none");
        // return;
        $string_reporte = $_POST['reporte_name'];
        if ($tipo == "none" ) $string_complemento = "Todos los usuarios";
        if ($tipo == "admin" ) $string_complemento = "Usuarios Administradores";
        if ($tipo == "normal" ) $string_complemento = "Usuarios Normales";
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('NovaStudio');
        $pdf->SetTitle("$string_reporte - $string_complemento");
        $pdf->setPrintHeader(false); 
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(20, 20, 20, false); 
        $pdf->SetAutoPageBreak(true, 20); 
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->addPage();
        $content = '';
        $content .= '
          <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align:center;">'.$string_reporte ." - ". $string_complemento.'</h1>
            
        ';
        if($usuarios) {
          $content.='<table border="1" cellpadding="5">
              <thead>
                <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Super Admin</th>
                </tr>
              </thead><tbody>';
          foreach ($usuarios as $usuario) {
            $admin = $usuario->super_admin ? 'Admin' : 'Normal';
            $content.="
              <tr>
                <td>$usuario->nombre</td>
                <td>$usuario->apellido</td>
                <td>$usuario->usuario</td>
                <td>$usuario->clave</td>
                <td>$admin</td>
              </tr>
            ";
          }
          $content.="</tbody>";
          $content .= '</table>';
        } else {
          $content.='<h2 style="text-align:center;">No hay usuarios para mostrar</h2>';
        }

        // unsetting
        foreach ($expected_values as $value) {
          unset($_POST[$value]);
        }
        ob_end_clean();
        $pdf->writeHTML($content, true, 0, true, 0);
        $pdf->lastPage();
        $pdf->output('Reporte.pdf', 'I');
      }

    }


    public function loggin() {
      session_start();
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        echo "<script type='text/javascript'>window.location.href = './index.php';</script>";
      } else {
        $this->vista('paginas/admin/login');
      }
    }

    public function doLoggin() {
      session_start();
      if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        header('location: /webmaster/admin');
      } else {
        if( isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['password']) && !empty($_POST['password']) ) {
          $user = $_POST['user'];
          $password = $_POST['password'];
          $countRegister = $this->modeloAdmin->doLoggin($user, $password);
          switch ($countRegister) {
            case 0:
              $array = ["response" => "<br/><br/><b>Error en los datos</b>"];
              $response = json_encode($array);
              echo $response;
              break;
            case 1:
              $_SESSION['logged'] = true;
              $_SESSION['user'] = $user;
              $_SESSION['logged_user'] = $this->modeloAdmin->getUser($user, $password);
              echo "<script type='text/javascript'>window.location.href = './index.php';</script>";
              break;
            default:
              $_SESSION['error'] = "Ocurrio un error reportalo con los administradores";
              break;
          }
        }
      }
    }

    public function destroySession() {
      session_start();
      session_destroy();
      session_unset();
      echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";

      // header('location: /webmaster/');
    }
  }
?>