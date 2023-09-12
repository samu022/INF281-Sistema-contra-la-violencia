<?php
class InformacionEducativa{
    private $codInformacion;
    private $rutaDirectorio;
    private $tipo;
    
    public function __construct($codInformacion, $rutaDirectorio, $tipo) {
        $this->setCodInformacion($codInformacion);
        $this->setRutaDirectorio($rutaDirectorio);
        $this->setTipo($tipo);
    }
    
    public function setCodInformacion($codInformacion) {
        $this->codInformacion = $codInformacion;
    }
    
    public function getCodInformacion() {
        return $this->codInformacion;
    }
    
    public function setRutaDirectorio($rutaDirectorio) {
        $this->rutaDirectorio = $rutaDirectorio;
    }
    
    public function getRutaDirectorio() {
        return $this->rutaDirectorio;
    }
    
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    public function getTipo() {
        return $this->tipo;
    }
    public function lista(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM informacion_educativa");
        return ($sql);
    }public function lista_especifica(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM informacion_educativa where codInformacion=$this->codInformacion");
        return ($sql);
    }
    // Métodos para insertar, eliminar y modificar informacion educativa
    public function grabarInformacion() {
        include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO informacion_educativa (rutaDirectorio, tipo) VALUES (?, ?)");
    
        // Vincular los parámetros
        $stmt->bind_param("ss", $this->rutaDirectorio, $this->tipo);
    
        // Ejecutar la sentencia
        $result = $stmt->execute();
    
        // Verificar si la consulta se realizó con éxito
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al insertar
        }
    }
    

    public function eliminar(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("DELETE FROM informacion_educativa WHERE codInformacion='$this->codInformacion'");
        return ($sql);
    }

    public function modificar() {
        //include("conexion.php");
        $db = new Conexion();
        
        // Sentencia SQL para actualizar la información educativa
        $sql = $db->prepare("UPDATE informacion_educativa SET rutaDirectorio = ?, tipo = ? WHERE codInformacion = ?"); 
    
        // Vincular los parámetros
        $sql->bind_param("sss", $this->rutaDirectorio, $this->tipo, $this->codInformacion);
        
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