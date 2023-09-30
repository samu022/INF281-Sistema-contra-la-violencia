<?php
class CentroLocal {
    private $codCentro;
    private $nombre;
    private $telefono;
    private $ubicacion;
    private $archivo;
    private $ci;
    
    public function __construct($codCentro, $nombre, $telefono, $ubicacion, $archivo,$ci) {
        $this->setCodCentro($codCentro);
        $this->setNombre($nombre);
        $this->setTelefono($telefono);
        $this->setUbicacion($ubicacion);
        $this->setArchivo($archivo);
        $this->setCi($ci);
    }
    
    public function setCodCentro($codCentro) {
        $this->codCentro = $codCentro;
    }
    
    public function getCodCentro() {
        return $this->codCentro;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }
    
    public function getUbicacion() {
        return $this->ubicacion;
    }
    
    public function setCi($ci) {
        $this->ci = $ci;
    }
    
    public function getCi() {
        return $this->ci;
    }

    public function setArchivo($archivo){
        $this->archivo = $archivo;
    }
    
    public function lista() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM centro_local");
        return ($sql);
    }
    
    public function listaEspecifica() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM centro_local WHERE codCentro = $this->codCentro");
        return ($sql);
    }
    
    public function insertar() {
        //include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO centro_local (nombre, telefono, ubicacion, archivo, ci) VALUES (?, ?, ?, ?, ?)");
    
        // Vincular los parámetros
        $stmt->bind_param("ssssi", $this->nombre, $this->telefono, $this->ubicacion, $this->archivo, $this->ci);
    
        // Ejecutar la sentencia
        $result = $stmt->execute();
    
        // Verificar si la consulta se realizó con éxito
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al insertar
        }
    }

    public function eliminar() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM centro_local WHERE codCentro = '$this->codCentro'");
        return ($sql);
    }

    public function modificar() {
        //include("conexion.php");
        $db = new Conexion();
        
        // Sentencia SQL para actualizar el centro local
        $sql = $db->prepare("UPDATE centro_local SET nombre = ?, telefono = ?, ubicacion = ? , archivo = ?, ci = ? WHERE codCentro = ?"); 
    
        // Vincular los parámetros
        $sql->bind_param("ssssss", $this->nombre, $this->telefono, $this->ubicacion, $this->archivo, $this->ci, $this->codCentro);
        
        // Ejecutar la sentencia
        $result = $sql->execute();
    
        // Verificar si la actualización fue exitosa
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al actualizar
        }
    }
}

?>