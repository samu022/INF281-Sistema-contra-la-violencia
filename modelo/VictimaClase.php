<?php
class Victima{
    private $ci;
    private $relacion_perpetrador;
    private $codDenuncia;
    private $numero_telefono;

    public function __construct($ci, $relacion_perpetrador, $codDenuncia,$numero_telefono){
        $this->setCi($ci);
        $this->setRelacion_Perpetrador($relacion_perpetrador);
        $this->setCodDenuncia($codDenuncia);
        $this->setNumeroTelefono($numero_telefono);
    }
    public function lista(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM victima");
        return ($sql);
    }public function lista_especifica(){
        include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM victima where ci=$this->ci");
        return ($sql);
    }
    public function setCi($ci){
        $this->ci=$ci;
    }
    public function getCi(){
        return $this->ci;
    }
    public function setRelacion_perpetrador($relacion_perpetrador){
        $this->relacion_perpetrador=$relacion_perpetrador;
    }
    public function getRelacion_perpetrador(){
        return $this->relacion_perpetrador;
    }
    public function setCodDenuncia($codDenuncia){
        $this->codDenuncia=$codDenuncia;
    }
    public function getCodDenuncia(){
        return $this->codDenuncia;
    }
    public function setNumeroTelefono($numero_telefono){
        $this->numero_telefono=$numero_telefono;
    }
    public function getNumeroTelefono(){
        return $this->numero_telefono;
    }
   

    //para evitar inyecciones sql
    public function grabarVictima() {
        include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO victima (ci, relacion_perpetrador, codDenuncia,numero_telefono) VALUES (?, ?, ?,?)");

        
        // Vincular los parámetros
        $stmt->bind_param("isis", $this->ci, $this->relacion_perpetrador, $this->codDenuncia,$this->numero_telefono);
    
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
        $sql=$db->query("DELETE FROM victima WHERE ci='$this->ci'");
        return ($sql);
    }
    public function modifica(){
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE victima SET relacion_perpetrador = ?, codDenuncia = ?,numero_telefono=? WHERE ci= ?"); 
        // Vincular los parámetros
        $sql->bind_param("sisi", $this->relacion_perpetrador, $this->codDenuncia, $this->numero_telefono,$this->ci);
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