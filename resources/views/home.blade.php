@extends('layouts.admin')
@section('title','Panel administrador')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }
    .custom-table {
        overflow: auto;
    }
</style>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Panel administrador
        </h3>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card  text-white bg-info">

                <div class="card-body pb-0">

                    <div class="float-right">
                        <i class="fas fa-shopping-cart fa-4x"></i>
                    </div>
                    <div class="text-value h4"><strong>${{number_format($totalVentas)}} (Total Ventas)</strong>
                    </div>
                </div>
                <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                    <a href="{{route('sales.index')}}" class="small-box-footer h4">Ventas <i class="fa fa-arrow-circle-right"></i></a>
                </div>

            </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-gift"></i>
                        Ventas diarias
                    </h4>
                    <canvas id="ventas_diarias" height="100"></canvas>
                    <div id="orders-chart-legend" class="orders-chart-legend"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-envelope"></i>
                        Mis Servicios
                    </h4>
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th>Costo</th>
                                    <th>Fecha de creación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                <tr>
                                    <td>{{$service->nom_servicio}}</td>
                                    <td>{{$service->id}}</td>
                                    <td>$ {{number_format($service->cost_servicio)}}</td>
                                    <td>{{$service->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/chart.js') !!}

<script>
    var varVenta = document.getElementById('ventas_diarias').getContext('2d');
    var charVenta = new Chart(varVenta, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($ventasdia as $ventadia) {
                            $dia = $ventadia->dia;
                            $mes = $ventadia->mes;
                            $anio = $ventadia->anio;

                            echo '"' . $dia . "-" . $mes . "-" . $anio . '",';
                        } ?>],
            datasets: [{
                label: 'Ventas',
                data: [<?php foreach ($ventasdia as $reg) {
                            echo '' . $reg->total . ',';
                        } ?>],
                backgroundColor: 'rgba(20, 204, 20, 1)',
                borderColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

@endsection