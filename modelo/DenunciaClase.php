<?php
class Denuncia{
    private $codDenuncia;
    private $tipo;
    private $descripcion;
    private $fecha;
    private $testigo;
    private $seguimiento;
    private $codGeo;
    public function __construct($codDenuncia, $tipo, $descripcion, $fecha,$testigo,$seguimiento,$codGeo){
        $this->setCodDenuncia($codDenuncia);
        $this->setTipo($tipo);
        $this->setDescripcion($descripcion);
        $this->setFecha($fecha);
        $this->setTestigo($testigo);
        $this->setSeguimiento($seguimiento);
        $this->setCodGeo($codGeo);
    }
    public function lista1(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM denuncia ORDER BY fecha desc");
        return ($sql);
    }
    public function lista() {
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM denuncia WHERE seguimiento='En proceso' ORDER BY fecha desc");
        return $sql;
    }
    
    public function lista_especifica(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM denuncia where codDenuncia=$this->codDenuncia");
        return ($sql);
    }
    public function setCodDenuncia($codDenuncia){
        $this->codDenuncia=$codDenuncia;
    }
    public function getCodDenuncia(){
        return $this->codDenuncia;
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
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setTestigo($testigo){
        $this->testigo=$testigo;
    }
    public function getTestigo(){
        return $this->testigo;
    }
    public function setSeguimiento($seguimiento){
        $this->seguimiento=$seguimiento;
    }
    public function getSeguimiento(){
        return $this->seguimiento;
    }
    public function setCodGeo($codGeo){
        $this->codGeo=$codGeo;
    }
    public function getCodGeo(){
        return $this->codGeo;
    }
    
    //para evitar inyecciones sql
    public function grabarDenuncia() {
        //include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO denuncia (tipo, descripcion, testigo, seguimiento,fecha,codGeo) VALUES (?, ?, ?,?,?,?)");

        
        // Vincular los parámetros
        $stmt->bind_param("sssssi", $this->tipo, $this->descripcion,$this->testigo, $this->seguimiento,$this->fecha,$this->codGeo);
    
        // Ejecutar la sentencia
        $result = $stmt->execute();
    
        // Verificar si la consulta se realizó con éxito
        if ($result) {
            $codDenGenerado = $db->insert_id;
            $this->codDenuncia = $codDenGenerado;
            return true; // Éxito
        } else {
            echo "Error al registrar la denuncia: " . $stmt->error;
            return false; // Fallo al insertar
        }
    }
    
        
    public function elimina(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("DELETE FROM denuncia WHERE codDenuncia='$this->codDenuncia'");
        return ($sql);
    }
    public function eliminaDenunciasYGeolocalizacion(){
        $db = new Conexion();
        
        // Obtener los codGeo asociados con las denuncias
        $codGeoArray = [];
        $sql_get_codGeo = "SELECT codGeo FROM denuncia WHERE codDenuncia=?";
        
        // Preparar la consulta
        $stmt = $db->prepare($sql_get_codGeo);
        $stmt->bind_param("i", $this->codDenuncia); // Vincular el valor de codDenuncia
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            $codGeoArray[] = $row['codGeo'];
        }
        
        // Eliminar registros de la tabla 'denuncia' utilizando consultas preparadas
        $stmt->close();
        $stmt = $db->prepare("DELETE FROM denuncia WHERE codDenuncia=?");
        $stmt->bind_param("i", $this->codDenuncia); // Vincular el valor de codDenuncia
        $stmt->execute();
        $stmt->close();
        
        // Eliminar registros de la tabla 'geolocalizacion' utilizando los 'codGeo' guardados en el array
        foreach ($codGeoArray as $codGeo) {
            $stmt = $db->prepare("DELETE FROM geolocalizacion WHERE codGeo = ?");
            $stmt->bind_param("i", $codGeo); // Vincular el valor de codGeo
            $stmt->execute();
            $stmt->close();
        }
        
        return true;
    }
    
    public function cuenta(){
        $db = new Conexion();
        $sql = $db->query("SELECT COUNT(*) as count FROM denuncia"); // Usa "as count" para dar un alias al resultado
        $result = $sql->fetch_assoc(); // Obtiene el resultado como un array asociativo
        return $result['count']; // Devuelve el valor de la columna "count"
    }
    
