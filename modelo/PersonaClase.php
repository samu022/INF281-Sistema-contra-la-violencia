<?php
class Persona{
    private $ci;
    private $nombre;
    private $apePaterno;
    private $apeMaterno;
    private $fechaNaci;
    private $sexo;
    private $direccion;
    private $estado_civil;
    private $profesion;


    public function __construct($ci, $nombre, $apePaterno, $apeMaterno, $fechaNaci, $sexo, $direccion, $estado_civil, $profesion, $numero_telefono) {
        $this->setCi($ci);
        $this->setNombre($nombre);
        $this->setApePaterno($apePaterno);
        $this->setApeMaterno($apeMaterno);
        $this->setFechaNaci($fechaNaci);
        $this->setSexo($sexo);
        $this->setDireccion($direccion);
        $this->setEstadoCivil($estado_civil);
        $this->setProfesion($profesion);
        $this->setNumeroTelefono($numero_telefono);
    }

    public function lista(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM persona");
        return ($sql);
    }public function lista_especifica(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM persona where ci=$this->ci");
        return ($sql);
    }
    
    public function setCi($ci) {
        $this->ci = $ci;
    }

    public function getCi() {
        return $this->ci;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setApePaterno($apePaterno) {
        $this->apePaterno = $apePaterno;
    }

    public function getApePaterno() {
        return $this->apePaterno;
    }

    public function setApeMaterno($apeMaterno) {
        $this->apeMaterno = $apeMaterno;
    }

    public function getApeMaterno() {
        return $this->apeMaterno;
    }

    public function setFechaNaci($fechaNaci) {
        $this->fechaNaci = $fechaNaci;
    }

    public function getFechaNaci() {
        return $this->fechaNaci;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setEstadoCivil($estado_civil) {
        $this->estado_civil = $estado_civil;
    }

    public function getEstadoCivil() {
        return $this->estado_civil;
    }

    public function setProfesion($profesion) {
        $this->profesion = $profesion;
    }

    public function getProfesion() {
        return $this->profesion;
    }

    public function setNumeroTelefono($numero_telefono) {
        $this->numero_telefono = $numero_telefono;
    }

    public function getNumeroTelefono() {
        return $this->numero_telefono;
    }
   

    //para evitar inyecciones sql
    public function grabarPersona() {
        //include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO persona (ci, nombre, apePaterno, apeMaterno, fechaNaci, sexo, direccion, estado_civil, profesion, telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Vincular los parámetros
        $stmt->bind_param("isssssssss", $this->ci, $this->nombre, $this->apePaterno, $this->apeMaterno, $this->fechaNaci, $this->sexo, $this->direccion, $this->estado_civil, $this->profesion, $this->numero_telefono);
    
        // Ejecutar la sentencia
        $result = $stmt->execute();
        if (!$stmt) {
            die("Error al preparar la consulta: " . $db->error);
        }
        
        // Verificar si la consulta se realizó con éxito
        if ($result) {
            return true; // Éxito
        } else {
            echo "Error al registrar la denuncia: " . $stmt->error;
            return false; // Fallo al insertar
        }
    }
    
    
        
    public function elimina(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("DELETE FROM persona WHERE ci='$this->ci'");
        return ($sql);
    }
    public function modifica() {
        //include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $sql = $db->prepare("UPDATE persona SET nombre = ?, apePaterno = ?, apeMaterno = ?, fechaNaci = ?, sexo = ?, direccion = ?, estado_civil = ?, profesion = ?, numero_telefono = ? WHERE ci = ?");
    
        // Vincular los parámetros
        $sql->bind_param("sssssssss", $this->nombre, $this->apePaterno, $this->apeMaterno, $this->fechaNaci, $this->sexo, $this->direccion, $this->estado_civil, $this->profesion, $this->numero_telefono, $this->ci);
    
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