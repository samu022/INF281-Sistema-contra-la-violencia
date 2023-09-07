<?php
class Administrador
{
    private $ci;
    private $nombre_usuario;
    private $contrasenia;
    private $correo;
    private $privilegios;

    public function __construct($ci, $nombre_usuario, $contrasenia, $correo, $privilegios)
    {
        $this->setCi($ci);   
        $this->setNombreUsuario($nombre_usuario);
        $this->setContrasenia($contrasenia);
        $this->setCorreo($correo);
        $this->setPrivilegios($privilegios);
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
        $this->contrasenia = $contrasenia;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function setPrivilegios($privilegios)
    {
        $this->privilegios = $privilegios;
    }
    
    public function grabarAdministrador()
    {
        include("conexion.php");
        $db = new Conexion();

        $sql = $db->prepare("INSERT INTO administrador VALUES (?, ?, ?, ?, ?)"); 

        $sql->bind_param("sssss", $this->ci, $this->nombre_usuario, $this->contrasenia, $this->correo, $this->privilegios);

        $result = $sql->execute();

        if($result)
            return true;
        else
            return false;
    }

    public function elimina()
    {
        include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM administrador WHERE ci='$this->ci'");
        return ($sql);
    }

    public function modifica()
    {
        $db = new Conexion();
        $sql = $db->prepare("UPDATE administrador SET nombre_usuario = ?, contrasenia = ?, correo = ?, privilegios = ? WHERE ci = ?");
        $sql->bind_param("ssssi", $this->nombre_usuario, $this->contrasenia, $this->correo, $this->privilegios, $this->ci);
        $result = $sql->execute();

        if($result)
            return true;
        else
            return false;
    }

}
?>