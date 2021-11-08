<?php
session_start();
// Valida si existe la sesión de usuario
if (empty($_SESSION['user'])) {
    header("Location: ../index.php");
}

// if (empty($_SESSION['nombre'])) {
//     header("Location: ../index.php");
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/dashboard-styles.css">
  <title>Mi Cartilla</title>
</head>

<body>
  <!-- Navbar -->
  <div class="container">

    <nav class="navbar">
      <ul class="navbar__menu">

        <li class="list active">
          <a href="#">
            <span class="icon">
              <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="title">Home</span>
          </a>
        </li>

        <li class="list">
          <a href="#">
            <span class="icon">
              <ion-icon name="document-text-outline"></ion-icon>
            </span>
            <span class="title">Esquema</span>
          </a>
        </li>

        <li class="list">
          <a href="#">
            <span class="icon">
              <ion-icon name="person-outline"></ion-icon>
            </span>
            <span class="title">Profile</span>
          </a>
        </li>

        <li class="list">
          <a href="#">
            <span class="icon">
              <ion-icon name="location-outline"></ion-icon>
            </span>
            <span class="title">Sedes</span>
          </a>
        </li>

        <li class="list">
          <a href="#">
            <span class="icon">
              <ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Ajustes</span>
          </a>
        </li>
      </ul>

      <!-- </div> -->
    </nav>

    <!-- sidebar -->
    <aside class="sidebar">

      <div class="toggle">
        <ion-icon name="menu-outline" class="open"></ion-icon>
        <ion-icon name="close-outline" class="close"></ion-icon>
      </div>

      <div class="sidebar__search">
        <a href="#" for="search">
        </a>
        <label for="search">
          <span class="icon">
            <ion-icon name="search-outline"></ion-icon>
          </span>
        </label>
        <form action="" class="sidebar__input">
          <input type="text" name="" id="search" class="search" placeholder="Buscar" required>
          <!-- <input type="submit" class="button" value=""> -->
        </form>
      </div>

      <div class="sidebar__notification">
        <a href="#" class="icon" onclick="notification()">
          <!-- <span class="iconify" data-icon="clarity:notification-solid"></span> -->
          <span class="iconify" data-icon="clarity:notification-solid-badged"></span>
        </a>
        <div class="notification-content">
          <ul class="links">
            <li>
              <a href="#">Notificación 1</a>
            </li>
            <li>
              <a href="#">Notificación 2</a>
            </li>
          </ul>
        </div>

      </div>

      <div class="dropdown-item">
        <div class="imgBox">
          <img src="./assets/img/profile.jpg" alt="" onclick="myFunction()">
        </div>
        <div class="dropdown-content">
          <ul class="links">
            <li><a href="#">
                <ion-icon name="person-circle-outline" aria-hidden="true"></ion-icon> Mi Perfil
              </a></li>
            <li><a href="#">
                <ion-icon name="sync-circle" aria-hidden="true"></ion-icon> Cambiar cuenta
              </a></li>
            <div class="divider"></div>
            <li><a href="#">
                <ion-icon name="settings" aria-hidden="true"></ion-icon> Ajustes
              </a></li>
            <li><a href="#">
                <ion-icon name="information-circle" aria-hidden="true"></ion-icon> Ayuda
              </a></li>
            <div class="divider"></div>
            <li><a href="../controllers/login/logout.php">
                <ion-icon name="log-out" aria-hidden="true"></ion-icon> Logout
              </a></li>
          </ul>
        </div>
      </div>

    </aside>