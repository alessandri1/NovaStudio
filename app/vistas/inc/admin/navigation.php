<div class="col-sm-3">
    <a href="./productos">Productos</a>
    <a href="./compras">Compras</a>
    <?php if($_SESSION['logged_user']->super_admin=="1") : ?>
        <a href="./usuarios">Usuarios</a>
    <?php endif; ?>
</div>