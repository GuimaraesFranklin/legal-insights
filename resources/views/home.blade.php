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
    <div class="small-box bg-info">
        <div class="inner">
            <h3>{{$processos}}</h3>

            <p>Número de Processos</p>
        </div>
        <div class="icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="/processos" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

@stop
