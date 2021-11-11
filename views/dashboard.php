<?php
$menu = "dashboard";

include './header/header-dashboard.php';
require_once '../models/VaccineModel-consult.php';

$consultVaccine = new VaccineModel();

$vaccines = $consultVaccine->readVaccine();

?>

<!-- MAIN -->
<!-- <main class="main">
  <section class="main__order">
    <a href="#" class="main__order-options" onclick="option()">
      <ion-icon name="options"></ion-icon>Ordenar Por
    </a>
    <div class="option-content">
      <ul class="links">
        <li>
          <a href="#">Más importante</a>
        </li>
        <li>
          <a href="#">Fecha</a>
        </li>
      </ul>

    </div>
  </section>

  <section class="main__section"> -->
<?php foreach ($vaccines as $vaccine) {?>
<div class="card">
  <div class="card__body ">
    <h3 class="card-title"><?php echo $vaccine['Nvacuna'] ?></h3>
    <p class="card-content">
      <?php echo $vaccine['sintomas'] ?>
    </p>
  </div>
  <a href="./vacuna.php?id=<?php echo $vaccine['idVacuna'] ?>" class="card-button">
    <ion-icon name="add-circle"></ion-icon>Añadir
  </a>
</div>
<?php }?>


<!-- </section> -->


<?php

include './footer/footer-dashboard.php';

?>