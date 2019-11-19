<?php 
include  RUTA_APP . "/vistas/inc/admin/header.php";
 ?>
 <br><br><br><br>
  <center>
 <div style="width:35%;">

 <h3>Bienvenido Administrador</h3>
 <br><br>
 <form method="POST" id="loggin_form" >
  <div class="form-group">
    <label for="exampleInputText1">Nombre Usuario</label><br><br>
    <input name="user" id="user" type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" required="required" >
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label><br><br>
    <input  name="password" id="password" type="password" class="form-control" id="exampleInputPassword1" required="required">
  </div>
  
  <button type="submit" class="btn btn-primary">Ingresar</button>
  <small id="response"></small>
</form>

</div>
</center>
<br><br><br><br>

<?php 
include  RUTA_APP . "/vistas/inc/modules/slider.php";
 ?>
 <?php 
include  RUTA_APP . "/vistas/inc/modules/sub.php";
 ?>
 <?php 
include  RUTA_APP . "/vistas/inc/modules/footer.php";
 ?>

<script src="<?php echo RUTA_URL; ?>/public/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo RUTA_URL; ?>/public/js/admin/login.js"></script>