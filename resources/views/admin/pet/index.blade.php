@extends('layouts.admin')
@section('title','Gestión de Mascotas')
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
            Administrar Mascotas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/home">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mascotas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Mascotas</h4>
                        <div class="btn-group">
                            <a class="dropdown-toggle cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('pets.create')}}" class="dropdown-item" type="button">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Dueño</th>
                                    <th style="width: 100px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pets as $pet)

                                <tr>
                                    <th scope="row">{{$num++ }}</th>

                                    <td> <a href="{{ route('pets.show', $pet )  }}"> {{$pet->nom_mascota }} </a></td>


                                    <td>{{$pet->clients->nom_cliente }}</td>

                                    <td>
                                        {!! Form::open(['route'=>['pets.destroy', $pet], 'method'=>'DELETE']) !!}
                                        <a class="btn btn-outline-info" href="{{ route('pets.edit', $pet)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button class="btn btn-outline-danger delete-confirm" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
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