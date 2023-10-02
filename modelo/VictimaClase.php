<?php
class Victima{
    private $ci;
    private $relacion_perpetrador;
    private $codDenuncia;


    public function __construct($ci, $relacion_perpetrador, $codDenuncia){
        $this->setCi($ci);
        $this->setRelacion_Perpetrador($relacion_perpetrador);
        $this->setCodDenuncia($codDenuncia);

    }
    public function lista(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM victima");
        return ($sql);
    }public function lista_especifica(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM victima where ci=$this->ci");
        return ($sql);
    }
    public function lista_especifica_denuncia(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM victima where codDenuncia=$this->codDenuncia");
        return ($sql);
    }
    public function setCi($ci){
        $this->ci=$ci;
    }
    public function getCi(){
        return $this->ci;
    }
    public function setRelacion_perpetrador($relacion_perpetrador){
        $this->relacion_perpetrador=$relacion_perpetrador;
    }
    public function getRelacion_perpetrador(){
        return $this->relacion_perpetrador;
    }
    public function setCodDenuncia($codDenuncia){
        $this->codDenuncia=$codDenuncia;
    }
    public function getCodDenuncia(){
        return $this->codDenuncia;
    }
  
   

    //para evitar inyecciones sql
    public function grabarVictima() {
        //include("conexion.php");
        $db = new Conexion();
    
        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO victima (ci, relacion_perpetrador, codDenuncia) VALUES (?, ?, ?)");

        
        // Vincular los parámetros
        $stmt->bind_param("isi", $this->ci, $this->relacion_perpetrador, $this->codDenuncia);
    
        // Ejecutar la sentencia
        $result = $stmt->execute();
    
        // Verificar si la consulta se realizó con éxito
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al insertar
        }
    }
    
        
    public function elimina(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("DELETE FROM victima WHERE ci='$this->ci'");
        return ($sql);
    }
    public function elimina_denuncia(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("DELETE FROM victima WHERE codDenuncia='$this->codDenuncia'");
        return ($sql);
    }
    public function elimina_victima_con_persona(){
        $db = new Conexion();
        
        // Iniciar una transacción
        $db->begin_transaction();
    
        // Obtener los CI de las víctimas para la denuncia
        $sql_get_ci = "SELECT ci FROM victima WHERE codDenuncia='$this->codDenuncia'";
        $result = $db->query($sql_get_ci);
        
        // Almacenar los CI en un array
        $ci_array = [];
        while ($row = $result->fetch_assoc()) {
            $ci_array[] = $row['ci'];
        }
        
        // Eliminar registros de la tabla 'victima' para la denuncia
        $sql_victima = "DELETE FROM victima WHERE codDenuncia='$this->codDenuncia'";
        if ($db->query($sql_victima)) {
            // Eliminar registros de la tabla 'persona' donde 'ci' coincide con los CI de las víctimas
            $ci_list = implode(',', $ci_array); // Convertir el array de CI en una lista separada por comas
            $sql_persona = "DELETE FROM persona WHERE ci IN ($ci_list)";
            if ($db->query($sql_persona)) {
                // Si ambas eliminaciones son exitosas, confirmar la transacción
                $db->commit();
                return true;
            } else {
                // Si falla la eliminación de 'persona', revertir la transacción
                $db->rollback();
                return false;
            }
        } else {
            // Si falla la eliminación de 'victima', revertir la transacción
            $db->rollback();
            return false;
        }
    }
    
    public function modifica(){
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE victima SET relacion_perpetrador = ?, codDenuncia = ? WHERE ci= ?"); 
        // Vincular los parámetros
        $sql->bind_param("sii", $this->relacion_perpetrador, $this->codDenuncia,$this->ci);
        $result = $sql->execute();
        
        // Verificar si la actualización fue exitosa
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al actualizar
        }
    }
    public function edades(){
        $db = new Conexion();
        $sql = $db->query("SELECT
            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fechaNaci, CURDATE()) < 18 THEN 1 ELSE 0 END) AS Menores18,
            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fechaNaci, CURDATE()) BETWEEN 18 AND 30 THEN 1 ELSE 0 END) AS De18a30,
            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fechaNaci, CURDATE()) BETWEEN 31 AND 45 THEN 1 ELSE 0 END) AS De31a45,
            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, fechaNaci, CURDATE()) > 45 THEN 1 ELSE 0 END) AS Mayores45
        FROM persona
        INNER JOIN victima ON persona.ci = victima.ci");
     
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

}
?>