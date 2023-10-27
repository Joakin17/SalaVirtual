<div class="text-center pt-2 px-3 d-flex justify-content-around">
      <a class="btn btn-secondary col-2" href="/estadisticasalaspace?year={{date('Y')}}">Anual</a>
      <a class="btn btn-secondary col-2" href="/estasalaspacemensual?month={{date('n')}}&year={{date('Y')}}">Mensual</a>
      <a class="btn btn-secondary col-2" href="/estasalaspacerango?inicio={{date('Y').'-01-01'}}&fin={{date('Y-m-d')}}">Rangos de Fechas</a>
      <a class="btn btn-secondary col-2" href="/estasalasspacegenero?inicio={{date('Y').'-01-01'}}&fin={{date('Y-m-d')}}">Género</a>
</div>