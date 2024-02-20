@extends('layouts.admin')
@section('title','Nueva venta')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Nueva venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/home">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sales.index') }}">ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nueva venta</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">registrar nueva venta</h4>

                    </div>
                    {!! Form::open(['route'=>'sales.store', 'method'=>'POST']) !!}
                    @include('admin.sale._form')

                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary mr-2 ">Guardar</button>
                    <a href="{{route('sales.index') }}" class="btn btn-light mr-2">
                        cancelar
                    </a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! Html::script('melody/js/alerts.js') !!}
{!! Html::script('melody/js/avgrund.js') !!}



<script>
    $(document).ready(function() {
        $("#agregar").click(function() {
            agregar();
        });
    });
    var clientSelect = $('#client_id');
    var mascotaSelect = $('#mascota_id');
    var servicioSelect = $('#servicio_id');
    var cont = 1;
    total = 0;
    subtotal = [];
    console.log();
    $("#guardar").hide();
    $("#cliente_id").change(mostrarValoresMascota);
    $("#mascota_id").change(mostrarValoresServicio);
    $("#servicio_id").change(mostrarValores);

    function mostrarValoresMascota() {
        mascotaSelect.val("");
        servicioSelect.val("");
        $('.mascota_id').removeAttr('hidden');
        var selectedClientId = $(this).val();
        mascotaSelect.children('option:not(:first)').remove();
        @foreach($pets as $key => $pet)
        if (selectedClientId === '{{$pet->cliente_id}}') {
            var option = $('<option></option>').val('{{$pet->_id}}').text('{{$pet->nom_mascota}}');
            mascotaSelect.append(option);
        }
        @endforeach
    }

    function mostrarValoresServicio() {
        servicioSelect.val("");
        $('.servicio_id').removeAttr('hidden');
        var selectedPetId = $(this).val();
        servicioSelect.children('option:not(:first)').remove();
        @foreach($services as $key => $service)
        if (selectedPetId === '{{$service->mascota_id}}' && '{{$service->estado}}' == 'disable') {
            var option = $('<option></option>').val('{{ $service->_id }}_{{ $service->cost_servicio }}').text('{{$service->nom_servicio}}');
            servicioSelect.append(option);
        }
        @endforeach
    }

    function mostrarValores() {
        datosServicio = servicioSelect.val().split('_');
        $("#precio").val(datosServicio[1]);
    }

    function agregar() {
        datosServicio = servicioSelect.val().split('_');
        servicio_id = datosServicio[0];
        servicio = $("#servicio_id option:selected").text();
        precio = $("#precio").val();
        impuesto = $("#iva").val();
        if (servicio_id != ""  && precio != "") {
            if (servicioSelect != "") {
                subtotal[cont] = precio;
                total += parseInt(subtotal[cont]);
                var fila = '<tr class="selected" id="fila' +
                    cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' +
                    cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="servicio_id[]" value="' +
                    servicio_id + '">' + servicio + '</td> <td> <input type="hidden" name="precio[]" value="' +
                    precio + '"> <input class="form-control" type="number" value="' +
                    precio + '" disabled> </td>  <td align="right">$' +
                    subtotal[cont] + '</td></tr>';
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'No ha seleccionado ningun servicio',
                })
            }
        } else {
            Swal.fire({
                type: 'error',
                text: 'Rellene todos los campos del detalle de la venta.',
            })
        }
    }

    function limpiar() {
        mascotaSelect.val("");
        servicioSelect.val("");
    }

    function totales() {
        
        $("#total").html("COL " + total);
        total_impuesto = parseInt(total) * parseInt(impuesto) / 100;
        console.log(total_impuesto);
        total_pagar = parseInt(total) + parseInt(total_impuesto);
        $("#total_impuesto").html("COL " + total_impuesto);
        $("#total_pagar_html").html("COL " + total_pagar);
        $("#total_pagar").val(total_pagar);
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        total_impuesto = total * impuesto / 100;
        total_pagar_html = total + total_impuesto;
        $("#total").html("COL" + total);
        $("#total_impuesto").html("COL" + total_impuesto);
        $("#total_pagar_html").html("COL" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html);
        $("#fila" + index).remove();
        evaluar();
    }
</script>
@endsection