<?php
class InformacionEducativa {
    private $codInformacion;
    private $titulo;
    private $descripcion;
    private $tipoViolencia;
    private $rutaDirectorio;
    private $tipo;
    private $fechaSubida;
    
    public function __construct($codInformacion, $titulo, $descripcion, $tipoViolencia, $rutaDirectorio, $tipo, $fechaSubida) {
        $this->setCodInformacion($codInformacion);
        $this->setTitulo($titulo);
        $this->setDescripcion($descripcion);
        $this->setTipoViolencia($tipoViolencia);
        $this->setRutaDirectorio($rutaDirectorio);
        $this->setTipo($tipo);
        $this->setFechaSubida($fechaSubida);
    }
    
    public function setCodInformacion($codInformacion) {
        $this->codInformacion = $codInformacion;
    }
    
    public function getCodInformacion() {
        return $this->codInformacion;
    }
    
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    public function getTitulo() {
        return $this->titulo;
    }
    
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setTipoViolencia($tipoViolencia) {
        $this->tipoViolencia = $tipoViolencia;
    }
    
    public function getTipoViolencia() {
        return $this->tipoViolencia;
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

    public function setFechaSubida($fechaSubida) {
        $this->fechaSubida = $fechaSubida;
    }
    
    public function getFechaSubida() {
        return $this->fechaSubida;
    }
    public function lista(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM informacion_educativa ORDER BY fechaSubida desc");
        return ($sql);
    }public function lista_especifica(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM informacion_educativa where codInformacion=$this->codInformacion");
        return ($sql);
    }
    // Métodos para insertar, eliminar y modificar informacion educativa
    public function grabarInformacion() {
        //include("conexion.php");
        $db = new Conexion();
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO informacion_educativa (titulo, descripcion, tipoViolencia, rutaDirectorio, tipo, fechaSubida) VALUES (?, ?, ?, ?, ?, ?)");
    
        // Vincular los parámetros
        $stmt->bind_param("ssssss", $this->titulo, $this->descripcion, $this->tipoViolencia, $this->rutaDirectorio, $this->tipo, $this->fechaSubida);
    
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
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("DELETE FROM informacion_educativa WHERE codInformacion='$this->codInformacion'");
        return ($sql);
    }

    public function modificar() {
        //include("conexion.php");
        $db = new Conexion();
        
        // Sentencia SQL para actualizar la información educativa
        $stmt = $db->prepare("UPDATE informacion_educativa SET titulo = ?, descripcion = ?, tipoViolencia = ?, rutaDirectorio = ?, tipo = ? WHERE codInformacion = ?"); 
    
        // Vincular los parámetros
        $stmt->bind_param("sssssi", $this->titulo, $this->descripcion, $this->tipoViolencia, $this->rutaDirectorio, $this->tipo, $this->codInformacion);
        
        // Ejecutar la sentencia
        $result = $stmt->execute();
    
        // Verificar si la actualización fue exitosa
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al actualizar
        }
    }
    public function filtrarTipoViolencia($tipoViolencia){
        $db = new Conexion();
        $stmt = $db->prepare("SELECT * FROM informacion_educativa WHERE tipoViolencia LIKE ?");
        $param = "%$tipoViolencia%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    public function filtrarFecha($fecha){
        $db = new Conexion();
        $stmt = $db->prepare("SELECT * FROM informacion_educativa WHERE fechaSubida LIKE ?");
        $param = "%$fecha%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    public function buscarPorPalabraClave($palabraClave) {
        $db = new Conexion();
        
        // Consulta SQL con una consulta preparada para evitar la inyección SQL
        $stmt = $db->prepare("SELECT * FROM informacion_educativa WHERE titulo LIKE ? OR descripcion LIKE ? OR tipo LIKE ? OR fechaSubida LIKE ?");
        
        // Usamos % antes y después del valor para buscar coincidencias parciales
        $param = "%" . $palabraClave . "%";
        
        // Vinculamos el parámetro múltiples veces según la cantidad de columnas en la consulta
        $stmt->bind_param("ssss", $param, $param, $param, $param);
        
        // Ejecutamos la consulta
        $stmt->execute();
        
        // Obtenemos el resultado
        $result = $stmt->get_result();
        
        return $result;
    }
    public function cuenta(){
        $db = new Conexion();
        $sql = $db->query("SELECT COUNT(*) as count FROM informacion_educativa"); // Usa "as count" para dar un alias al resultado
        $result = $sql->fetch_assoc(); // Obtiene el resultado como un array asociativo
        return $result['count']; // Devuelve el valor de la columna "count"
    }
}
?>