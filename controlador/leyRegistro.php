<?php
   
    include("../vista/leyRegistro.php");
    if(isset($_POST['RegistrarLey'])){
        $nom=$_POST['nom'];
        $fecha_prom=$_POST['fechaPromulgacion'];
        $tem=$_POST['tem'];
        $inf=$_POST['ref'];
        include("../modelo/Ley_NormativaClase.php");
        $carg=new Ley_Normativa("",$nom,$fecha_prom,$tem,$inf);
        $res=$carg->grabarLey_Normativa();
        if($res){
            echo "<script>
                    alert('se Registro correctamente');
                    
                    </script>";
        }else{
            echo "No se registro";
        }
    }
?>
