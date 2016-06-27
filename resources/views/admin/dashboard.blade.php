@extends('admin.container')

@section('style')

@stop

@section('conteudo')

<div id="content" class="content">

    <div class="row"> 
        <div class="col-md-12 ui-sortable">

            @if(Session::has('msg'))
            <div class="alert alert-danger fade in m-b-15">
                <strong>Error!</strong>
                {{Session::get('msg')}}
                <span class="close" data-dismiss="alert">×</span>
            </div>
            @endif
            
            <div class="panel panel-inverse" data-sortable-id="ui-buttons-1" -="">
                <div class="panel-heading">
                    <h4 class="panel-title">Salas e horários disponiveis</h4>
                </div>
                <div class="panel-body">
                    @foreach($salas as $sala)
                    <div class="row">
                        {{ Form::open(['url' => '/reserva/salvar', 'method' => 'POST', 'class' => "margin-bottom-0"]) }}
                            <input type="hidden" name="sala" value="{{$sala->id}}">
                            <span class="col-md-3"> 
                                <label>Salas: {{$sala->id}}</label>
                            </span>
                            <span class="col-md-3">
                                <label>Data:</label>
                                <input type="text" name="data">
                            </span>
                            <span class="col-md-4">
                                <label>Hora de início</label>
                                <select name="horaInicio">
                                    @foreach($horas['opcoes'] as $h)
                                        <option value="{{$h}}"> {{$h}} </option>
                                    @endforeach
                                </select>
                            </span>
                            <span>
                                <input type="submit" value="Reservar">
                            </span>
                        {{Form::close()}}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-inverse" data-sortable-id="ui-buttons-1" -="">
                <div class="panel-heading">
                    <h4 class="panel-title">Minhas reservas </h4>
                </div>
                <div class="panel-body">
                    @foreach($reservas as $reserva)
                    {{ Form::open(['url' => '/excluir/reserva', 'method' => 'POST', 'class' => "margin-bottom-0"]) }}
                        <input type="hidden" name="id" value="{{$reserva->id}}">
                        <div class="row">
                            <span class="col-md-3"> 
                               <label> {{$reserva->sala->nome}} </label>
                            </span>
                            <span class="col-md-3">
                                <label> Data: {{$reserva->data}}</label>
                            </span>
                             <span class="col-md-3">
                                <label> Hora de início: {{$reserva->hora}}</label>
                            </span>
                            <span>
                                <input type="submit" value="Excluir">
                            </span>
                        </div>
                    {{Form::close()}}
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
