@extends('admin.container')

@section('style')

@stop

@section('conteudo')

<div id="content" class="content">

    <div class="row"> 
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-inverse" data-sortable-id="ui-buttons-1" -="">
                <div class="panel-heading">
                    <h4 class="panel-title">Reservar salas</h4>
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => '/reserva/salvar', 'method' => 'POST', 'class' => "margin-bottom-0"]) }}
                        <span class="col-md-3"> 
                            <label>Salas:</label>
                            <select name="sala">
                                @foreach($salas as $sala)
                                    <option value="{{$sala->id}}">{{$sala->nome}}</option>
                                @endforeach
                            </select>
                        </span>
                        <span class="col-md-3">
                            <label>Data:</label>
                            <input type="text" name="data">
                        </span>
                        <span class="col-md-4">
                            <label>Hora de início</label>
                            <input type="text" name="horaInicio">
                        </span>
                        <span>
                            <input type="submit" value="Reservar">
                        </span>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-inverse" data-sortable-id="ui-buttons-1" -="">
                <div class="panel-heading">
                    <h4 class="panel-title">Reservas </h4>
                </div>
                <div class="panel-body">
                    @foreach($reservas as $reserva)
                    <div class="row">
                        <span class="col-md-3"> 
                            Sala: {{$reserva->sala->nome}}
                        </span>
                        <span class="col-md-3">
                            Data: {{$reserva->datahora}}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>

<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>

@stop

@section('script')

@stop
