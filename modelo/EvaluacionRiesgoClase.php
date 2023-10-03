<?php
class EvaluacionRiesgo
{
    private $codFormulario;
    private $url_cuestionario;
    private $ci;
   

    public function __construct($codFormulario, $url_cuestionario, $ci)
    {
        $this->setCodFormulario($codFormulario);   
        $this->setURL($url_cuestionario);
        $this->setCi($ci);
        
    }

    public function lista()
    {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM evaluacion_riesgo");
        return ($sql);
    }

    public function setCi($ci)
    {
        $this->ci = $ci;
    }  

    public function setCodFormulario($codFormulario)
    {
        $this->codFormulario = $codFormulario;
    }

    public function setURL($url_cuestionario)
    {
        $this->url_cuestionario = md5($url_cuestionario);
    }

    

    
    public function grabarFormulario()
    {
        //include("conexion.php");
        $db = new Conexion();
        
        $sql = $db->prepare("INSERT INTO evaluacion_riesgo VALUES (?, ?, ?)"); 
        
        $sql->bind_param("sss", $this->codFormulario, $this->url_cuestionario, $this->ci);

        $result = $sql->execute();

        if($result)
            return true;
        else
            return false;
    }
    public function obtenerCI(){
        $db = new Conexion();
        
        $sql = $db->prepare("SELECT ci FROM evaluacion_riesgo WHERE codFormulario = ?");
        
        if ($sql) {
            $sql->bind_param("s", $this->codFormulario);
            if ($sql->execute()) {
                $resultado = $sql->get_result();
                if ($resultado->num_rows === 1) {
                    $row = $resultado->fetch_assoc();
                    return $row['ci']; // Devuelve el valor de 'ci_usuario'
                }
            }
        }
        
        return null; // Retorna null si no se encontraron resultados o hubo un error
    }
   
    public function elimina()
    {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM evaluacion_riesgo WHERE codFormulario='$this->codFormulario'");
        return ($sql);
    }

    public function modifica()
    {
        $db = new Conexion();
        $sql = $db->prepare("UPDATE evaluacion_riesgo SET url_cuestionario = ? WHERE ci = ? and codFormulario=?");
        $sql->bind_param("sss", $this->url_cuestionario, $this->ci, $this->codFormulario);
        $result = $sql->execute();

        if($result)
            return true;
        else
            return false;
    }

   

}
?>
