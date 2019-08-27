@extends('adminlte::page')

@section('title', 'Dashboards')

@section('content_header')
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3>Dashboards</h3>
            </div>
        </div>
    </nav>
</div>
@stop

@section('content')
<div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-info bg-light-blue" style="border-radius: 7px;">
        <div class="inner">
            <h3>{{$processos}}</h3>

            <p>Número de Processos</p>
        </div>
        <div class="icon">
            <i class="fas fa-file"></i>
        </div>
        <a href="/processos" class="small-box-footer"> Ir para <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

@stop
