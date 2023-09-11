<?php
class Realiza {
    private $ciUsuario;
    private $codDenuncia;
    private $ci;
    private $anonimo; 

    public function __construct($ciUsuario, $codDenuncia, $ci, $anonimo) {
        $this->setCiUsuario($ciUsuario);
        $this->setCodDenuncia($codDenuncia);
        $this->setCi($ci);
        $this->setAnonimo($anonimo);
    }

    public function lista() {
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM realiza");
        return $sql;
    }

    public function listaEspecifica() {
        $db = new Conexion();
        $sql = $db->prepare("SELECT * FROM realiza WHERE codDenuncia = ?");
        $sql->bind_param("i", $this->codDenuncia);
        $sql->execute();
    
        // Verificar si ocurrió un error
        if ($sql->error) {
            echo "Error en la consulta: " . $sql->error;
            return null; // Puedes devolver null u otro valor que indique un error
        }
    
        // Obtener el resultado como un objeto mysqli_result
        $result = $sql->get_result();
    
        return $result;
    }
    
    

    public function insertarRealiza() {
        $db = new Conexion();
        $stmt = $db->prepare("INSERT INTO realiza (ci_usuario, codDenuncia, ci, anonimo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siis", $this->ciUsuario, $this->codDenuncia, $this->ci, $this->anonimo);
        $result = $stmt->execute();

        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al insertar
        }
    }

    public function eliminarRealiza() {
        $db = new Conexion();
        $stmt = $db->prepare("DELETE FROM realiza WHERE codDenuncia = ?");
        $stmt->bind_param("i", $this->codDenuncia);
        $result = $stmt->execute();
        return $result;
    }
    public function eliminarRealizaAgresoresYPersonas(){
        $db = new Conexion();
    
        // Obtener los CI de los agresores asociados con el codDenuncia
        $ciAgresorArray = [];
        $sql_get_ci_agresor = "SELECT ci FROM realiza WHERE codDenuncia='$this->codDenuncia'";
        $result = $db->query($sql_get_ci_agresor);
    
        while ($row = $result->fetch_assoc()) {
            $ciAgresorArray[] = $row['ci'];
        }
        //eliminar realiza
        $stmt = $db->prepare("DELETE FROM realiza WHERE codDenuncia = ?");
        $stmt->bind_param("i", $this->codDenuncia);
        $result = $stmt->execute();
        // Eliminar registros de agresor utilizando los CI
        foreach ($ciAgresorArray as $ciAgresor) {
            $sql_delete_agresor = "DELETE FROM agresor WHERE ci='$ciAgresor'";
            $db->query($sql_delete_agresor);
        }
    
        // Eliminar registros de persona utilizando los CI
        foreach ($ciAgresorArray as $ciAgresor) {
            $sql_delete_persona = "DELETE FROM persona WHERE ci='$ciAgresor'";
            $db->query($sql_delete_persona);
        }
    
        return true;
    }
    

    public function modificarRealiza() {
        $db = new Conexion();
        $stmt = $db->prepare("UPDATE realiza SET ci_usuario = ?, anonimo = ?, ci=? WHERE codDenuncia = ?");
        $stmt->bind_param("sssi", $this->ciUsuario, $this->anonimo, $this->ci,$this->codDenuncia);
        $result = $stmt->execute();

        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al actualizar
        }
    }

    public function setCiUsuario($ciUsuario) {
        $this->ciUsuario = $ciUsuario;
    }

    public function getCiUsuario() {
        return $this->ciUsuario;
    }

    public function setCodDenuncia($codDenuncia) {
        $this->codDenuncia = $codDenuncia;
    }

    public function getCodDenuncia() {
        return $this->codDenuncia;
    }

    public function setCi($ci) {
        $this->ci = $ci;
    }

    public function getCi() {
        return $this->ci;
    }

    public function setAnonimo($anonimo) {
        $this->anonimo = $anonimo;
    }

    public function getAnonimo() {
        return $this->anonimo;
    }
}

?>