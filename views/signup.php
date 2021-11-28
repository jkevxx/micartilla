<?php
session_start();
// Valida si existe la sesión de usuario
if (!empty($_SESSION['user'])) {
    header("Location: ./users.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--===== CSS =====-->
  <link rel="stylesheet" href="assets/css/signup-styles.css">

  <title>Crear Cuenta</title>
</head>

<body>
  <div class="l-form">
    <div class="form__presentation">
      <form class="form" id="form">
        <h1 class="form__title">Crear Cuenta</h1>

        <div class="form__div " id="grupo__user">
          <input type="text" class="form__input" name="user" id="user" placeholder=" ">
          <label for="" class="form__label">Username</label>
          <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener números,
            letras y guión bajo.</p>
        </div>

        <div class="form__div " id="grupo__email">
          <input type="email" class="form__input" name="email" id="email" placeholder=" ">
          <label for="" class="form__label">Email</label>
          <p class="formulario__input-error">Verifique que el correo sea correcto.</p>
        </div>

        <div class="form__div " id="grupo__password">
          <input type="password" class="form__input" name="password" id="password" placeholder=" ">
          <label for="" class="form__label">Contraseña</label>
          <span class="eye" onclick="mypassword()">
            <ion-icon id="hide1" name="eye-outline"></ion-icon>
            <ion-icon id="hide2" name="eye-off-outline"></ion-icon>
          </span>
          <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
        </div>

        <div class="form__checkbox">
          <label for="checkbox" id="check" class="checkbox">
            <input type="checkbox" id="checkbox">
            <span class="check">
            </span>
            <span class="check-text">
              Acepto <a href="#">Términos y condiciones</a>
            </span>
          </label>
        </div>

        <!-- <input type="submit" class="form__button" value="Crear Cuenta"> -->
        <button class="form__button" type="submit">Crear Cuenta</button>
        <div class="formulario__mensaje" id="formulario__mensaje">
          <p> Por favor llena todos los campos correctamente.
          </p>
        </div>

        <div class="form__signup">
          <a href="./login.php">Iniciar Sesión</a>
        </div>
        <div class="respuesta"></div>

      </form>
      <h1 class="form__title_1">Mi-Cartilla</h1>

    </div>
  </div>

  <!-- *--- Icons Sources -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="./assets/js/showpass.js"></script>
  <script src="./assets/js/validateform.js"></script>
</body>

</html>