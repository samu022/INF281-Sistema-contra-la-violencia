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
        return $sql;
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