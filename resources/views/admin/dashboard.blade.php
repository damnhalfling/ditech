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
                    <h4 class="panel-title">Salas Disponiveis</h4>
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>

</div>

<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>

@stop

@section('script')

@stop
