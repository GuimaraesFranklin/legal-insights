@extends('adminlte::page')

@section('title', 'Criar Processo')

@section('content_header')
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3>Criar Processo</h3>
            </div>
        </div>
    </nav>
</div>
@stop

@section('content')
<div class="form form-group">
    <div class="card card-border">
        <form action="/processos" method="post">
            @csrf
            <div class="form form-group">
                <div class="form form-group">
                    <div class="col col-xs-5">
                        <label for="nuProcess">Nº Unico do Processo</label>
                        <input type="text" class="form-control col-10" name="nuProcess" id="nuProcess"
                            aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <div class="col col-xs-2">
                        <label for="dataDist">Data da Distribuição</label>
                        <input type="date" class="form-control col-10" name="dataDist" id="dataDist"
                            aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <div class="col col-xs-5">
                        <label for="reuPrin">Réu Principal</label>
                        <input type="text" class="form-control col-10" name="reuPrin" id="reuPrin"
                            aria-describedby="helpId" placeholder="">
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
                        <input type="number" step="0.01" class="form-control col-10" name="valCausa" id="valCausa"
                            aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form form-group">
                    <div class="col col-xs-4">
                        <label for="vara">Vara</label>
                        <input type="text" class="form-control col-10" name="vara" id="vara" aria-describedby="helpId"
                            placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form form-group">
                    <div class="col col-xs-4">
                        <label for="comarca">Comarca</label>
                        <input type="text" class="form-control col-10" name="comarca" id="comarca"
                            aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col col-xs-2">
                        <label for="uf">UF</label>
                        <select class="form-control col-xs-4" name="uf" id="uf">
                            <option>-- Selecione UF --</option>
                            @foreach ( $estado as $estados => $value)
                            <option value="{{ $value }}"> {{$value}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
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
                            <input type="number" step="0.01" class="form-control" name="vlrPro" id="vlrPro"
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="form form-group">
                        <div class="col col-xs-6">
                            <label for="statusPed">Status</label>
                            <input type="text" class="form-control" name="statusPed" id="statusPed"
                                aria-describedby="helpId" placeholder="">
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
                    <button type="cancel" class="btn btn-danger ">Cancelar</button>
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
