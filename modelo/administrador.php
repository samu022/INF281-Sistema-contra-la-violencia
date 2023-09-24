<?php
class Administrador
{
    private $ci;
    private $nombre_usuario;
    private $contrasenia;
    private $correo;
    private $rol;

    public function __construct($ci, $nombre_usuario, $contrasenia, $correo, $rol)
    {
        $this->setCi($ci);   
        $this->setNombreUsuario($nombre_usuario);
        $this->setContrasenia($contrasenia);
        $this->setCorreo($correo);
        $this->setrol($rol);
    }

    public function lista()
    {
        include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM administrador");
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

    public function setrol($rol)
    {
        $this->rol = $rol;
    }
    
    
    public function grabarAdministrador()
    {
        //include("conexion.php");
        $db = new Conexion();
        
        $sql = $db->prepare("INSERT INTO administrador VALUES (?, ?, ?, ?, ?)"); 
        
        $sql->bind_param("sssss", $this->ci, $this->nombre_usuario, $this->contrasenia, $this->correo, $this->rol);

        $result = $sql->execute();

        if($result)
            return true;
        else
            return false;
    }
    public function obtenerCI(){
        $db = new Conexion();
        
        $sql = $db->prepare("SELECT ci FROM administrador WHERE nombre_usuario = ?");
        
        if ($sql) {
            $sql->bind_param("s", $this->nombre_usuario);
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
        $sql = $db->query("DELETE FROM administrador WHERE ci='$this->ci'");
        return ($sql);
    }

    public function modifica()
    {
        $db = new Conexion();
        $sql = $db->prepare("UPDATE administrador SET nombre_usuario = ?, contrasenia = ?, correo = ?, rol = ? WHERE ci = ?");
        $sql->bind_param("ssssi", $this->nombre_usuario, $this->contrasenia, $this->correo, $this->rol, $this->ci);
        $result = $sql->execute();

        if($result)
            return true;
        else
            return false;
    }

    public function lista_especifica(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM administrador where ci='$this->ci'");
        return ($sql);
    }

    public function check_exists(){
        
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM administrador where nombre_usuario='$this->nombre_usuario' AND contrasenia='$this->contrasenia'");
        return $sql->num_rows != 0;
    }

    public function getroles()
    {
        $db=new Conexion();
        $sql=$db->query("SELECT tipoRol FROM rol where ci='$this->ci'");
        //quiero la posicion primera de fetch assoc
        return $sql->fetch_assoc()['tipoRol'];
    }

}
?>
