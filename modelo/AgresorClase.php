<?php
class Agresor{
    private $ci;
    private $descripcion;
    

    public function __construct($ci, $descripcion) {
        $this->setCi($ci);
        $this->setDescripcion($descripcion);
    }
    public function lista(){
        //include("conexion.php");
        //$db=new Conexion();
        $sql=$db->query("SELECT * FROM agresor");
        return ($sql);
    }public function lista_especifica(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM agresor where ci=$this->ci");
        return ($sql);
    }
    public function setCi($ci) {
        $this->ci = $ci;
    }

    public function getCi() {
        return $this->ci;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

   

    //para evitar inyecciones sql
    public function grabar() {
        //include("conexion.php");
        $db = new Conexion();

        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO agresor (ci, descripcion) VALUES (?, ?)");

        // Vincular los parámetros
        $stmt->bind_param("is", $this->ci, $this->descripcion);

        // Ejecutar la sentencia
        $result = $stmt->execute();

        // Verificar si la consulta se realizó con éxito
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al insertar
        }
    }

    public function elimina() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM agresor WHERE ci='$this->ci'");
        return ($sql);
    }

    public function modifica() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE agresor SET descripcion = ? WHERE ci = ?"); 
        // Vincular los parámetros
        $sql->bind_param("si", $this->descripcion, $this->ci);
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


