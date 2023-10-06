
<div class="modal" id="modalUpdateEvento" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Actualizar el evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="formEventoUpdate" id="formEventoUpdate" action="UpdateEvento.php" class="form-horizontal" method="POST">
        <input type="hidden" class="form-control" name="codEvento" id="codEvento">
        <div class="form-group">
          <label for="titulo" class="col-sm-12 control-label">Nombre del Evento</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Nombre del Evento" required/>
          </div>
        </div>
        <div class="form-group">
          <label for="fecha" class="col-sm-12 control-label">Fecha del evento</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha del evento">
          </div>
        </div>
        <div class="form-group">
          <label for="horaInicio" class="col-sm-12 control-label">Hora Inicio</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="horaInicio" id="horaInicio" placeholder="Hora inicio">
          </div>
        </div>
        <div class="form-group">
          <label for="horaFinal" class="col-sm-12 control-label">Hora Final</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="horaFinal" id="horaFinal" placeholder="Hora final">
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar Cambios de mi Evento</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        </div>
      </form>
    </div>
  </div>
</div>
