<?php
class Llena
{
    private $ci_usuario;
    private $consejo;
    private $codFormulario;

    public function __construct($ci_usuario, $consejo, $codFormulario)
    {
        $this->setCiUsuario($ci_usuario);
        $this->setConsejo($consejo);
        $this->setCodFormulario($codFormulario);
    }

    public function lista()
    {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM llena"); // Reemplaza "tu_tabla" con el nombre de tu tabla
        return ($sql);
    }

    public function setCiUsuario($ci_usuario)
    {
        $this->ci_usuario = $ci_usuario;
    }

    public function getCiUsuario()
    {
        return $this->ci_usuario;
    }

    public function setConsejo($consejo)
    {
        $this->consejo = $consejo;
    }

    public function getConsejo()
    {
        return $this->consejo;
    }

    public function setCodFormulario($codFormulario)
    {
        $this->codFormulario = $codFormulario;
    }

    public function getCodFormulario()
    {
        return $this->codFormulario;
    }

    public function grabar()
    {
        //include("conexion.php");
        $db = new Conexion();

        $sql = $db->prepare("INSERT INTO llena (ci_usuario, consejo, codFormulario) VALUES (?, ?, ?)"); // Reemplaza "tu_tabla" con el nombre de tu tabla

        $sql->bind_param("sss", $this->ci_usuario, $this->consejo, $this->codFormulario);

        $result = $sql->execute();

        
    }


    public function obtenerCI()
    {
        $db = new Conexion();

        $sql = $db->prepare("SELECT ci_usuario FROM llena WHERE codFormulario = ?"); // Reemplaza "tu_tabla" con el nombre de tu tabla

        if ($sql) {
            $sql->bind_param("s", $this->codFormulario);
            if ($sql->execute()) {
                $resultado = $sql->get_result();
                if ($resultado->num_rows === 1) {
                    $row = $resultado->fetch_assoc();
                    return $row['ci_usuario'];
                }
            }
        }

        return null;
    }
    public function obtenerRes()
{
    $db = new Conexion();

    $sql = $db->prepare("SELECT consejo, COUNT(*) as total FROM llena GROUP BY consejo"); // Reemplaza "tu_tabla" con el nombre de tu tabla

    $resultados = [];

    if ($sql) {
        if ($sql->execute()) {
            $resultado = $sql->get_result();

            while ($row = $resultado->fetch_assoc()) {
                $resultados[] = [
                    'consejo' => $row['consejo'],
                    'total' => $row['total']
                ];
            }
        }
    }

    return $resultados;
}

    public function elimina()
    {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM llena WHERE codFormulario='$this->codFormulario'"); // Reemplaza "tu_tabla" con el nombre de tu tabla
        return ($sql);
    }

    public function modifica()
    {
        $db = new Conexion();
        $sql = $db->prepare("UPDATE llena SET consejo = ? WHERE ci_usuario = ? and codFormulario=?"); // Reemplaza "tu_tabla" con el nombre de tu tabla
        $sql->bind_param("sss", $this->consejo, $this->ci_usuario, $this->codFormulario);
        $result = $sql->execute();

        if ($result)
            return true;
        else
            return false;
    }
}

?>
