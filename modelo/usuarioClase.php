<?php
class Usuario
{
    private $ci;
    private $nombre_usuario;
    private $contrasenia;
    private $correo;

    public function __construct($ci, $nombre_usuario, $contrasenia, $correo)
    {
        $this->setCi($ci);   
        $this->setNombreUsuario($nombre_usuario);
        $this->setContrasenia($contrasenia);
        $this->setCorreo($correo);
    }

    public function lista()
    {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM usuario");
        return ($sql);
    }

    public function setCi($ci)
    {
        $this->ci = $ci;
    }  

    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = md5($contrasenia);
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function obtenerCI(){
        $db = new Conexion();
        
        $sql = $db->prepare("SELECT ci_usuario FROM usuario WHERE nombre_usuario = ?");
        
        if ($sql) {
            $sql->bind_param("s", $this->nombre_usuario);
            if ($sql->execute()) {
                $resultado = $sql->get_result();
                if ($resultado->num_rows === 1) {
                    $row = $resultado->fetch_assoc();
                    return $row['ci_usuario']; // Devuelve el valor de 'ci_usuario'
                }
            }
        }
        
        return null; // Retorna null si no se encontraron resultados o hubo un error
    }
    
    public function grabarUsuario()
    {
        //include("conexion.php");
        $db = new Conexion();
        
        $sql = $db->prepare("INSERT INTO usuario VALUES (?, ?, ?, ?)"); 
        
        $sql->bind_param("ssss", $this->ci, $this->nombre_usuario, $this->contrasenia, $this->correo);

        $result = $sql->execute();

        if($result)
            return true;
        else
            return false;
    }

    public function elimina()
    {
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM usuario WHERE ci_usuario='$this->ci'");
        return ($sql);
    }

    public function modifica()
    {
        $db = new Conexion();
        $sql = $db->prepare("UPDATE usuario SET nombre_usuario = ?, contrasenia = ?, correo = ?WHERE ci_usuario = ?");
        $sql->bind_param("ssssi", $this->nombre_usuario, $this->contrasenia, $this->correo, $this->ci);
        $result = $sql->execute();

        if($result)
            return true;
        else
            return false;
    }

    public function lista_especifica(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM usuario where ci='$this->ci'");
        return ($sql);
    }

    public function check_exists(){
        //print($this->nombre_usuario);
        //print($this->contrasenia);
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM usuario where nombre_usuario='$this->nombre_usuario' AND contrasenia='$this->contrasenia'");
        return $sql->num_rows != 0;
    }

}
?>
