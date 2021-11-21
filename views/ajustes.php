<?php
$menu = "ajustes";

include './header/header-dashboard.php';

?>


<section class="section_settings" id="settings">
  <form id="form__settings" class="form__settings">
    <input type="hidden" name="username" value="<?php echo $_SESSION['user'] ?>">
    <div class="form__settings__group">
      <label for="old_password" class="form__settings-password">
        <p>Contraseña Anterior </p>
        <input id="oldPassword" type="text" name="oldPassword" class="form__settings-input">
      </label>
    </div>

    <div class="form__settings__group">
      <label for="new_password" class="form__settings-password">
        <p> Nueva Contraseña</p>
        <input id="newPassword" type="text" name="newPassword" class="form__settings-input">
      </label>
    </div>
    <button type="submit" id="form__settings-btn" class="form__settings-button">Cambiar Contraseña</button>

    <div class="formulario__mensaje" id="formulario__mensaje">
      <p> Por favor llena todos los campos correctamente. <br>
        Recuerda que debe ser de 4 a 12 dígitos.
      </p>
    </div>

    <div class="formulario__mensaje-exito" id="formulario__mensaje-exito">
      <p>
        Tu contraseña fue cambiada
      </p>
    </div>
    <div class="respuesta"></div>
  </form>


</section>


<script src="./assets/js/ajustes-view.js"></script>


<?php

include './footer/footer-dashboard.php';

?>