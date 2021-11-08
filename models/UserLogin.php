<?php

require_once "../../config/Conexion.php";

class UserLogin extends Conexion
{
    private $username;
    private $email;
    private $password;
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

    public function createLogin($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $sql = "INSERT INTO login (username,email,password) VALUES (?,?,?)";
        $create = $this->conexion->prepare($sql);
        $data = array($this->username, $this->email, $this->password);
        $stmt = $create->execute($data);
        $idLogin = $this->conexion->lastInsertId();

        // $stmt->execute();
        if ($stmt) {
            // return $idLogin;
            return true;
        } else {
            print_r($stmt->errorInfo());
            return false;
        }
    }

}