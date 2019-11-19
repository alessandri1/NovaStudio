<?php include RUTA_APP . "/vistas/inc/admin/modal.php" ?>

<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/admin/product.css">
<center>
  <div style="width: 70%;">
<?php if($datos['cantidad'] > 0): ?>
<button style="margin-right: 1000px;" class = "btn btn-success" id="crear">Crear</button>
    <table class="table table-bordred table-striped">
      <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Compañia</th>
        <th>Producto</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </thead>
      <tbody>
        
        <?php foreach ($datos['compras'] as $value) : ?>
          <tr>
            <td>
              <?php echo $value->nombre ?>
            </td>
            <td>
              <?php echo $value->apellido ?>
            </td>
            <td>
              <?php echo $value->email ?>
            </td>
            <td>
              <?php echo $value->compania ?>
            </td>
            <td>
              <?php echo $value->producto_id ?>
            </td>
            <td>
              <?php echo ($value->descripcion !== "" || $value->descripcion !== null) ? $value->descripcion : " - " ?>
            </td>
            <td>
              <div class="img-preview">
                <img src="<?php echo $value->imagen?>" id="imgPreview" alt="">
              </div>
            </td>
            <td>
              <button edit="<?php echo $value->id ?>" class="btn btn-primary edit">Editar</button>
            </td>
            <td>
              <button delete="<?php echo $value->id ?>" class="btn btn-danger delete">Eliminar</button>
            </td>
          </tr>
        <?php endforeach;?>

      </tbody>
    </table>
    <div class="col-md-12">
      <form method="post" target="_blank" action="/webmaster/admin/createProductsPDF" id="idOfForm">
        <input type="hidden" name="reporte_name" value="Reporte de Productos">
        <?php $_SESSION["productos"] = $datos["productos"]; ?>
        <input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
      </form>
    </div>
<?php else: ?>
<div id="no-product" class="text-center">
  <h1>No hay productos para mostrar</h1>
  <h3>Intenta creando uno</h3>
  <button class = "btn btn-success" id="crear">Crear</button>
</div>
<?php endif; ?>
</div>
</center>