<?php

require_once "../../config/Conexion.php";

class UserModel extends Conexion
{
    private $nombre;
    private $apellidos;
    private $sexo;
    private $fechaNacimiento;
    private $id;
    private $conexion;
    public function __construct()
    {
        parent::__construct();
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getConexion();
    }

    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getConexion()
    {
        return $this->conexion;
    }

    public function createUser($nombre, $apellidos, $sexo, $fechaNacimiento, $id)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sexo = $sexo;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->id = $id;
        $sql = "INSERT INTO usuarios (nombre, apellidos, sexo, fechaNacimiento, id_login) VALUES (?,?,?,?,?)";
        $create = $this->conexion->prepare($sql);
        $data = array($this->nombre, $this->apellidos, $this->sexo, $this->fechaNacimiento, $this->id);
        $stmt = $create->execute($data);
        $idLogin = $this->conexion->lastInsertId();

        if ($stmt) {
            // return $idLogin;
            return true;
        } else {
            print_r($stmt->errorInfo());
            return false;
        }

    }

    public function getIdLogin()
    {
        $sql = "SELECT MAX(idLogin) as idLogin FROM login LIMIT 1";
        // $query = $this->conexion->prepare($sql);
        // $query->execute();
        $result = $this->conexion->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        // $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // $result = arrayId[0]->idLogin;
        $id = $row['idLogin'];
        return $id;
    }

    public function readUser($username)
    {
        $sql = "SELECT nombre, apellidos, sexo, fechaNacimiento FROM usuarios INNER JOIN login ON idLogin = id_login WHERE username = $username";
        $stmt = $this->conexion->prepare($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateUser($nombre, $apellidos, $sexo, $fechaNacimiento)
    {

    }

}