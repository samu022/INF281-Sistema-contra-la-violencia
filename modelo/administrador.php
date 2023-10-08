<?php
class Administrador
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
        $this->contrasenia = hash('sha256', $contrasenia);
    }

    public function setContrasenia_prev_hashed($password_hashed)
    {
        $this->contrasenia = $password_hashed;
    }


    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    
    public function grabarAdministrador()
    {
        //include("conexion.php");
        $db = new Conexion();
        
        $sql = $db->prepare("INSERT INTO administrador VALUES (?, ?, ?, ?)"); 
        
        $sql->bind_param("ssss", $this->ci, $this->nombre_usuario, $this->contrasenia, $this->correo);

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
    public function obtenerCIRandom() {
        $db = new Conexion();
    
        // Obtén una cantidad total de registros en la tabla
        $totalRegistros = $db->query("SELECT COUNT(*) AS total FROM administrador");
        
        if ($totalRegistros) {
            $filaTotal = $totalRegistros->fetch_assoc();
            $total = $filaTotal['total'];
            
            if ($total > 0) {
                // Genera un número de fila aleatorio
                $filaAleatoria = mt_rand(0, $total - 1);
                
                // Obtén un registro aleatorio de la tabla
                $sql = $db->prepare("SELECT ci FROM administrador LIMIT ?, 1");
                
                if ($sql) {
                    $sql->bind_param("i", $filaAleatoria);
                    if ($sql->execute()) {
                        $resultado = $sql->get_result();
                        if ($resultado->num_rows === 1) {
                            $row = $resultado->fetch_assoc();
                            return $row['ci']; // Devuelve el valor de 'ci'
                        }
                    }
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
        $sql = $db->prepare("UPDATE administrador SET nombre_usuario = ?, contrasenia = ?, correo = ? WHERE ci = ?");
        $sql->bind_param("sssi", $this->nombre_usuario, $this->contrasenia, $this->correo,  $this->ci);
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
    public function check_exists_basico(){
        
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM administrador where nombre_usuario='$this->nombre_usuario'");
        return $sql->num_rows != 0;
    }

    public function getRoles()
    {
        $db = new Conexion();
        $sql=$db->query("SELECT idRol, nombreRol FROM rol");
        return ($sql);
    }

    public function getRolesUser()
    {
        $db=new Conexion();
        $sql=$db->query("SELECT y.idRol, y.nombreRol FROM rol as y, tiene_rol as x where x.ci='$this->ci' AND x.idRol=y.idRol");
        return ($sql);
    }

    public function setRol($nuevo_rol)
    {
        $db = new Conexion();
        
        $sql = $db->prepare("INSERT INTO tiene_rol VALUES (?, ?)"); 
        
        $sql->bind_param("ss", $this->ci, $nuevo_rol);

        $result = $sql->execute();

        if($result)
            return true;
        else
            return false;        
    }

    public function delete_all_roles()
    {
        $db = new Conexion();
        $sql = $db->query("DELETE FROM tiene_rol WHERE ci='$this->ci'");
        return ($sql);
    }

    public function check_role($name_role)
    {
        $db = new Conexion();
        $sql=$db->query("SELECT 1 FROM tiene_rol as x, rol as y WHERE x.ci='$this->ci' AND x.idRol=y.idRol AND y.nombreRol = '$name_role'");
        return $sql->num_rows != 0;
    }

}
?>
