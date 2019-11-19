<div id="modalform" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="productForm" class="hide">
        <?php include RUTA_APP . "/vistas/inc/admin/productosform.php" ?>
        </div>
        <div id="userForm" class="hide">
        <?php include RUTA_APP . "/vistas/inc/admin/usuariosform.php" ?>
        </div>
        <div id="comprasForm" class="hide">
        <?php include RUTA_APP . "/vistas/inc/admin/comprasform.php" ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="submit" class="btn btn-primary">Aceptar</button>
        <button type="button" id="delete" class="btn btn-danger">Eliminar</button>
        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>