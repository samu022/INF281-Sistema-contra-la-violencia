<?php
class Tiene {
    private $ci_usuario;
    private $parentesco;
    private $ci_contacto;

    public function __construct($ci_usuario, $parentesco, $ci_contacto) {
        $this->setCiUsuario($ci_usuario);
        $this->setParentesco($parentesco);
        $this->setCiContacto($ci_contacto);
    }

    public function lista() {
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM tiene");
        return ($sql);
    }

    public function listaEspecifica() {
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM tiene WHERE ci_usuario = $this->ci_usuario and ci_contacto = $this->ci_contacto");
        return ($sql);
    }
    public function listaEspecifica1() {
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM tiene WHERE ci_usuario = $this->ci_usuario ");
        return ($sql);
    }

    public function setCiUsuario($ci_usuario) {
        $this->ci_usuario = $ci_usuario;
    }

    public function getCiUsuario() {
        return $this->ci_usuario;
    }

    public function setParentesco($parentesco) {
        $this->parentesco = $parentesco;
    }

    public function getParentesco() {
        return $this->parentesco;
    }

    public function setCiContacto($ci_contacto) {
        $this->ci_contacto = $ci_contacto;
    }

    public function getCiContacto() {
        return $this->ci_contacto;
    }

    // Método para evitar inyecciones SQL y obtener el valor autoincremental
    public function grabarTiene() {
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO tiene (ci_usuario, parentesco, ci_contacto) VALUES (?, ?, ?)");
    
        // Vincular los parámetros
        $stmt->bind_param("ssi", $this->ci_usuario, $this->parentesco, $this->ci_contacto);
    
        // Ejecutar la sentencia
        $result = $stmt->execute();
        //echo "pasa";
        // Verificar si la consulta se realizó con éxito
        if ($result) {
            return true; // Éxito
        } else {
            // Mostrar un mensaje de error en caso de fallo
            echo "Error al insertar en la tabla 'tiene': " . $stmt->error;
            return false; // Fallo al insertar
        }
    }
     

    public function elimina() {
        $db = new Conexion();
        $sql = $db->query("DELETE FROM tiene WHERE ci_contacto = '$this->ci_contacto' and ci_usuario = '$this->ci_usuario'");
        return ($sql);
    }

    // Método para verificar si un usuario ya tiene un contacto
    public function usuarioTieneContacto() {
        $db = new Conexion();
        $sql = $db->query("SELECT COUNT(*) FROM tiene WHERE ci_usuario = '$this->ci_usuario' AND ci_contacto = '$this->ci_contacto'");
        $row = mysqli_fetch_array($sql);
        return $row[0] > 0;
    }

    public function modifica() {
        $db = new Conexion();
        $sql = $db->prepare("UPDATE tiene SET parentesco = ? WHERE ci_contacto = ? and ci_usuario=?");
        $sql->bind_param("sii", $this->parentesco, $this->ci_contacto, $this->ci_usuario);
        $result = $sql->execute();

        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al actualizar
        }
    }
}

?>
