<?php
session_start();
// Valida si existe la sesión de usuario
if (empty($_SESSION['user'])) {
    header("Location: ../index.php");
}

require_once '../models/UserModel-consult.php';

$username = $_SESSION['user'];
$consultar = new UserModel();

$usuarios = $consultar->readAllUsers($username);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/users-styles.css">
  <title>Usuarios</title>
</head>

<body>

  <main class="content">
    <div class="card">
      <h2>Elige el usuario </h2>
      <?php foreach ($usuarios as $user) {?>
      <div class="card-body">
        <div class="card-users">
          <a href="../controllers/users/UserController-consult.php?idUsuario=<?php echo $user['idUsuario'] ?>">
            <ion-icon name="open-outline"></ion-icon>
            <?php echo $user['nombre'] . " " . $user['apellidos'] ?>
          </a>
        </div>
        <a href="#" onclick="preguntar(<?php echo $user['idUsuario'] ?>)" class="btn-delete">
          <ion-icon name="trash"></ion-icon>Eliminar
        </a>
      </div>
      <?php }?>

      <a href="./usuario.php" class="btn-add-user">
        <ion-icon name="duplicate"></ion-icon>Agregar otro Usuario
      </a>
    </div>
  </main>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="./assets/js/users-view.js"></script>
</body>

</html>