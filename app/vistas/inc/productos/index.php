<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <?php foreach ($datos["productos"] as $value): ?>
      <div class="row">
        <div class = "col-sm-12 col-md-4" style="margin-top:10px;">
          <img src="<?php echo $value->imagen ?>" alt="<?php echo $value->nombre ?>" class="img-responsive" style = "width: 300px; height: 300px">
        </div>
        <div class="col-sm-12 col-md-8">
          <h1><?php echo $value->nombre ?></h1>
          <h3 style="color: green">$<?php echo $value->precio ?></h3>
          <hr>
          <p><?php echo $value->descripcion ?></p>
        </div>
      </div>
        
      <?php endforeach; ?>
    </div>
  </div>
</div>