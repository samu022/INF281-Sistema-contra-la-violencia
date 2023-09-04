<?php
    //incluimos modelo
    include("../modelo/Ley_NormativaClase.php");
    $car=new Ley_Normativa("","","","","");
    $res=$car->lista();
    include("../vista/LeyLista.php");
?>