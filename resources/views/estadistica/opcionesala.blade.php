<div class="text-center pt-2 px-3 d-flex justify-content-around">
      <a class="btn btn-secondary col-2" href="/estadisticasalas?year={{date('Y')}}">Anual</a>
      <a class="btn btn-secondary col-2" href="/estasalasmensual?month={{date('n')}}&year={{date('Y')}}">Mensual</a>
      <a class="btn btn-secondary col-2" href="/estasalasrango?inicio={{date('Y').'-01-01'}}&fin={{date('Y-m-d')}}">Rangos de Fechas</a>
      <a class="btn btn-secondary col-2" href="/estasalasgenero?inicio={{date('Y').'-01-01'}}&fin={{date('Y-m-d')}}">Género</a>
</div>