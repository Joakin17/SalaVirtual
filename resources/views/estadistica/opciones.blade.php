<div class="text-center pt-2 px-3 d-flex justify-content-around">
      <a class="btn btn-secondary col-2" href="/estadisticacompus?year={{date('Y')}}">Anual</a>
      <a class="btn btn-secondary col-2" href="/estacompusmensual?month={{date('n')}}&year={{date('Y')}}">Mensual</a>
      <a class="btn btn-secondary col-2" href="/estacompusrango?inicio={{date('Y').'-01-01'}}&fin={{date('Y-m-d')}}">Rangos de Fechas</a>
      <a class="btn btn-secondary col-2" href="/estacompusgenero?inicio={{date('Y').'-01-01'}}&fin={{date('Y-m-d')}}">Género</a>
</div>