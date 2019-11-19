


<?php include RUTA_APP . "/vistas/inc/admin/modal.php" ?>

<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/admin/user.css">
<center>
<div style="border:1px black solid;   box-shadow: 5px 10px; width: 85%; padding: 25px; ">

<?php if($datos['cantidad'] > 0): ?>
<div class="container mt-35 pb-35">
  <div class="row">
    <div class="col-md-6 "></div>
    <button class = "btn btn-success" id="crear-user">Crear</button>
    <div class="col-md-6">
      <form method="POST" class="form-inline pull-left text-center" target="_blank" action="/webmaster/admin/createUsersPDF">
        <h4 class = "text-center">Generar Reporte</h4>
        <div class="form-group">
          <label for="tipo">Tipo:</label>
          <select name="tipo" id="tipo" class="form-control">
            <option value="none">Sin aplicar</option>
            <option value="admin">Admin</option>
            <option value="normal">Normal</option>
           
          </select>
        <input type="hidden" name="reporte_name" value="Reporte de Usuario">
        <input type="submit" name="create_pdf" class="btn btn-danger" value="Generar PDF">
        </div>
      </form>
    </div>
  </div>
</div>

    <table class="table table-bordred table-striped">
      <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Clave</th>
        <th>Privilegios</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </thead>
      <tbody>
        
        <?php foreach ($datos['user'] as $value) : ?>
          <tr>
            <td>
              <?php echo $value->nombre ?>
            </td>
            <td>
              <?php echo $value->apellido ?>
            </td>
            <td>
              <?php echo $value->usuario ?>
            </td>
            <td>
              <?php echo $value->clave ?>
            </td>
            <td>
              <?php echo $value->super_admin ? 'Admin' : 'Normal'; ?>
            </td>
            <td>
              <button edit="<?php echo $value->id ?>" class="btn btn-primary edit-user">Editar</button>
            </td>
            <td>
              <button delete="<?php echo $value->id ?>" class="btn btn-danger delete-user">Eliminar</button>
            </td>
          </tr>
        <?php endforeach;?>

      </tbody>
    </table>
    <div class="col-md-12">
    </div>
<?php else: ?>
<div id="no-product" class="text-center">
  <h1>No hay productos para mostrar</h1>
  <h3>Intenta creando uno</h3>
  <button class = "btn btn-success" id="crear-user">Crear</button>
</div>
<?php endif; ?>
</div>

</center>
