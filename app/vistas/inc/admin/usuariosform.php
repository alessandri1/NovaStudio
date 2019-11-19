<form id ="user-form" method="POST" enctype="multipart/form-data" action = "/webmaster/admin/createUser">
  <div class="form-group">
    <label for="name-user">Nombre</label>
    <input type="text" class="form-control" id="name-user" name="name" placeholder="Ingresa nombre del usuario"><br>
    <small id="name-user-message" class="text-danger"></small>
  </div>
  <div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa apellido del usuario"><br>
    <small id="apellido-message" class="text-danger"></small>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Ingresa username del usuario"><br>
    <small id="username-message" class="text-danger"></small>
  </div>
  <div class="form-group">
    <label for="password">Clave</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa clave del usuario"><br>
    <small id="password-message" class="text-danger"></small>
  </div>
  <div class="form-group">
    <label for="password-repeat">Repite Clave</label>
    <input type="password" class="form-control" id="password-repeat" name="password-repeat" placeholder="Repite clave del usuario"><br>
    <small id="password-reapeat-message" class="text-danger"></small>
  </div>
  <div class="form-group">
    <label for="admin">Seleccione tipo del usuario</label>
    <select name="admin" id="admin">
      <option value="admin">Super Admin</option>
      <option value="normal">Normal</option>
    </select>
  </div>
  
  <input type="hidden" name="id" id="id-usuario">
</form>