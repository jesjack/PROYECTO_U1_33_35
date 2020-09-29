<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foro "Escarlata"</title>

  <link rel="shortcut icon" href="/src/img/people-ico.webp" type="image/x-icon">
  <link rel="stylesheet" href="/src/css/main.css">
  <link rel="stylesheet" href="/src/css/arrow.css">

  <script src="https://kit.fontawesome.com/54bc92731d.js" crossorigin="anonymous"></script>

  <!-- BootStrap JS -->
  <script src="/src/js/jquery-3.5.1.js"></script>
  <script src="/src/js/popper.js"></script>
  <script src="/src/css/bootstrap-4.5.2-dist/js/bootstrap.js"></script>

  <!-- BootStrap CSS -->
  <link rel="stylesheet" href="/src/css/bootstrap-4.5.2-dist/css/bootstrap.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Escarlata</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="btn-group navbar-nav mr-auto ml-auto">
        <a href="/foro" class="btn bg-escarlata text-light rounded-pill" style="border-radius: 50rem 0 0 50rem!important;">Foro</a>
        <a href="/foro/matematicas" class="btn bg-escarlata text-light">Matemáticas</a>
        <a href="/foro/español" class="btn bg-escarlata text-light">Lenguas/Escritura</a>
        <a href="/foro/ciencias" class="btn bg-escarlata text-light rounded-pill" style="border-radius: 0 50rem 50rem 0!important;">Ciencias</a>
      </div>
      <div>
        <?php
        if(isset($user)) {?>
          <a class="btn btn-primary" href="/user/@/<?= $user ?>">
            <?= $user ?>
          </a>
          <a class="btn btn-outline-primary" href="/sesion/cerrar">
            Cerrar sesión
          </a>
        <?} else {?>
          <a class="btn btn-primary" href="/sesion/iniciar">
            Iniciar sesión
          </a>
          <a class="btn btn-outline-primary" href="/sesion/registrar">
            Registrarse
          </a>
        <?}
        ?>
      </div>
    </div>
  </nav>