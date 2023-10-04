<?php
class Usuario
{
    private $ci;
    private $nombre_usuario;
    private $contrasenia;
    private $contrasenia_app;
    private $correo;

    public function __construct($ci, $nombre_usuario, $contrasenia, $correo,$contrasenia_app)
    {
        $this->setCi($ci);   
        $this->setNombreUsuario($nombre_usuario);
        $this->setContrasenia($contrasenia);
        $this->setContraseniaApp($contrasenia_app);
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

        public function setContraseniaApp($contraseniaApp)
    {
        $this->contraseniaApp =  $contraseniaApp;
    }

    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = hash('sha256', $contrasenia);
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
        
        $sql = $db->prepare("INSERT INTO usuario VALUES (?, ?, ?, ?,?)"); 
        
        $sql->bind_param("sssss", $this->ci, $this->nombre_usuario, $this->contrasenia,  $this->contrasenia_app, $this->correo);

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
        $sql=$db->query("SELECT * FROM usuario where ci_usuario='$this->ci'");
        return ($sql);
    }
    public function cuenta(){
        $db = new Conexion();
        $sql = $db->query("SELECT COUNT(*) as count FROM usuario"); // Usa "as count" para dar un alias al resultado
        $result = $sql->fetch_assoc(); // Obtiene el resultado como un array asociativo
        return $result['count']; // Devuelve el valor de la columna "count"
    }
    public function edades(){
        $db = new Conexion();
        $sql = $db->query("SELECT
            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fechaNaci, CURDATE()) < 18 THEN 1 ELSE 0 END) AS Menores18,
            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fechaNaci, CURDATE()) BETWEEN 18 AND 30 THEN 1 ELSE 0 END) AS De18a30,
            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fechaNaci, CURDATE()) BETWEEN 31 AND 45 THEN 1 ELSE 0 END) AS De31a45,
            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fechaNaci, CURDATE()) > 45 THEN 1 ELSE 0 END) AS Mayores45
        FROM persona
        INNER JOIN usuario ON persona.ci = usuario.ci_usuario");
     
        if ($sql) {
            $result = $sql->fetch_assoc(); // Obtiene el resultado como un array asociativo
            // Crear un nuevo arreglo asociativo con nombres de claves más descriptivos
            $edadesArray = array(
                'Menores18' => $result['Menores18'],
                'De18a30' => $result['De18a30'],
                'De31a45' => $result['De31a45'],
                'Mayores45' => $result['Mayores45']
            );
    
            // Convierte el arreglo a una cadena JSON y la devuelve
            return json_encode($edadesArray);
        } else {
            // Manejo de error si la consulta no se ejecuta correctamente
            return null;
        }
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
