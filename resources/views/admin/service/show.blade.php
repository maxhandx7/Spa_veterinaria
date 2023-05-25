@extends('layouts.admin')
@section('title','Detalles de serviceo')
@section('styles')
@endsection
@section('styles')

@section('create')
<li class="nav-item d-none d-lg-flex">
    <a href="{{ route('categories.create') }}" class="nav-link">
        <span class="btn btn-primary"> crear nuevo</span>
    </a>
</li>
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
                <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('services.index') }}">Servicios</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$service->nom_servicio }}</li>
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
                                <h3>{{$service->nom_servicio }}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            {{-- <div class="border-bottom py-4">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        sobre serviceo
                                    </button>

                                    <button type="button" class="list-group-item list-group-item-action">
                                        Servicios
                                    </button>

                                    <button type="button" class="list-group-item list-group-item-action">
                                        Registrar serviceo
                                    </button>
                                </div>
                            </div> --}}

                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Categoria
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$service->categories->name }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Mascota
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="{{route('pets.show', $service->pets)}}">
                                            {{$service->pets->nom_mascota }}</a>
                                    </span>
                                </p>

                            </div>

                            @if ($service->estado != 'disable')
                            <button class="btn btn-success btn-block">Pagado</button>
                            @else
                            <button class="btn btn-danger btn-block">No pago</button>
                            @endif

                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Informacion de serviceo</h4>

                                </div>

                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">


                                        <strong> <i class="fas fa-fingerprint mr-1"> Codigo </i> </strong>
                                        <p class="text-muted"> {{$service->_id }} </p>
                                        <hr>

                                        <strong> <i class="fas fa-book mr-1"> </i>Descripcion </strong>
                                        <p class="text-muted"> {{$service->desc_servicio }} </p>
                                        <hr>

                                        <strong> <i class="fas fa-money-bill mr-1"> Costo </i> </strong>
                                        <p class="text-muted"> {{$service->cost_servicio }} </p>
                                        <hr>
                                    </div>

                                    <div class="form-group col-md-6">

                                        <strong> <i class="fas fa-clock"> Duración </i> </strong>
                                        <p class="text-muted"> {{$service->dur_servicio }}h </p>
                                        <hr>
                                        <strong> <i class="fas fa-list mr-1"> Categoria </i> </strong>
                                        <p class="text-muted"> {{$service->categories->name}} </p>
                                        <hr>

                                        <strong> <i class="fas fa-paw mr-1"> Mascota </i> </strong>
                                        <p class="text-muted"> {{$service->pets->nom_mascota }} </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-muted">
                    <a href="{{route('services.index') }}" class="btn btn-primary" type="button">Regresar</a>
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