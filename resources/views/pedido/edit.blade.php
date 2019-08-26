@extends('adminlte::page')

@section('title', 'Editar Pedido')

@section('content_header')
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3>Editar Processo</h3>
            </div>
        </div>
    </nav>
</div>
@stop

@section('content')
<div class="form form-group">
    <div class="card card-border">
        <form action="/pedidos/{{$pedido->id}}" method="post">
            @csrf
            <div class="form form-group">
                <div class="form-group">
                    <div class="col col-xs-3">
                        <label for="tipoPed">Pedido</label>
                        <select class="form-control col-xs-4" name="tipoPed" id="tipoPed" required="true">
                            <option>-- Selecione Tipo Pedido --</option>
                            @foreach ( $tped as $tpeds => $value)
                            <option value="{{ $value }}"> {{$value}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form form-group">
                        <div class="col col-xs-3">
                            <label for="vlrPro">Valor Risco Provavel</label>
                            <input value="{{$pedido->valor_risco_provavel}}" type="number" step="0.01"
                                class="form-control" name="vlrPro" id="vlrPro" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form form-group">
                        <div class="col col-xs-6">
                            <label for="statusPed">Status</label>
                            <input value="{{$pedido->status}}" type="text" class="form-control" name="statusPed"
                                id="statusPed" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
            </hr>
            <div>
                </hr>
            </div>
            </hr>
            <div class="card card-footer">
                <div class="form col col-xs-6">
                    <hr>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                </div>
            </div>

        </form>
    </div>
</div>
@stop

@section('css')
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
