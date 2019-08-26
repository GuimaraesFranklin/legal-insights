@extends('adminlte::page')

@section('title', 'Editar Processo')

@section('content_header')
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3>Listar Dados do Processo</h3>
            </div>
        </div>
    </nav>
</div>
@stop

@section('content')
<div>
    <div class="card card-border">
        <form action="/processos/{{$process->id}}" method="post">
            @csrf
            <div class="form form-group">
                <div class="form form-group">
                    <div class="col col-xs-5">
                        <label for="nuProcess">Nº Unico do Processo</label>
                        <input disabled type="text" value="{{$process->numero_unico_processo}}"
                            class="form-control col-10" name="nuProcess" id="nuProcess" aria-describedby="helpId"
                            placeholder="{{$process->numero_unico_processo}}">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <div class="col col-xs-2">
                        <label for="dataDist">Data da Distribuição</label>
                        <input disabled type="text" value="{{$process ->data_distribuicao->format('d/m/Y')}}"
                            class="form-control col-10" name="dataDist" id="dataDist" aria-describedby="helpId"
                            placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <div class="col col-xs-5">
                        <label for="reuPrin">Réu Principal</label>
                        <input disabled type="text" value="{{$process->reu_principal}}" class="form-control col-10"
                            name="reuPrin" id="reuPrin" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <hr>
            </div>
            <hr>
            <div class="form form-group">
                <div class="form form-group">
                    <div class="col col-xs-2">
                        <label for="valCausa">Valor Causa</label>
                        <input disabled value="{{'R$' . number_format($process ->valor_causa, 2, ',','.')}}" step="0.01"
                            class="form-control col-10" name="valCausa" id="valCausa" aria-describedby="helpId"
                            placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form form-group">
                    <div class="col col-xs-4">
                        <label for="vara">Vara</label>
                        <input disabled type="text" value="{{$process->vara}}" class="form-control col-10" name="vara"
                            id="vara" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form form-group">
                    <div class="col col-xs-4">
                        <label for="comarca">Comarca</label>
                        <input disabled type="text" value="{{$process->comarca}}" class="form-control col-10"
                            name="comarca" id="comarca" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col col-xs-2">
                        <label for="vara">Vara</label>
                        <input disabled type="text" value="{{$process->uf}}" class="form-control col-10" name="vara"
                            id="vara" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                </div>
            </div>
    </div>
    <div class="form form-row">

    </div>
    </form>
    <hr>
</div>
<hr>
<div>
    <hr>
    <div class="container-fluid">
        @if (count($pedidos) >= 0)
        <table class="table table-hover table-hovered table-striped table-bordered">

            <thead>
                <tr>
                    <th>Data</th>
                    <th>Pedido</th>
                    <th>Valor de Risco Provavel</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $item)
                <tr>
                    <td hidden>$item->id</td>
                    <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>
                    <td>{{$item ->pedido}}</td>
                    <td>{{'R$'.number_format($item ->valor_risco_provavel, 2, ',', '.')}}</td>
                    <td>{{$item ->status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        <div class="card-footer">
            <a class="btn btn-success btn-sm" href="/pedidos/editar/{{$item ->id}}" role="button">Criar
                pedido</a>
        </div>
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
