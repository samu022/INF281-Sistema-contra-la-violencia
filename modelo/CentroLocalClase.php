<?php
class CentroLocal {
    private $codCentro;
    private $nombre;
    private $telefono;
    private $ubicacion;
    private $archivo;
    private $pagina;
    private $ci;
    
    public function __construct($codCentro, $nombre, $telefono, $ubicacion, $archivo,$pagina,$ci) {
        $this->setCodCentro($codCentro);
        $this->setNombre($nombre);
        $this->setTelefono($telefono);
        $this->setUbicacion($ubicacion);
        $this->setArchivo($archivo);
        $this->setPagina($pagina);
        $this->setCi($ci);
    }
    
    public function setCodCentro($codCentro) {
        $this->codCentro = $codCentro;
    }
    
    public function getCodCentro() {
        return $this->codCentro;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }
    
    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function setPagina($pagina) {
        $this->pagina = $pagina;
    }
    
    public function getPagina() {
        return $this->pagina;
    }
    
    public function setCi($ci) {
        $this->ci = $ci;
    }
    
    public function getCi() {
        return $this->ci;
    }

    public function setArchivo($archivo){
        $this->archivo = $archivo;
    }
    
    public function lista() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM centro_local");
        return ($sql);
    }
    
    public function listaEspecifica() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM centro_local WHERE codCentro = $this->codCentro");
        return ($sql);
    }
    
    public function insertar() {
        //include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO centro_local (nombre, telefono, ubicacion, archivo, pagina, ci) VALUES (?, ?, ?, ?, ?, ?)");
    
        // Vincular los parámetros
        $stmt->bind_param("sssssi", $this->nombre, $this->telefono, $this->ubicacion, $this->archivo, $this->pagina, $this->ci);
    
        // Ejecutar la sentencia
        $result = $stmt->execute();
    
        // Verificar si la consulta se realizó con éxito
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al insertar
        }
    }

    public function eliminar() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM centro_local WHERE codCentro = '$this->codCentro'");
        return ($sql);
    }

    public function modificar() {
        //include("conexion.php");
        $db = new Conexion();
        
        // Sentencia SQL para actualizar el centro local
        $sql = $db->prepare("UPDATE centro_local SET nombre = ?, telefono = ?, ubicacion = ? , archivo = ?, pagina = ?, ci = ? WHERE codCentro = ?"); 
    
        // Vincular los parámetros
        $sql->bind_param("sssssss", $this->nombre, $this->telefono, $this->ubicacion, $this->archivo, $this->pagina, $this->ci, $this->codCentro);
        
        // Ejecutar la sentencia
        $result = $sql->execute();
    
        // Verificar si la actualización fue exitosa
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al actualizar
        }
    }

    public function buscarPorPalabraClave($palabraClave) {
        $db = new Conexion();
        
        // Consulta SQL con una consulta preparada para evitar la inyección SQL
        $stmt = $db->prepare("SELECT * FROM centro_local WHERE nombre LIKE ? OR telefono LIKE ? OR ubicacion LIKE ?");
        
        // Usamos % antes y después del valor para buscar coincidencias parciales
        $param = "%" . $palabraClave . "%";
        
        // Vinculamos el parámetro múltiples veces según la cantidad de columnas en la consulta
        $stmt->bind_param("sss", $param, $param, $param);
        
        // Ejecutamos la consulta
        $stmt->execute();
        
        // Obtenemos el resultado
        $result = $stmt->get_result();
        
        return $result;
    }

    public function cuenta(){
        $db = new Conexion();
        $sql = $db->query("SELECT COUNT(*) as count FROM centro_local"); // Usa "as count" para dar un alias al resultado
        $result = $sql->fetch_assoc(); // Obtiene el resultado como un array asociativo
        return $result['count']; // Devuelve el valor de la columna "count"
    }
}

?>