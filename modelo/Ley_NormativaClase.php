<?php
class Ley_Normativa{
    private $codLey;
    private $nombre;
    private $fecha_promulgacion;
    private $tematica;
    private $informacion;
    public function __construct($codLey, $nombre, $fecha_promulgacion, $tematica,$informacion){
        $this->setCodLey($codLey);
        $this->setNombre($nombre);
        $this->setFecha_Promulgacion($fecha_promulgacion);
        $this->setTematica($tematica);
        $this->setInformacion($informacion);
    }
    public function lista(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM ley_normativa");
        return ($sql);
    }public function lista_especifica(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM ley_normativa where codLey=$this->codLey");
        return ($sql);
    }
    public function setcodLey($codLey){
        $this->codLey=$codLey;
    }
    public function getCodLey(){
        return $this->codLey;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setFecha_Promulgacion($fecha_promulgacion){
        $this->fecha_promulgacion=$fecha_promulgacion;
    }
    public function getFecha_Promulgacion(){
        return $this->fecha_promulgacion;
    }
    public function setTematica($tematica){
        $this->tematica=$tematica;
    }
    public function getTematica(){
        return $this->tematica;
    }
    public function setInformacion($informacion){
        $this->informacion=$informacion;
    }
    public function getInformacion(){
        return $this->informacion;
    }
    /*public function grabarLey_Normativa(){
        include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("INSERT INTO ley_normativa (nombre, fecha_promulgacion, tematica) VALUES ('$this->nombre', '$this->fecha_promulgacion', '$this->tematica')");
        return ($sql);
    }*/
    //para evitar inyecciones sql
    public function grabarLey_Normativa() {
        include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO ley_normativa (nombre, fecha_promulgacion, tematica,informacion) VALUES (?, ?, ?,?)");

        
        // Vincular los parámetros
        $stmt->bind_param("ssss", $this->nombre, $this->fecha_promulgacion, $this->tematica,$this->informacion);
    
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
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("DELETE FROM ley_normativa WHERE codLey='$this->codLey'");
        return ($sql);
    }
    public function modifica(){
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE ley_normativa SET nombre = ?, fecha_promulgacion = ?, tematica = ?, informacion = ? WHERE codLey = ?"); 
        // Vincular los parámetros
        $sql->bind_param("ssssi", $this->nombre, $this->fecha_promulgacion, $this->tematica, $this->informacion, $this->codLey);
        $result = $sql->execute();
        
        // Verificar si la actualización fue exitosa
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al actualizar
        }
    }

    public function filtrarFecha($fecha){
        $db = new Conexion();
        $stmt = $db->prepare("SELECT * FROM ley_normativa WHERE fecha_promulgacion LIKE ?");
        $param = "%$fecha%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function buscarPorPalabraClave($palabraClave) {
        $db = new Conexion();
        
        // Consulta SQL con una consulta preparada para evitar la inyección SQL
        $stmt = $db->prepare("SELECT * FROM ley_normativa WHERE tematica LIKE ?");
        
        // Usamos % antes y después del valor para buscar coincidencias parciales
        $param = "%" . $palabraClave . "%";
        
        // Vinculamos el parámetro múltiples veces según la cantidad de columnas en la consulta
        $stmt->bind_param("s", $param);
        
        // Ejecutamos la consulta
        $stmt->execute();
        
        // Obtenemos el resultado
        $result = $stmt->get_result();
        
        return $result;
    }

    public function cuenta(){
        $db = new Conexion();
        $sql = $db->query("SELECT COUNT(*) as count FROM ley_normativa"); // Usa "as count" para dar un alias al resultado
        $result = $sql->fetch_assoc(); // Obtiene el resultado como un array asociativo
        return $result['count']; // Devuelve el valor de la columna "count"
    }
    


}
?>