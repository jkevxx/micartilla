<?php

class Conexion
{

  private static $database = "example";
  private static $hostname = "localhost";
  private static $username = "example";
  private static $password = "";



  public function getConexion()
  {
    // $pdo = new PDO('mysql:host=localhost;dbname=mi_cartilla', 'root', '');
    $pdo = new PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$database, self::$username, self::$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión establecida";
    return $pdo;
  }
}
