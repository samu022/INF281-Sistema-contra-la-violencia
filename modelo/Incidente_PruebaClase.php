<?php
class Incidente_Prueba{
    private $codDenuncia;
    private $codPrueba;
    

    public function __construct($codDenuncia, $codPrueba){
        $this->setCodDenuncia($codDenuncia);
        $this->setCodPrueba($codPrueba);
    }
    public function lista(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM incidente_prueba");
        return ($sql);
    }public function lista_especifica(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM incidente_prueba where codDenuncia=$this->codDenuncia");
        return ($sql);
    }
    public function setCodDenuncia($codDenuncia){
        $this->codDenuncia = $codDenuncia;
    }

    public function getCodDenuncia(){
        return $this->codDenuncia;
    }

    public function setCodPrueba($codPrueba){
        $this->codPrueba = $codPrueba;
    }

    public function getCodPrueba(){
        return $this->codPrueba;
    }
   

    // Métodos para insertar, eliminar y modificar incidentes de prueba en la base de datos
    public function insertarIncidentePrueba() {
        //include("conexion.php");
        $db = new Conexion();

        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO incidente_prueba (codDenuncia, codPrueba) VALUES (?, ?)");

        // Vincular los parámetros
        $stmt->bind_param("ii", $this->codDenuncia, $this->codPrueba);

        // Ejecutar la sentencia
        $result = $stmt->execute();

        // Verificar si la consulta se realizó con éxito
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al insertar
        }
    }

    public function eliminarIncidentePrueba(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("DELETE FROM incidente_prueba WHERE codDenuncia='$this->codDenuncia' AND codPrueba='$this->codPrueba'");
        return ($sql);
    }
    public function eliminarIncidentePrueba_Prueba(){
        $db = new Conexion();
    
        // Obtener codPrueba de incidente_prueba para la denuncia y codPrueba específicos
        $codPruebaArray = [];
        $sql_get_codPrueba = "SELECT codPrueba FROM incidente_prueba WHERE codDenuncia='$this->codDenuncia'";
        $result = $db->query($sql_get_codPrueba);
    
        while ($row = $result->fetch_assoc()) {
            $codPruebaArray[] = $row['codPrueba'];
        }
    
        // Eliminar registros de incidente_prueba
        $sql_delete_incidente_prueba = "DELETE FROM incidente_prueba WHERE codDenuncia='$this->codDenuncia'";
        $db->query($sql_delete_incidente_prueba);
    
        // Eliminar registros de pruebas utilizando los valores de codPrueba en el array
        foreach ($codPruebaArray as $codPrueba) {
            $sql_delete_pruebas = "DELETE FROM pruebas WHERE codPrueba='$codPrueba'";
            $db->query($sql_delete_pruebas);
        }
    
        return true;
    }
    
    public function modificarIncidentePrueba(){
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE incidente_prueba SET codPrueba = ? WHERE codDenuncia = ?"); 
        // Vincular los parámetros
        $sql->bind_param("ii", $this->codPrueba, $this->codDenuncia);
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