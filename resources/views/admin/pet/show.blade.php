@extends('layouts.admin')
@section('title','Detalles de mascota')
@section('styles')
@endsection
@section('styles')

@section('create')
@endsection
@section('preference')
@endsection
@section('content')


<!-- partial -->

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalles
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('pets.index') }}">Mascotas</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$pet->nom_mascota }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <!-- <img src="# " alt="profile" class="img-lg img-thumbnail mb-3"> -->
                                <h3>{{$pet->nom_mascota }}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            {{-- <div class="border-bottom py-4">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        sobre mascota
                                    </button>

                                    <button type="button" class="list-group-item list-group-item-action">
                                        Mascotas
                                    </button>

                                    <button type="button" class="list-group-item list-group-item-action">
                                        Registrar mascota
                                    </button>
                                </div>
                            </div> --}}

                            <div class="py-4">
                            <p class="clearfix">
                                    <strong class="float-left">
                                        Fecha de nacimiento
                                    </strong>
                                    <span class="float-right text-muted">
                                            {{$pet->fechaN_mascota }}
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <strong class="float-left">
                                        Edad
                                    </strong>
                                    <span class="float-right text-muted">
                                        {{$edad }} años
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <strong class="float-left">
                                        Especie
                                    </strong>
                                    <span class="float-right text-muted">
                                            {{$pet->especie_mascota }}
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <strong class="float-left">
                                        Raza
                                    </strong>
                                    <span class="float-right text-muted">
                                            {{$pet->raza_mascota }}
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <strong class="float-left">
                                        Vacunas
                                    </strong>
                                    <br>
                                    {{$pet->vacunas_mascota }}

                                </p>
                                

                            </div>



                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Informacion de mascota</h4>

                                </div>

                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">


                                        <strong> <i class="fas fa-handshake"> Servicios </i> </strong>
                                        <hr>
                                        @foreach($services as $service)
                                        @if($service->mascota_id == $pet->id )
                                        <p class="text-muted">{{$service->nom_servicio}}</p>
                                        <p class="text-muted">${{number_format($service->cost_servicio)}}</p>
                                        <hr>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-muted">
                    <a href="{{route('pets.index') }}" class="btn btn-primary" type="button">Regresar</a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection