<?php
class Evento{
    private $codEvento;
    private $tipo;
    private $fecha;
    private $titulo;
    private $descripcion;
    private $tipoViolencia;
    private $horaInicio;
    private $horaFinal;
    private $modalidad;
    private $detalleEvento;
    private $expositor;
    private $fechaSubida;
    private $rutaDirectorio;
    public function __construct($codEvento, $tipo, $fecha, $titulo, $descripcion, $tipoViolencia, $horaInicio, $horaFinal, $modalidad, $detalleEvento, $expositor, $fechaSubida, $rutaDirectorio){
        $this->setCodEvento($codEvento);
        $this->setTipo($tipo);
        $this->setFecha($fecha);
        $this->setTitulo($titulo);
        $this->setDescripcion($descripcion);
        $this->setTipoViolencia($tipoViolencia); 
        $this->setHoraInicio($horaInicio);
        $this->setHoraFinal($horaFinal);
        $this->setModalidad($modalidad);
        $this->setDetalleEvento($detalleEvento);
        $this->setExpositor($expositor);
        $this->setFechaSubida($fechaSubida);
        $this->setRutaDirectorio($rutaDirectorio);
    }
    
    public function lista(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM evento");
        return ($sql);
    }public function lista_especifica(){
        //include("conexion.php");
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM evento where codEvento=$this->codEvento");
        return ($sql);
    }
    public function setCodEvento($codEvento){
        $this->codEvento=$codEvento;
    }
    public function getCodEvento(){
        return $this->codEvento;
    }
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setTipoViolencia($tipoViolencia){
        $this->tipoViolencia = $tipoViolencia;
    }

    public function getTipoViolencia(){
        return $this->tipoViolencia;
    }

    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setdescripcion($descripcion){
        $this->descripcion=$descripcion;
    }
    public function getdescripcion(){
        return $this->descripcion;
    }
    
    public function setRutaDirectorio($rutaDirectorio){
        $this->rutaDirectorio=$rutaDirectorio;
    }
    public function setHoraInicio($horaInicio){
        $this->horaInicio = $horaInicio;
    }

    public function getHoraInicio(){
        return $this->horaInicio;
    }

    public function setHoraFinal($horaFinal){
        $this->horaFinal = $horaFinal;
    }

    public function getHoraFinal(){
        return $this->horaFinal;
    }

    public function setModalidad($modalidad){
        $this->modalidad = $modalidad;
    }

    public function getModalidad(){
        return $this->modalidad;
    }

    public function setDetalleEvento($detalleEvento){
        $this->detalleEvento = $detalleEvento;
    }

    public function getDetalleEvento(){
        return $this->detalleEvento;
    }

    public function setExpositor($expositor){
        $this->expositor = $expositor;
    }

    public function getExpositor(){
        return $this->expositor;
    }

    public function setFechaSubida($fechaSubida){
        $this->fechaSubida = $fechaSubida;
    }

    public function getFechaSubida(){
        return $this->fechaSubida;
    }


    /*public function grabarLey_Normativa(){
        include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("INSERT INTO ley_normativa (nombre, fecha_promulgacion, tematica) VALUES ('$this->nombre', '$this->fecha_promulgacion', '$this->tematica')");
        return ($sql);
    }*/
    //para evitar inyecciones sql
    public function grabarEvento() {
        //include("conexion.php");
        $db = new Conexion();

        // Utilizar sentencias preparadas para evitar inyección SQL
        $stmt = $db->prepare("INSERT INTO evento (tipo, fecha, titulo, descripcion, tipoViolencia, horaInicio, horaFinal, modalidad, detalleEvento, expositor, fechaSubida, rutaDirectorio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Vincular los parámetros
        $stmt->bind_param("ssssssssssss", $this->tipo, $this->fecha, $this->titulo, $this->descripcion, $this->tipoViolencia, $this->horaInicio, $this->horaFinal, $this->modalidad, $this->detalleEvento, $this->expositor, $this->fechaSubida, $this->rutaDirectorio);

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
        $sql=$db->query("DELETE FROM evento WHERE codEvento='$this->codEvento'");
        return ($sql);
    }
    public function modifica(){
        //include("conexion.php");
        $db = new Conexion();
        $sql = $db->prepare("UPDATE evento SET tipo = ?, fecha = ?, titulo = ?, descripcion = ?, tipoViolencia = ?, horaInicio = ?, horaFinal = ?, modalidad = ?, detalleEvento = ?, expositor = ?, rutaDirectorio = ? WHERE codEvento = ?"); 
        
        // Vincular los parámetros
        $sql->bind_param("sssssssssssi", $this->tipo, $this->fecha, $this->titulo, $this->descripcion, $this->tipoViolencia, $this->horaInicio, $this->horaFinal, $this->modalidad, $this->detalleEvento, $this->expositor, $this->rutaDirectorio, $this->codEvento);
        
        $result = $sql->execute();
        
        // Verificar si la actualización fue exitosa
        if ($result) {
            return true; // Éxito
        } else {
            return false; // Fallo al actualizar
        }
    }
    public function fullCalendar(){
        //include("conexion.php");
        $conexion = mysqli_connect("localhost","root","","bdcontraviolencia");
        $sql = "SELECT 
                codEvento AS id,
                titulo AS title,
                horaInicio AS start,
                horaFinal AS end
            FROM
                evento";

        $respuesta = mysqli_query($conexion, $sql);
        $eventos = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);

        // retorna um array JSON com os eventos
        echo json_encode($eventos);
    }

    public function filtrarTipoViolencia($tipoViolencia){
        $db = new Conexion();
        $stmt = $db->prepare("SELECT * FROM evento WHERE tipoViolencia LIKE ?");
        $param = "%$tipoViolencia%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    public function filtrarFecha($fecha){
        $db = new Conexion();
        $stmt = $db->prepare("SELECT * FROM evento WHERE fecha LIKE ?");
        $param = "%$fecha%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

}
?>