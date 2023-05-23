@extends('layouts.admin')
@section('title','Editar servicio')
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
            Editar servicio
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/home">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('services.index') }}">Servicios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar servicio</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar servicio</h4>
                    </div>
                    {!! Form::model($service,['route'=>['services.update',$service], 'method'=>'PUT']) !!}

                    <div class="form-group">
                        <label for="nom_servicio">Nombre</label>
                        <input type="text" name="nom_servicio" id="nom_servicio" class="form-control" placeholder="Nombre de Servicio" value="{{$service->nom_servicio}}" required>
                    </div>

                    <div class="form-group">
                        <label for="desc_servicio">Descripcion</label>
                        <input type="text" name="desc_servicio" id="desc_servicio" class="form-control" placeholder="Descripcion de Servicio" value="{{$service->desc_servicio}}" required>
                    </div>

                    <div class="form-group">
                        <label for="cost_servicio">Costo</label>
                        <input type="number" name="cost_servicio" id="cost_servicio" class="form-control" placeholder="Costo del servicio" value="{{$service->cost_servicio}}" required>
                    </div>

                    <div class="form-group">
                        <label for="dur_servicio">Duración</label>
                        <input type="number" name="dur_servicio" id="dur_servicio" class="form-control" placeholder="Duración del servicio" value="{{$service->dur_servicio}}" required>
                    </div>

                    <div class="form-group">
                        <label for="mascota_id">Mascota</label>
                        <select id="mascota_id" class="form-control" name="mascota_id">
                            @foreach ($pets as $pet)
                            <option value="{{ $pet->id }}"
                                @if ($pet->id==$service->mascota_id)
                                selected
                            @endif
                                >{{$pet->nom_mascota}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('services.index') }}" class="btn btn-light mr-2">
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

{!!
Html::script('melody/js/dropify.js')
!!}

@endsection