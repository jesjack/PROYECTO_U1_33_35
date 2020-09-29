<?php include 'template/head.php' ?>
<div class="d-flex">
  <div class="flex-fill p-3 j-non-bg" style="min-height: calc(100vh - 56px);">
    <h1 class="text-primary text-right" style="text-transform:capitalize;">
      <?php if(isset($foro)) echo $foro; else echo 'foro'; ?>
    </h1><br>
    <div class="bg-escarlata text-light p-3 rounded">
      <h6 class="text-right">Por: Edgarin</h6>
      <h3>Lorem ipsum dolor sit amet consectetur.</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum corporis
        doloribus impedit nisi dolor nobis voluptates, deleniti dicta alias perferendis
        placeat aliquid animi reiciendis adipisci! Temporibus et rerum quibusdam saepe!
      </p>
      <div class="bg-light py-3 rounded text-dark">
        <div class="input-group px-3 pb-3">
          <input type="text" class="form-control" placeholder="Comentar . . .">
          <div class="input-group-append">
            <button class="btn btn-primary"><i class="fas fa-comment"></i></button>
          </div>
        </div>
        <h4 class="ml-3">Comentarios:</h4>
        <div class="bg-light p-3">
          <h5 class="text-right">Edgar</h5>
          <p class="text-justify w-50 d-block ml-auto">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur cumque voluptates vitae praesentium nobis amet soluta, aut dignissimos enim porro ipsam magni adipisci aspernatur possimus quidem accusamus aliquam animi cupiditate!
          </p>
          <small class="d-block text-muted text-right">27/09/2020 04:20pm</small>
        </div>
      </div>
    </div>
  </div>
  <!-- <?= isset($foro) ?> -->
  <div class="j-bg-img w-50" <?php
    if(isset($foro)) {
      switch($foro) {
        case 'matemáticas':
          echo 'style="background-image: url(\'/src/img/mate.jpg\');"';
        break;
        case 'ciencias':
          echo 'style="background-image: url(\'/src/img/ciencias.jpg\'); background-size: 700px;"';
        break;
        case 'español':
          echo 'style="background-image: url(\'/src/img/español.jpg\');"';
        break;
      }
    }
  ?>>
    <style>
      .j-bg-img::after {
        background-color: <?php if(isset($foro) && ($foro == 'matemáticas')) echo 'rgba(117, 150, 221, 0)' ?>;
      } .pp-prin {
        position: absolute;
        right: 0;
        z-index: 2;
      } .pp-add {
        position: absolute;
        bottom: 30px;
        right: 40%;
        z-index: 2;
      }
    </style>
    <a href="/" class="btn btn-light rounded pp-prin rounded-0">
      <i class="fas fa-arrow-left"></i> Página principal
    </a>
    <h1>
      <a href="/foro/add" class="btn btn-lg btn-primary pp-add rounded-circle">
        <i class="fas fa-plus"></i>
      </a>
    </h1>
  </div>
</div>
<?php include 'template/foot.php' ?>