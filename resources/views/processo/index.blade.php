@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3>Processos</h3>
            </div>
        </div>
    </nav>
</div>
@stop

@section('content')
<div class="container-fluid">
    @if (count($process) >= 0)
    <table class="table table-hover table-hovered table-striped table-bordered">

        <thead>
            <tr>
                <th>Número Único do Processo</th>
                <th>Data de Distribuição</th>
                <th>Réu Principal</th>
                <th>Valor da Causa</th>
                <th>Vara</th>
                <th>Comarca</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($process as $item)
            <tr>
                <td>{{$item ->numero_unico_processo}}</td>
                <td>{{$item ->data_distribuicao->format('d/m/Y')}}</td>
                <td>{{$item ->reu_principal}}</td>
                <td>{{'R$'.number_format($item ->valor_causa, 2, ',', '.')}}</td>
                <td>{{$item ->vara}}</td>
                <td>{{$item ->comarca}}</td>
                <td>{{$item ->uf}}</td>
                <td>
                    <a href="/processos/listar/{{$item->id}}" class="btn btn-sm btn-success">Abrir</a>
                    <a href="/processos/editar/{{$item->id}}" class="btn btn-sm btn-primary">Editar</a>
                    <a href="/processos/apagar/{{$item->id}}" class="btn btn-sm btn-danger">Apagar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <div class="card-footer">
        <a class="btn btn-success btn-sm" href="/processos/criar" role="button">Criar processo</a>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
    integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
    integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
</script>
@stop
