@extends('layouts.admin')
@section('title','Editar mascota')
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
            Editar mascota
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/home">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('pets.index') }}">Mascotas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar mascota</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar mascota</h4>
                    </div>
                    {!! Form::model($pet,['route'=>['pets.update',$pet], 'method'=>'PUT']) !!}

                    <div class="form-group">
                        <label for="nom_mascota">Nombre</label>
                        <input type="text" name="nom_mascota" id="nom_mascota" class="form-control" value="{{$pet->nom_mascota}}" placeholder="Nombre de la mascota"  >
                    </div>

                    <div class="form-group">
                        <label for="especie_mascota">Especie</label>
                        <input type="text" name="especie_mascota" id="especie_mascota" class="form-control" value="{{$pet->especie_mascota}}" placeholder="Perro" >
                    </div>

                    <div class="form-group">
                        <label for="raza_mascota">Raza</label>
                        <input type="text" name="raza_mascota" id="raza_mascota" class="form-control" value="{{$pet->raza_mascota}}" placeholder="Pitbull" >
                    </div>

                    <div class="form-group">
                        <label for="vacunas_mascota">Vacunas</label>
                        <textarea name="vacunas_mascota" id="vacunas_mascota" class="form-control" placeholder="Historial de vacunas anteriores" >{{$pet->vacunas_mascota}}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="fechaN_mascota">Fecha de nacimiento</label>
                        <input type="date" name="fechaN_mascota" id="fechaN_mascota" class="form-control" value="{{$pet->fechaN_mascota}}" placeholder="Costo del servicio" >
                    </div>



                    <div class="form-group">
                        <label for="cliente_id">Cliente</label>
                        <select id="cliente_id" class="form-control" name="cliente_id">
                            <option selected disabled value="">Seleccione Cliente</option>
                            @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{$client->nom_cliente}}</option>
                            @endforeach


                            @foreach ($clients as $client)
                            <option value="{{ $client->_id }}"
                                @if ($client->_id==$pet->cliente_id)
                                selected
                            @endif
                                >{{$client->nom_cliente}}</option>
                            @endforeach

                        </select>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('pets.index') }}" class="btn btn-light mr-2">
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