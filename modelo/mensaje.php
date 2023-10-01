<?php
class Mensaje {
    private $codMensaje;
    private $fechaMensaje;
    private $horaMensaje;
    private $contenidoMensaje;
    private $ci_usuario;
    
    public function __construct($codMensaje,$fechaMensaje, $horaMensaje, $contenidoMensaje, $ci_usuario) {
        $this->codMensaje = $codMensaje;
        $this->fechaMensaje = $fechaMensaje;
        $this->horaMensaje = $horaMensaje;
        $this->contenidoMensaje = $contenidoMensaje;
        $this->ci_usuario = $ci_usuario;
    }

    // Métodos para establecer y obtener los nuevos atributos
    public function setCodMensaje($codMensaje) {
        $this->codMensaje = $codMensaje;
    }

    public function getCodMensaje() {
        return $this->codMensaje;
    }
    public function setFechaMensaje($fechaMensaje) {
        $this->fechaMensaje = $fechaMensaje;
    }

    public function getFechaMensaje() {
        return $this->fechaMensaje;
    }

    public function setHoraMensaje($horaMensaje) {
        $this->horaMensaje = $horaMensaje;
    }

    public function getHoraMensaje() {
        return $this->horaMensaje;
    }

    public function setContenidoMensaje($contenidoMensaje) {
        $this->contenidoMensaje = $contenidoMensaje;
    }

    public function getContenidoMensaje() {
        return $this->contenidoMensaje;
    }

    public function setCiUsuario($ci_usuario) {
        $this->ci_usuario = $ci_usuario;
    }

    public function getCiUsuario() {
        return $this->ci_usuario;
    }



    
    public function lista() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM mensaje");
        return ($sql);
    }
    
    public function listaEspecifica() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM mensaje WHERE codMensaje = $this->codMensaje");
        return ($sql);
    }
    
    public function insertar() {
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO mensaje (fechaMensaje, horaMensaje, contenidoMensaje, ci_usuario) VALUES (?, ?, ?, ?)");
    
        // Vincular los parámetros sin el símbolo $
        $stmt->bind_param("sssi", $this->fechaMensaje, $this->horaMensaje, $this->contenidoMensaje, $this->ci_usuario);
    
        // Ejecutar la sentencia
        $result = $stmt->execute();
    
        // Verificar si la consulta se realizó con éxito
        if ($result) {
            // Obtener el ID generado para la última inserción
            $codMensajeGenreado = $db->insert_id;
            $this->codMensaje = $codMensajeGenreado;
            return true; // Devuelve verdadero para indicar éxito
        } else {
            return false; // Fallo al insertar
        }
    }
    
    public function eliminar() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM mensaje WHERE codCentro = '$this->codMensaje'");
        return ($sql);
    }

    public function modificar() {
        //include("conexion.php");
        $db = new Conexion();
        
        // Sentencia SQL para actualizar el centro local
        $sql = $db->prepare("UPDATE mensaje SET fechaMensaje = ?, horaMensaje = ?, contenidoMensaje = ? , ci_usuario = ? WHERE codMensaje = ?"); 
    
        // Vincular los parámetros
        $sql->bind_param("sssss", $this->$fechaMensaje, $this->$horaMensaje, $this->$contenidoMensaje, $this->$ci_usuario, $this->$codMensaje);
        
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