    public function grafico_tipo(){
        $db = new Conexion();
        $sql = $db->query("SELECT tipo, COUNT(*) AS cantidad_denuncias FROM denuncia GROUP BY tipo");
        
        $data = array(); // Crear un array para almacenar los resultados
        
        // Obtener todos los resultados en un array
        while ($row = $sql->fetch_assoc()) {
            $data[] = $row;
        }
        
        // Devolver el array de resultados
        return $data;
    }
    public function denunciasPorAnio($anio) {
        $db = new Conexion();
        $sql = $db->query("SELECT tipo, COUNT(*) AS cantidad FROM denuncia WHERE YEAR(fecha) >= $anio AND fecha <= CURDATE() GROUP BY tipo;");
        
        $data = array(); // Create an array to store the results
        
        while ($row = $sql->fetch_assoc()) {
            $data[] = $row;
        }
        
        // Devolver el array de resultados
        return $data;
    }
    
    
    public function denunciasPorFecha($fecha) {
        $db = new Conexion();
    
        // Consulta SQL con parámetros preparados para evitar SQL injection
        $sql = "SELECT tipo, COUNT(*) as cantidad 
                FROM denuncia 
                WHERE fecha BETWEEN ? AND CURDATE() group by tipo;";
        
        // Preparar la consulta
        if ($stmt = $db->prepare($sql)) {
            // Asociar los parámetros
            $stmt->bind_param("s", $fecha);
    
            // Ejecutar la consulta
            $stmt->execute();
    
            // Obtener resultados
            $result = $stmt->get_result();
    
            // Crear un array para almacenar los resultados
            $data = array();
    
            // Obtener todos los resultados en un array
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
    
            // Cerrar la consulta
            $stmt->close();
    
            // Devolver el array de resultados
            return $data;
        } else {
            // Manejar error en la preparación de la consulta
            echo "Error en la preparación de la consulta: " . $db->error;
        }
    }
    
    
    
    
    
    
    
    
    
    public function modifica(){
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE denuncia SET tipo = ?, descripcion = ?, fecha = ?, testigo = ?,seguimiento = ? WHERE codDenuncia = ?"); 
        // Vincular los parámetros
        $sql->bind_param("sssssi", $this->tipo, $this->descripcion, $this->fecha, $this->testigo, $this->seguimiento, $this->codDenuncia);
        $result = $sql->execute();
        
        // Verificar si la actualización fue exitosa
        if ($result) {
            return true; // Éxito
        } else {
            echo "SQL Error: " . $sql->error;
            return false; // Fallo al actualizar
        }
    }
    public function ModificaSeguimiento1($cod){
        $db = new Conexion();
        $seguimiento = "Finalizado"; // Valor que deseas establecer
        $sql = $db->prepare("UPDATE denuncia SET seguimiento = '$seguimiento' WHERE codDenuncia = ?"); 
    
        // Aquí vinculamos el código de denuncia al marcador de posición
        $sql->bind_param("i", $this->codDenuncia);
    
        $result = $sql->execute();
        
        // Verificar si la actualización fue exitosa
        if ($result) {
            return true; // Éxito
        } else {
            echo "SQL Error: " . $sql->error;
            return false; // Fallo al actualizar
        }
    }
    public function ModificaSeguimiento2($cod){
        $db = new Conexion();
        $seguimiento = "En proceso"; // Valor que deseas establecer
        $sql = $db->prepare("UPDATE denuncia SET seguimiento = '$seguimiento' WHERE codDenuncia = ?"); 
    
        // Aquí vinculamos el código de denuncia al marcador de posición
        $sql->bind_param("i", $this->codDenuncia);
    
        $result = $sql->execute();
        
        // Verificar si la actualización fue exitosa
        if ($result) {
            return true; // Éxito
        } else {
            echo "SQL Error: " . $sql->error;
            return false; // Fallo al actualizar
        }
    }

    public function filtrarFecha($fecha){
        $db = new Conexion();
        $stmt = $db->prepare("SELECT * FROM denuncia WHERE fecha LIKE ?");
        $param = "%$fecha%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function filtrarSeguimiento($seguimiento){
        $db = new Conexion();
        $stmt = $db->prepare("SELECT * FROM denuncia WHERE seguimiento LIKE ?");
        $param = "%$seguimiento%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

}
?>