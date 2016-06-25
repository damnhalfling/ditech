@extends('admin.container')

@section('style')

@stop

@section('conteudo')

<div id="content" class="content">

	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Home</a></li>
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Dashboard v2</li>
	</ol>

	<h1 class="page-header">Dashboard v2 <small>header small text goes here...</small></h1>

    <div class="row"> 
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-inverse" data-sortable-id="ui-buttons-1" -="">
                <div class="panel-heading">
                    <h4 class="panel-title">Importar Dados</h4>
                </div>
                <div class="panel-body">
                    <a href="/importar/fb-paginas" class="btn btn-primary m-r-5 m-b-5">Minhas Paginas</a>
                    @if(Auth::user()->id == 2)
                        <a href="/importar/imagens"    class="pull-right btn btn-info m-r-5 m-b-5">Minhas Imagens</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @foreach($campanhasAtivas as $campanha)
                <div class="panel panel-success col-md-12">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{$campanha->nome}}</h4>
                    </div>
                    <div class="panel-body bg-green text-white">
                        <span class="pull-left">{{$campanha->frequencia->recorrente}}</span>
                        <span class="pull-right"></span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-6">
            @foreach($campanhasInAtivas as $campanha)
                <div class="panel panel-danger col-md-12">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{$campanha->nome}}</h4>
                    </div>
                    <div class="panel-body bg-red text-white">
                        <span class="pull-left">{{$campanha->frequencia->recorrente}}</span>
                        <span class="pull-right"></span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</div>

<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>

@stop

@section('script')

@stop
