@extends('layouts.admin')
@section('title','Gestión de Servicios')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<style>
    .cursor-pointer {
        cursor: pointer;
    }
</style>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Administrar Servicios
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/home">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Servicios</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Servicios</h4>
                        <div class="btn-group">
                            <a class="dropdown-toggle btn btn-success cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Nuevo
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <a href="{{route('services.create')}}" class="dropdown-item" type="button">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                    <th style="width: 100px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)

                                <tr>
                                    <th scope="row">{{$num++ }}</th>

                                    <td> <a href="{{ route('services.show', $service)  }}"> {{$service->nom_servicio }} </a></td>

                                    <td>{{$service->categories->name }}</td>
                                    @if($service->estado == 'enable')
                                    <td>
                                        <p class="text-success">Pagado</p>
                                    </td>
                                    @else
                                    <td>
                                        <p class="text-danger">No pago</p>
                                    </td>
                                    @endif
                                    <td>
                                        {!! Form::open(['route'=>['services.destroy', $service], 'method'=>'DELETE']) !!}
                                        <a class="btn btn-outline-info" href="{{ route('services.edit', $service)}}" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-outline-danger delete-confirm" type="submit" title="Eliminar">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
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
@endsection