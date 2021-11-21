<?php
$menu = "esquema";

include './header/header-dashboard.php';
// require_once '../models/VaccineModel-consult.php';
// $consultVaccine = new VaccineModel();
// $vaccines = $consultVaccine->readVaccine();

?>
<form action="#">
  <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
</form>


<h2 class="section__card-h2">Mi Esquema</h2>
<section class="section__card" id="cards">

</section>


<script src="./assets/js/esquema-view.js"></script>


<?php

include './footer/footer-dashboard.php';

?>