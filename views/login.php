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
  <link rel="stylesheet" href="assets/css/login-styles.css">

  <title>Iniciar Sesión</title>
</head>

<body>
  <div class="l-form">
    <div class="form__presentation">
      <h1 class="form__title_1">Mi-Cartilla</h1>
      <form class="form" id="form">
        <h1 class="form__title">Iniciar Sesión</h1>

        <div class="form__div" id="grupo__user">
          <input id="user" type="text" class="form__input" name="user" placeholder=" ">
          <label for="" class="form__label">Email o Username</label>
          <p class="formulario__input-error">Introduce tu correo o username</p>
        </div>

        <div class="form__div" id="grupo__password">
          <input id="password" type="password" class="form__input" name="password" placeholder=" ">
          <label for="" class="form__label">Contraseña</label>
          <span class="eye" onclick="mypassword()">
            <ion-icon id="hide1" name="eye-outline"></ion-icon>
            <ion-icon id="hide2" name="eye-off-outline"></ion-icon>
          </span>
          <p class="formulario__input-error">Introduce una contraseña</p>
        </div>

        <div class="form__forget">
          <a href="#">Olvide mi Contraseña</a>
        </div>

        <!-- <input type="submit" class="form__button" value="Iniciar Sesión"> -->
        <button class="form__button" type="submit">Iniciar Sesión</button>
        <div class="formulario__mensaje" id="formulario__mensaje">
          <p> Por favor llena todos los campos correctamente.
          </p>
        </div>

        <div class="form__signup">
          <a href="./signup.php">Crear Cuenta</a>
        </div>
        <div class="respuesta"></div>
      </form>
    </div>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script defer src="./assets/js/showpass.js"></script>
  <script src="./assets/js/validateformlogin.js"></script>
</body>

</html>