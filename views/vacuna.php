<?php

$menu = "esquema";

include './header/header-dashboard.php';
require_once '../models/VaccineModel-consult.php';
require_once '../models/UserModel-consult.php';

$username = $_SESSION['user'];
$id = $_GET["id"];

$consultVaccine = new VaccineModel();
$consult = $consultVaccine->readOneVaccine($id);

$consultar = new UserModel();
$usuarios = $consultar->readUser($username);

?>



<section class="vaccine">
  <?php foreach ($consult as $vaccine) {?>
  <h2 class="vaccine__card-title"><?php echo $vaccine['Nvacuna'] ?></h2>
  <?php }?>

  <div class="vaccine__card">
    <form action="#" class="vaccine__card-form">
      <div class="vaccine__card-content">
        <div class="list__button-click">
          <p>1° Dosis</p>
          <label for="fecha">Fecha de Dosis:
            <input type="text" name="fecha" class="vaccine__date" placeholder="dd/mm/yyyy">
          </label>
          <img src="./assets/img/chevron-forward.svg" alt="" class="list__arrow">
        </div>
        <div class="vaccine__card-dropdown">
          <!-- CHECK IF THE BUTTON GONNA BE OF TYPE SUBMIT -->
          <button type="submit" class="vaccine__card-button">
            <ion-icon name="bookmark"></ion-icon>Guardar
          </button>
          <button type="submit" class="vaccine__card-button">
            <ion-icon name="trash"></ion-icon>Eliminar
          </button>
        </div>
      </div>

    </form>
  </div>

  <div class="vaccine__button" id="btn-abrir-popup">
    <button class="vaccine__card-button">
      <ion-icon name="duplicate"></ion-icon> Agregar Dosis
    </button>
  </div>

  <div class="overlay" id="overlay">
    <div class="popup" id="popup">
      <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup">
        <ion-icon name="close"></ion-icon>
      </a>
      <!-- <h3>SUSCRIBETE</h3> -->
      <h4>Selecciona la fecha de tu dosis</h4>
      <form id="form-vaccine">
        <div class="contenedor-inputs">
          <input type="date" name="fecha" placeholder="" required>
          <input type="hidden" name="id_vacuna" value="<?php echo $id ?>">
          <?php foreach ($usuarios as $user) {?>
          <input type="hidden" name="id_usuario" value="<?php echo $user['idUsuario'] ?>">
          <?php }?>
        </div>
        <button type="submit" class="btn-submit">
          <ion-icon name="add-circle"></ion-icon>Añadir
        </button>
      </form>
    </div>
  </div>

</section>

<script src="./assets/js/vacuna-view.js"></script>


<?php

include './footer/footer-dashboard.php';

?>