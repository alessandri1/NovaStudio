<center>
<form id ="product-form" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa nombre del producto">
  </div>
  <div class="form-group">
    <label for="precio">Precio</label>
    <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
  </div>
  <div class="form-group text-center">
    <div class="img-preview">
      <img src="<?php echo RUTA_URL ?>/images/default.png" id="imgPreview" alt="">
    </div>
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imgProductInput">
  </div>
  <input type="hidden" name="id" id="id">
</form>
</center>