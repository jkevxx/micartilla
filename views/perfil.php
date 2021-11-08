<?php
$menu = "perfil";

include './header/header-dashboard.php';
require_once '../models/UserModel-consult.php';

$username = $_SESSION['user'];

$consultar = new UserModel();
$usuarios = $consultar->readUser($username);

?>

<section class="profile">
  <h2>Mis datos</h2>
  <form id="form-perfil" class="profile__form">
    <?php foreach ($usuarios as $user) {
    $date = $user['fechaNacimiento'];
    $formatDate = explode('-', $date);
    $newFormatDate = $formatDate[2] . "/" . $formatDate[1] . "/" . $formatDate[0];
    $sexo = $user['sexo'];
    ?>
    <div class="form-group">
      <label for="name" class="form-label">Nombre</label>
      <input type="text" name="nombre" id="name" value="<?php echo $user['nombre'] ?>">
    </div>
    <div class="form-group">
      <label for="apellido" class="form-label">Apellidos</label>
      <input type="text" name="apellido" id="apellido" value="<?php echo $user['apellidos'] ?>">
    </div>
    <div class="form-group form-group-select">
      <label for="sexo" class="form-label">Sexo</label>
      <select name="sexo" id="sexo" class="form__select">
        <?php if ($sexo == "Mujer") {?>
        <option value="Mujer">Mujer</option>
        <option value="Hombre">Hombre</option>
        <?php } else {?>
        <option value="Hombre">Hombre</option>
        <option value="Mujer">Mujer</option>
        <?php }?>
      </select>
    </div>
    <div class="form-group">
      <label for="fecha" class="form-label">Fecha de Nacimiento</label>
      <input type="text" name="fecha" class="fecha" id="fecha" placeholder="dd/mm/yyyy"
        value="<?php echo $newFormatDate ?>">
    </div>
    <?php }?>
    <div class="formulario__mensaje" id="formulario__mensaje">
      <p> Por favor llena todos los campos correctamente.
      </p>
    </div>
    <div class="formulario__mensaje-fecha" id="formulario__mensaje-fecha">
      <p> Verifica que la fecha se la correcta
      </p>
    </div>
    <div class="form-group form-group-btn-enviar">
      <button class="form__button " type="submit">Actualizar Información</button>
    </div>

  </form>

</section>

<?php

include './footer/footer-dashboard.php';

?>