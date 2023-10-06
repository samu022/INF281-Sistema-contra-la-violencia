<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mi Calendario</title>
	<link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>

<?php
  include("../../modelo/conexion.php");
  $conexion = new Conexion();
  $SqlEventos   = ("SELECT * FROM evento");
  $resulEventos = $conexion->query($SqlEventos);
?>
<div class="mt-5"></div>

<div class="container">
  <div class="row">
    <div class="col msjs">
      <?php
        include('msjs.php');
      ?>
    </div>
  </div>

<div class="row">
  <div class="col-md-12 mb-3">
  <h3 class="text-center" id="title">Calendario de los eventos</h3>
  </div>
</div>
</div>



<div id="calendar"></div>


<?php  
  //include('modalNuevoEvento.php');
  include('modalUpdateEvento.php');
?>



<script src ="js/jquery-3.0.0.min.js"> </script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/moment.min.js"></script>	
<script type="text/javascript" src="js/fullcalendar.min.js"></script>
<script src='locales/es.js'></script>

<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },

    locale: 'es',

    defaultView: "month",
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,

//Nuevo Evento
  select: function(start, end){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
       
      var valorFechaFin = end.format("DD-MM-YYYY");
      var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
      $('input[name=fecha_fin').val(F_final);  

    },
      
    events: [
      <?php
       while($dataEvento = mysqli_fetch_array($resulEventos)){ ?>
          {
          _id: '<?php echo $dataEvento['codEvento']; ?>',
          title: '<?php echo $dataEvento['titulo']; ?>',
          start: '<?php echo $dataEvento['fecha']; ?>',
          horaInicio:   '<?php echo $dataEvento['horaInicio']; ?>',
          horaFinal:   '<?php echo $dataEvento['horaFinal']; ?>',
          color: '<?php echo $dataEvento['horaFinal']; ?>'
          },
        <?php } ?>
    ],


//Eliminar Evento
eventRender: function(event, element) {
    element
      .find(".fc-content")
      .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
    
    //Eliminar evento
    element.find(".closeon").on("click", function() {

  var pregunta = confirm("Deseas Borrar este Evento?");   
  if (pregunta) {

    $("#calendar").fullCalendar("removeEvents", event._id);

     $.ajax({
            type: "POST",
            url: 'deleteEvento.php',
            data: {id:event._id},
            success: function(datos)
            {
              $(".alert-danger").show();

              setTimeout(function () {
                $(".alert-danger").slideUp(500);
              }, 3000); 

            }
        });
      }
    });
  },


//Moviendo Evento Drag - Drop
eventDrop: function (event, delta) {
    var codEvento = event._id;
    var start = event.start.format('YYYY-MM-DD'); // Formatea la fecha al formato de MySQL

    $.ajax({
        url: 'drag_drop_evento.php',
        data: { codEvento: codEvento, fecha: start },
        type: "POST",
        success: function (response) {
            // Manejar la respuesta si es necesario
            // $("#respuesta").html(response);
        }
    });
},


//Modificar Evento del Calendario 
eventClick:function(event){
    var codEvento = event._id;
    $('input[name=codEvento').val(codEvento);
    $('input[name=titulo').val(event.title);
    $('input[name=fecha').val(event.start.format('DD-MM-YYYY'));
    $('input[name=horaInicio').val(event.horaInicio);
    $('input[name=horaFinal').val(event.horaFinal);
    $("#modalUpdateEvento").modal();
  },


  });


//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});

</script>


<!--------- WEB DEVELOPER ------>
<!--------- URIAN VIERA   ----------->
<!--------- PORTAFOLIO:  https://blogangular-c7858.web.app  -------->

<button type="button" class="btn btn-success" onclick="window.location.href='../../controlador/eventoLista.php'">Volver</button>
</body>
</html>
