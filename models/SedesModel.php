<?php

require_once "../../config/Conexion.php";

class SedesModel extends Conexion
{
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

    public function consultSede($search)
    {
        $sql = "SELECT s.idSede, s.Nsede, s.telefono, s.direccion, s.cp, c.Ncapital FROM sedes AS s INNER JOIN capital AS c ON c.idCapital = s.id_capital WHERE c.Ncapital LIKE '$search%' OR s.cp LIKE '$search%'";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $json[] = array(
                'idSede' => $row['idSede'],
                'Nsede' => $row['Nsede'],
                'telefono' => $row['telefono'],
                'direccion' => $row['direccion'],
                'cp' => $row['cp'],
                'Ncapital' => $row['Ncapital'],
            );
        }
        $jsonstring = json_encode($json);

        return $jsonstring;
    }

    public function readSede()
    {
        $sql = "SELECT s.idSede, s.Nsede, s.telefono, s.direccion, s.cp, c.Ncapital FROM sedes AS s INNER JOIN capital AS c ON c.idCapital = s.id_capital";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $json[] = array(
                'idSede' => $row['idSede'],
                'Nsede' => $row['Nsede'],
                'telefono' => $row['telefono'],
                'direccion' => $row['direccion'],
                'cp' => $row['cp'],
                'Ncapital' => $row['Ncapital'],
            );
        }
        $jsonstring = json_encode($json);

        return $jsonstring;
    }

}