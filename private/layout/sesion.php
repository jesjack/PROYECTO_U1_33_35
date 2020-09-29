<?php require 'template/head.php' ?>
<?php if(!isset($action)) $action = rand(0, 1) == 0? 'iniciar' : 'registrar'; ?>
<div class="container my-5">
  <form action="<?php
  
  if($action == 'iniciar') echo '/sesion/iniciar';
  else if($action == 'registrar') echo '/sesion/registrar';

  ?>" method="POST" class="bg-light text-dark rounded f-sesion mx-auto shadow-lg">
    <div class="bg-light p-3 rounded-top text-primary">
      <h2><?php
        if($action == 'iniciar') echo 'Iniciar sesión';
        else if($action == 'registrar') echo 'Registrarse';
      ?></h2>
    </div>
    <div class="p-3 px-4">
      <?php
      if($action == 'iniciar') {
        ?>
          <div class="form-group">
            <input autocomplete="off" required type="text" placeholder="Usuario o Correo" class="form-control j-input rounded-0 bg-light" id="user-input">
          </div>
          <div class="form-group">
            <input autocomplete="off" required type="password" placeholder="Contraseña" class="form-control j-input rounded-0 bg-light" id="pass">
          </div>
          <button type="submit" class="btn btn-sm btn-primary ml-auto" style="display: block;">Iniciar sesión</button>
          <small class="text-center text-muted d-block pt-2">¿No tienes cuenta? <a href="/sesion/registrar">Regístrate</a></small>
        <?
      } else if($action == 'registrar') {
        ?>
          <div class="form-group">
            <input name="name" autocomplete="off" required type="text" placeholder="Nombre completo" class="form-control j-input normal-text rounded-0 bg-light" id="name">
          </div>
          <div class="form-group">
            <div class="input-group">
              <input name="user" autocomplete="off" required type="text" placeholder="Usuario" class="form-control j-input rounded-0 bg-light mr-5" id="user-input">
              <input name="mail" autocomplete="off" required type="email" placeholder="Correo" class="form-control j-input rounded-0 bg-light" id="mail">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input name="pass" autocomplete="off" required type="password" placeholder="Contraseña" class="form-control j-input rounded-0 bg-light mr-5" id="pass">
              <input autocomplete="off" required type="password" placeholder="Repita contraseña" class="form-control j-input rounded-0 bg-light" id="passR">
            </div>
          </div>
          <div class="form-group">
            <input name="tell" autocomplete="off" data-mask="(000) 000 00 00" required type="tel" placeholder="Teléfono" class="form-control j-input rounded-0 bg-light" id="tell">
          </div>
          <button type="submit" class="btn btn-sm btn-primary ml-auto" style="display: block;">Registrarse</button>
          <small class="text-center text-muted d-block pt-2">¿Ya tienes cuenta? <a href="/sesion/iniciar">Inicia sesión</a></small>
        <?
      }
      ?>
    </div>
  </form>
</div>

<script>
  // $('form').submit(evt => evt.preventDefault());
</script>
<!-- Other JS -->
<script src="/src/js/jquery.mask.js"></script>
<script src="/src/js/validacion.js"></script>
<?php require 'template/foot.php' ?>