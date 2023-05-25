@extends('layouts.admin')
@section('title','Editar cliente')
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
            Editar cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/home">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index') }}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar cliente</h4>
                    </div>
                    {!! Form::model($client,['route'=>['clients.update',$client], 'method'=>'PUT']) !!}

                    <div class="form-group">
                        <label for="nom_cliente">Nombre</label>
                        <input type="text" name="nom_cliente" id="nom_cliente" class="form-control" placeholder="Nombre de cliente" value="{{$client->nom_cliente}}" required>
                    </div>

                    <div class="form-group">
                        <label for="apellido_cliente">Apellido</label>
                        <input type="text" name="apellido_cliente" id="apellido_cliente" class="form-control" placeholder="Apellido de cliente" value="{{$client->apellido_cliente}}" required>
                    </div>

                    <div class="form-group">
                        <label for="dir_cliente">Direccion</label>
                        <input type="text" name="dir_cliente" id="dir_cliente" class="form-control" placeholder="direccion de cliente" value="{{$client->dir_cliente}}" required>
                    </div>

                    <div class="form-group">
                        <label for="tel_cliente">Telefono</label>
                        <input type="num" name="tel_cliente" id="tel_cliente" class="form-control" placeholder="Telefono de cliente" value="{{$client->tel_cliente}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email_cliente">Email</label>
                        <input type="email" name="email_cliente" id="email_cliente" class="form-control" placeholder="Email de cliente" value="{{$client->email_cliente}}" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('clients.index') }}" class="btn btn-light mr-2">
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