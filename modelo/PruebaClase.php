<?php
class Prueba{
    private $codPrueba;
    private $tipo;
    private $descripcion;
    private $ruta;

    public function __construct($codPrueba, $tipo, $descripcion, $ruta){
        $this->setCodPrueba($codPrueba);
        $this->setTipo($tipo);
        $this->setDescripcion($descripcion);
        $this->setRuta($ruta);

    }
    public function lista(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM prueba");
        return ($sql);
    }public function lista_especifica(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM prueba where codPrueba=$this->codPrueba");
        return ($sql);
    }
    public function setCodPrueba($codPrueba){
        $this->codPrueba=$codPrueba;
    }
    public function getCodPrueba(){
        return $this->codPrueba;
    }
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setRuta($ruta){
        $this->ruta=$ruta;
    }
    public function getRuta(){
        return $this->ruta;
    }
    

    //para evitar inyecciones sql
    public function grabarPrueba() {
        include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO prueba (tipo, descripcion, ruta) VALUES (?, ?, ?)");

        
        // Vincular los parámetros
        $stmt->bind_param("sss", $this->tipo, $this->descripcion, $this->ruta);
    
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
        $sql=$db->query("DELETE FROM prueba WHERE codPrueba='$this->codPrueba'");
        return ($sql);
    }
    public function modifica(){
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE prueba SET tipo = ?, descripcion = ?, ruta = ? WHERE codPrueba= ?"); 
        // Vincular los parámetros
        $sql->bind_param("sssi", $this->tipo, $this->descripcion, $this->ruta, $this->codPrueba);
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