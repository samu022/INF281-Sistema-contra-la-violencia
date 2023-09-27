<?php
    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

    include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    //include("../modelo/conexion.php");
    //incluimos modelo
    include("../modelo/EventoClase.php");
    $car=new Evento("","","","","","","","","","","","","");
    $res=$car->lista();
    include("../vista/Eventos/EventoLista.php");
    include("../vista/dashboard_admin/footer.php");
?>
