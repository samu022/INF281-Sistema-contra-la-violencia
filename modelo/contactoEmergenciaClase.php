<?php
class ContactoEmergencia {
    private $ci_contacto;
    private $telefono;
    

    public function __construct($ci_contacto, $telefono) {
        $this->setCiContacto($ci_contacto);
        $this->setTelefono($telefono);
    }

    public function lista() {
        //include("conexion.php");
        //$db = new Conexion();
        $sql = $db->query("SELECT * FROM contacto_emergencia");
        return ($sql);
    }

    public function listaEspecifica() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM contacto_emergencia WHERE ci_contacto = $this->ci_contacto");
        return ($sql);
    }

    public function setCiContacto($ci_contacto) {
        $this->ci_contacto = $ci_contacto;
    }

    public function getCiContacto() {
        return $this->ci_contacto;
    }

    

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    // Método para evitar inyecciones SQL y obtener el valor autoincremental
        public function grabarContacto() {
            $db = new Conexion();

            // Utilizar sentencias preparadas para evitar inyección SQL
            $stmt = $db->prepare("INSERT INTO contacto_emergencia  (telefono) VALUES (?)");

            // Vincular los parámetros
            $stmt->bind_param("s", $this->telefono);

            // Ejecutar la sentencia
            $result = $stmt->execute();

            // Verificar si la consulta se realizó con éxito
            if ($result) {
                // Obtener el valor autoincremental generado
                $ci_contacto = $db->insert_id;
                return $ci_contacto; // Devuelve el valor de ci_contacto generado con éxito
            } else {
                return false; // Fallo al insertar
            }
        }

    public function elimina() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM contacto_emergencia WHERE ci_contacto = '$this->ci_contacto'");
        return ($sql);
    }
    // Método para verificar si el teléfono ya está registrado
    // Método para verificar si el teléfono ya está registrado y obtener el ci_contacto si existe
        public function telefonoExistente($telefono) {
            $db = new Conexion();

            // Utilizar una sentencia preparada para evitar inyección SQL
            $stmt = $db->prepare("SELECT ci_contacto FROM contacto_emergencia WHERE telefono = ?");
            $stmt->bind_param("s", $telefono);
            $stmt->execute();

            // Obtener el resultado
            $stmt->bind_result($ci_contacto);
            
            // Intentar obtener el valor
            if ($stmt->fetch()) {
                // El teléfono ya está registrado; devuelve el ci_contacto
                return $ci_contacto;
            } else {
                // El teléfono no está registrado
                return false;
            }
        }


    public function modifica() {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE contacto_emergencia SET  telefono = ? WHERE ci_contacto = ?"); 
        // Vincular los parámetros
        $sql->bind_param("si", $this->telefono, $this->ci_contacto);
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
