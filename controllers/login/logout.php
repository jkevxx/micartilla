<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['nombre']);
session_destroy();
header('Location: ../../index.php');