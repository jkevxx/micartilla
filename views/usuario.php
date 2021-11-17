<?php
session_start();
// Valida si existe la sesión de usuario
if (empty($_SESSION['user'])) {
    header("Location: ../index.php");
}

// echo $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/usuario-styles.css">
  <title>Registro</title>

</head>

<body>
  <div class="container">
    <header>Registro</header>
    <div class="progress-bar">
      <div class="step">
        <p>Nombre</p>
        <div class="bullet">
          <span>1</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Género</p>
        <div class="bullet">
          <span>2</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Nacimiento</p>
        <div class="bullet">
          <span>3</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Enviar</p>
        <div class="bullet">
          <span>4</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
    </div>
    <div class="form-outer">
      <form id="form">
        <div class="page slide-page">
          <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['user']; ?> ">
          <div class="title">Información Básica:</div>
          <div class="field">
            <div class="label">Nombre</div>
            <input type="text" name="nombre">
          </div>
          <div class="field">
            <div class="label">Apellidos</div>
            <input type="text" name="apellido">
          </div>
          <div class="formulario__mensaje" id="formulario__mensaje">
            <p> Por favor llena todos los campos correctamente.
            </p>
          </div>
          <div class="field">
            <button class="firstNext next">Siguiente</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Selecciona el Género</div>
          <div class="field">
            <div class="label"></div>
            <select name="sexo">
              <option value="Mujer">Mujer</option>
              <option value="Hombre">Hombre</option>
            </select>
          </div>
          <div class="field">
          </div>
          <div class="field btns">
            <button class="prev-1 prev">Volver</button>
            <button class="next-1 next">Siguiente</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Fecha de Nacimiento</div>
          <div class="field">
            <div class="label">Ejemplo: 20/08/2000</div>
            <input type="text" name="fecha" placeholder="dd/mm/yyyy">
          </div>
          <div class="field">
            <div class="formulario__mensaje-fecha" id="formulario__mensaje-fecha">
              <p> Verifica que la fecha se la correcta
              </p>
            </div>

          </div>
          <div class="field btns">
            <button class="prev-2 prev">Volver</button>
            <button class="next-2 next">Siguiente</button>
          </div>
        </div>

        <div class="page">
          <div class="title"></div>
          <div class="field">
            <div class="label">Si estás seguro que tus datos son correctos por favor da clic en el botón enviar</div>

          </div>
          <div class="field">
          </div>
          <div class="field btns">
            <button class="prev-3 prev">Volver</button>
            <button class="submit">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>


  <script src="https://kit.fontawesome.com/14a07e14a8.js" crossorigin="anonymous"></script>

  <script src="./assets/js/usuario-view.js"></script>

</body>

</html>