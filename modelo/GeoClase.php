<?php
class Geolocalizacion{
    private $codGeo;
    private $latitud;
    private $longitud;

    public function __construct($codGeo, $latitud, $longitud){
        $this->setCodGeo($codGeo);
        $this->setLatitud($latitud);
        $this->setLongitud($longitud);
    }
    public function lista(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM geolocalizacion");
        return ($sql);
    }public function lista_especifica(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM geolocalizacion where codGeo=$this->codGeo");
        return ($sql);
    }
    public function setCodGeo($codGeo){
        $this->codGeo=$codGeo;
    }
    public function getCodGeo(){
        return $this->codGeo;
    }
    public function setLatitud($latitud){
        $this->latitud=$latitud;
    }
    public function getLatitud(){
        return $this->latitud;
    }
    public function setLongitud($longitud){
        $this->longitud=$longitud;
    }
    public function getLongitud(){
        return $this->longitud;
    }
   

    //para evitar inyecciones sql
    public function grabarGeo() {
        include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO geolocalizacion (codGeo, latitud, longitud) VALUES (?, ?, ?)");

        
        // Vincular los parámetros
        $stmt->bind_param("iss", $this->codGeo, $this->latitud, $this->longitud);
    
        // Ejecutar la sentencia
        $result = $stmt->execute();
    
        // Verificar si la consulta se realizó con éxito
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al insertar
        }
    }
    
        
    public function elimina(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("DELETE FROM geolocalizacion WHERE codGeo='$this->codGeo'");
        return ($sql);
    }
    public function modifica(){
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE geolocalizacion SET latitud = ?, longitud = ? WHERE codGeo= ?"); 
        // Vincular los parámetros
        $sql->bind_param("ssi", $this->latitud, $this->longitud, $this->codGeo);
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