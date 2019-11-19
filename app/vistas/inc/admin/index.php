<center>

<div style="border:1px black solid;   box-shadow: 5px 10px; width: 85%;">

    <div style="padding-left:50px; padding-right:50px;">
    <center><br/>      
    <h1 class="text-center">Bienvenido <span id="username"><?php echo $datos['user'][0]->usuario ?></span></h1><br>
      <div class="row text-center">
     
      <a href="<?php echo $_SESSION['logged_user']->super_admin=="1" ? './usuarios' : '#' ?>">
        <div class="col-sm-4 btn btn-default">
          <h3>Usuarios </h3><br><br>
          <h4 id="users"><?php echo $datos['user_count'] ?></h4>
        </div>
        </a>
        
        <a href="./productos">
        <div class="col-sm-4 btn btn-default">
          <h3>Productos </h3><br><br>
          <h4 id="products"><?php echo $datos['product_count'] ?></h4>
        </div>
        </a>
       
        <a href="./compras">
        <div class="col-sm-4 btn btn-default">
          <h3>Compras </h3><br><br>
          <h4 id="compras"><?php echo $datos['compra_count'] ?></h4>
        </div>
     
      </a> 
    </div>
      </center>
    </div>
    <br><br><br><br>


</div>

</center>
