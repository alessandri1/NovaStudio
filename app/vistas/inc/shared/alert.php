<?php if(isset($_SESSION['error']) || isset($_SESSION['success'])): ?>
<?php 
  $class = isset($_SESSION['error']) ? 'alert-danger': 'alert-success';
  $message = isset($_SESSION['error']) ? $_SESSION['error'] : $_SESSION['success'];
  $prefix = isset($_SESSION['error']) ? 'Error!' : 'Success!';
  if(isset($_SESSION['error'])) unset($_SESSION['error']);
  if(isset($_SESSION['success'])) unset($_SESSION['success']);
?>
  <div class="alert alert-dismissible <?php echo $class; ?> error" role="alert">
    <strong><?php echo $prefix; ?></strong> <?php echo $message;?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif;
?>