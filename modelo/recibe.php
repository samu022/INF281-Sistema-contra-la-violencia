<?php
class Recibe {
    private $codMensaje;
    private $ci_usuario;
    
    public function __construct($codMensaje, $ci_usuario) {
        $this->codMensaje = $codMensaje;
        $this->ci_usuario = $ci_usuario;
    }

    // Métodos para establecer y obtener los nuevos atributos
    
    public function setCodMensaje($codMensaje) {
        $this->codMensaje = $codMensaje;
    }

    public function getCodMensaje() {
        return $this->codMensaje;
    }

    public function setCiUsuario($ci_usuario) {
        $this->ci_usuario = $ci_usuario;
    }

    public function getCiUsuario() {
        return $this->ci_usuario;
    }

    public function lista() {
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM recibe");
        return $sql;
    }
    
    public function listaEspecifica() {
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM recibe WHERE codMensaje = $this->codMensaje");
        return $sql;
    }
    
    public function insertar() {
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO recibe (codMensaje, ci_usuario) VALUES (?, ?)");
    
        // Vincular los parámetros
        $stmt->bind_param("ii", $this->codMensaje, $this->ci_usuario);
    
        // Ejecutar la sentencia
        $result = $stmt->execute();
    
        // Verificar si la consulta se realizó con éxito
        if ($result) {
            return true; // Éxito
        } else {
            // Si hay un error, imprime el mensaje de error
            echo "Error: " . $stmt->error;
            return false; // Fallo al insertar
        }
    }
    

    public function eliminar() {
        $db = new Conexion();
        $sql = $db->query("DELETE FROM recibe WHERE codMensaje = $this->codMensaje");
        return $sql;
    }

    public function modificar() {
        $db = new Conexion();
        
        // Sentencia SQL para actualizar el registro
        $sql = $db->prepare("UPDATE recibe SET ci_usuario = ? WHERE codMensaje = ?"); 
    
        // Vincular los parámetros
        $sql->bind_param("ii", $this->ci_usuario, $this->codMensaje);
        
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
