<?php

class Conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "admin";
    private $db = "proyectos";
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor; dbname=$this->db", $this->usuario, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            return "Falla en la conexión" . $error;
        }
    }

    public function ejecutar($sql) { //Metodo para Insertar/Eliminar/Actualizar
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql) {
        $query = $this->conexion->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

}

?>