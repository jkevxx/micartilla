<?php
class Conexion
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "mycartilla";
    private $conexion;

    public function __construct()
    {
        // $this->host = "localhost";
        // $this->user = "root";
        // $this->password = "";
        // $this->db = "micartilla";
        // $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8";
        // try {
        //     $this->conexion = new PDO($connection, $this->user, $this->password);
        //     $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     // echo "conexión exitosa";
        // } catch (Exception $e) {
        //     $this->conexion = 'Error de conexión';
        //     echo "ERROR: " . $e->getMessage();
        // }
    }
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getConexion()
    {
        // $this->conexion = null;
        $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8";
        try {
            $this->conexion = new PDO($connection, $this->user, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "conexión exitosa";
        } catch (Exception $e) {
            $this->conexion = 'Error de conexión';
            echo "ERROR: " . $e->getMessage();
        }
        return $this->conexion;
    }
}

// $conect = new Conexion();