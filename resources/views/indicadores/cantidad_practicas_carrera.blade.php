@extends('layouts.app')

@section('script_cabecera')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Indicadores de Gestión</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Cantidad de prácticas por carrera</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cantidad de practicantes por carrera</h3>
              </div>

              <div class="card-body">
                <div class="row">
                    <form class="form-inline" action="{{url('cantidad-practicas-por-carrera')}}" method="get">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">


                      <div class="form-group">
                          <label for="email">Fecha Inicio:</label>
                          <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" autocomplete="off" value="{{$fecha_inicio}}" required="required">
                      </div>
                      
                      <div class="form-group">
                          <label for="email">Fecha Fin:</label>
                          <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" autocomplete="off" value="{{$fecha_fin}}" required="required">
                      </div>
                    
                      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
                  </form>
                </div>
                <div class="row">
                  <div id="container" style="height: 400px; width: 100%; margin: 0 auto;margin-top: 30px;"></div>
                </div>
               
              </div>

            </div>

          </div>

        </div>
        
      </div>
    </section>
  </div>


@endsection

@section('script_pie')
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
  $(document).ready(function() 
    {
      Highcharts.chart('container', {
        chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
        },
        title: {
          text: 'CANTIDAD DE PRACTICANTES POR CARRERA'
        },
        tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: false
            },
            showInLegend: true
          }
        },
        series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [
          @foreach($registros as $registro)
          {
            name: '{{$registro->car_nombre}}({{$registro->numero_carreras}})',
            y: {{$registro->numero_carreras}},
            
          },
          @endforeach
          ]
        }]
      });
  });
</script>
@endsection