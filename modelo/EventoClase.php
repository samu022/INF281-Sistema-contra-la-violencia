<?php
class Evento{
    private $codEvento;
    private $tipo;
    private $fecha;
    private $titulo;
    private $duracion;
    private $rutaDirectorio;
    public function __construct($codEvento, $tipo, $fecha, $titulo,$duracion,$rutaDirectorio){
        $this->setCodEvento($codEvento);
        $this->setTipo($tipo);
        $this->setFecha($fecha);
        $this->setTitulo($titulo);
        $this->setDuracion($duracion);
        $this->setRutaDirectorio($rutaDirectorio);
    }
    public function lista(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM evento");
        return ($sql);
    }public function lista_especifica(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM evento where codEvento=$this->codEvento");
        return ($sql);
    }
    public function setCodEvento($codEvento){
        $this->codEvento=$codEvento;
    }
    public function getCodEvento(){
        return $this->codEvento;
    }
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setDuracion($duracion){
        $this->duracion=$duracion;
    }
    public function getDuracion(){
        return $this->duracion;
    }
    public function setRutaDirectorio($rutaDirectorio){
        $this->rutaDirectorio=$rutaDirectorio;
    }
    /*public function grabarLey_Normativa(){
        include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("INSERT INTO ley_normativa (nombre, fecha_promulgacion, tematica) VALUES ('$this->nombre', '$this->fecha_promulgacion', '$this->tematica')");
        return ($sql);
    }*/
    //para evitar inyecciones sql
    public function grabarEvento() {
        include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO evento (tipo, fecha, titulo,duracion,rutaDirectorio) VALUES (?, ?, ?,?,?)");

        
        // Vincular los parámetros
        $stmt->bind_param("sssss", $this->tipo, $this->fecha, $this->titulo,$this->duracion,$this->rutaDirectorio);
    
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
        $sql=$db->query("DELETE FROM evento WHERE codEvento='$this->codEvento'");
        return ($sql);
    }
    public function modifica(){
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE evento SET tipo = ?, fecha = ?, titulo = ?, duracion = ?, rutaDirectorio = ? WHERE codEvento = ?"); 
        // Vincular los parámetros
        $sql->bind_param("sssssi", $this->tipo, $this->fecha, $this->titulo, $this->duracion,$this->rutaDirectorio, $this->codEvento);
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