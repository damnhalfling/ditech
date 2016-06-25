<?php
    use Illuminate\Support\Str;
?>
@extends('admin.container')

@section('style')
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="/assets/admin/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN PAGE CSS STYLE ================== --> 
    <link href="/assets/admin/plugins/switchery/switchery.min.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/powerange/powerange.min.css" rel="stylesheet" />
    <!-- ================== END PAGE CSS STYLE ================== -->

    <style>
      .form-horizontal.form-bordered .form-group>div {
            min-height: 86px;
        }

        .form-horizontal.form-bordered .form-group:last-child {
            border-bottom: 1px solid #eee;
        }

        .modal-body ul{
                list-style:none;
                display:block;
                overflow:hidden;
        }                

        .modal-body #bancoImagens li{
                height:150px;
                width:150px;
                float:left;
                margin:10px;
                overflow:hidden;
                
        }

        .modal-backdrop{
                display:block;
        }

	.form-horizontal.form-bordered .form-group>div,
	.form-horizontal.form-bordered .form-group {
		min-height: 131px;
	}

    </style>
    
@stop

@section('conteudo')

    <div id="content" class="content">

        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Form Stuff</a></li>
            <li class="active">Form Elements</li>
        </ol>

        @if(preg_match("/_/",$class))
            <h1 class="page-header"> {{Str::studly( explode("_",$class)[1] )}} </h1>
        @else
            <h1 class="page-header"> {{Str::studly( $class )}} </h1>
        @endif

        <div class="row">
                     
            <div class="col-md-12">

                <div class="panel panel-inverse" data-sortable-id="form-stuff-2">

                    <div class="panel-heading">

                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>

                        @if(preg_match("/_/",$class))
                            @if($class == "ed_materia")
                                <h4 class="panel-title">Editar destaque de {{Str::studly( explode("_",$class)[1] )}}</h4>
                            @else
                                <h4 class="panel-title">Editar {{Str::studly( explode("_",$class)[1] )}}</h4>
                            @endif
                        @else
                            <h4 class="panel-title">Editar {{Str::studly( $class )}}</h4>
                        @endif

                    </div>

                    <div class="panel-body">

                        @if (isset($multipart))

                            {{ Form::open(['url' => '/salvar/'.$class, 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal form-bordered', 'role' => 'form']) }}

                        @else

                            {{ Form::open(['url' => '/salvar/'.$class, 'method' => 'POST', 'class' => 'form-horizontal form-bordered', 'role' => 'form']) }}

                        @endif

                            <input type="hidden" value="0" name="id" />
 
                            <div class="row">

                                @foreach ($colunas as $row)

                                    @if( $row['campo'] != "id" ) 

                                        <div class="form-group col-md-6">                                    

                                            <label class="control-label col-md-4 ui-sortable">
                                                @if( preg_match("/b_/",$row['campo']) || preg_match("/id_/",$row['campo']) ) 

                                                    <?php 

                                                        $relacao = explode("_",$row['campo']);
                                                        $relacao = $relacao[sizeof($relacao) - 1];

                                                    ?>

                                                    {{ $relacao }}

                                                @else 
                                                    {{ $row['campo'] }}
                                                @endif

                                                @if($row['null'] == "NO") 
                                                    *
                                                @endif
                                            </label>

                                            <div class="col-md-8 ui-sortable">

                                                @if ( preg_match('/float/', $row['tipo'], $i) || preg_match('/decimal/', $row['tipo'], $i) || preg_match('/int/', $row['tipo'], $i) || preg_match('/varchar/', $row['tipo'], $i) )

                                                    @if ( preg_match('/id_/', $row['campo'], $i) && !preg_match('/id_gb_imagem/', $row['campo'] ) )

                                                        <?php 

                                                            $relacao = explode("id_",$row['campo']);
                                                            $relacao = $relacao[1];
                                                            
                                                            $model = 'App\\'.Str::studly($relacao);
                                                            $rs = $model::get();

                                                        ?>

                                                        <select name="{{$row['campo']}}" class="form-control">

                                                            @if(empty( $obj[$row['campo']] ))
                                                                <option value="0">Selecione</option>
                                                            @endif

                                                            @foreach ($rs as $key => $value)
                                                             
                                                                @if(!empty($value['nome']))
                                                                    <option value="{{$value['id']}}">
                                                                        {{$value['nome']}}
                                                                    </option>
                                                                @elseif(!empty($value['categoria']))
                                                                    <option value="{{$value['id']}}">
                                                                        {{$value['categoria']}}
                                                                    </option>
                                                                @elseif(!empty($value['email']))
                                                                    <option value="{{$value['id']}}">
                                                                        {{$value['email']}}
                                                                    </option>
                                                                @endif                                                              

                                                            @endforeach

                                                        </select>

                                                    @elseif ( $row['campo'] == "id_gb_imagem")

                                                            <a href="#banco-imagens" class="banco-imagens" data-toggle="modal" style="width:100%;display:block">
                                                                <i style="font-size: 30px; margin-right:10px;" class="fa fa-picture-o"></i><span>Clique aqui para selecionar uma imagem</span> 
                                                            </a>
                                                            <b style="display:block; margin-top:10px;">OU add nova imabem</b>
                                                            <div>  
                                                                <input class="form-control" type="file" value="" name="{{ $row['campo'] }}"  placeholder="{{ $row['campo'] }}" style="float: left; margin-right: 10px; margin-top:10px;" /> 
                                                            </div>

                                                    @elseif ( $row['campo'] == "cor" || $row['campo'] == "hexa")

                                                        <div class="input-group colorpicker-component" data-color="rgb(0, 0, 0)" data-color-format="rgb"  id="colorpicker-prepend">
                                                            <input class="form-control" type="text" value="rgb(0, 0, 0)" name="{{ $row['campo'] }}" placeholder="{{ $row['campo'] }}" />
                                                            <span class="input-group-addon"><i></i></span>
                                                        </div>

                                                    @elseif ( preg_match('/b_/', $row['campo']) )

                                                        <input type="checkbox" name="{{ $row['campo'] }}" data-render="switchery" />
                                                        
                                                    @elseif ( $row['campo'] == "banner" || $row['campo'] == "imagem" || $row['campo'] == "imagem_mobile" )

                                                        <input class="form-control" type="file" value="" name="{{ $row['campo'] }}" placeholder="{{ $row['campo'] }}" style="float: left; margin-right: 10px;" />

                                                        @if ($row['campo'] == "imagem" )
                                                          <span style="padding-top:5px; float:left;">Tamanho: 31x31</span>
                                                        @elseif ($row['campo'] == "banner")
                                                          <span style="padding-top:5px; float:left;">Tamanho: 870x420</span>
                                                        @endif


                                                    @elseif ( $row['campo'] == "descricao" )

                                                        <textarea name="descricao" id="descricao" rows="6" style="width:100%"></textarea>

                                                    @else

                                                        <input class="form-control" type="text" value="" name="{{ $row['campo'] }}" placeholder="{{ $row['campo'] }}" />

                                                    @endif

                                                @elseif ( preg_match('/longtext/', $row['tipo']) || preg_match('/mediumtext/', $row['tipo']) || preg_match('/text/', $row['tipo']) )

                                                    <textarea name="{{$row['campo']}}" rows="6" style="width:100%"></textarea>

                                                @elseif ( preg_match('/date/', $row['tipo'], $i) )

                                                    <div class="input-group date" id="datetimepicker_{{$row['campo']}}">
                                                        <input type="text" class="form-control" name="{{$row['campo']}}" value="{{$obj[$row['campo']]}}">
                                                        
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                
                                                @elseif ( preg_match('/enum/', $row['tipo'], $i) )

                                                    <select name="{{$row['campo']}}" class="form-control">
                                                    
                                                      @foreach($row['opcoes'] as $op)
                                                      
                                                        <option value="{{$op}}">{{$op}}</option>
                                                      
                                                      @endforeach
                                                    
                                                    </select>

                                                @endif

                                            </div>

                                        </div>

                                    @endif

                                @endforeach

                            </div>

                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </div>

                        {{ Form::close() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="modal modal-message fade" id="banco-imagens">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">BANCO DE IMAGENS</h4>
                </div>
                <div class="modal-body" style="height: 500px; width:90%; display: block;   overflow: scroll">
                </div>
            </div>
        </div>
    </div>

@stop

@section('script')

    <script>

     $(document).ready(function() {

            var binds = function() {
       
                $("#bancoImagens li a").click(function(e){
                
                    e.preventDefault();

                    if (e.tagName == "A") obj = $(e.target);
                    else obj = $(e.target).parents("a");

                    var input = document.createElement("input");
                    input.setAttribute("type", "hidden");
                    input.setAttribute("name", "id_gb_imagem");
                    input.setAttribute("value", obj.attr("href"));
                    input.setAttribute("class", "imagem-hidden"); 

                    form.append(input);

                    $("#banco-imagens .close").click();

                    $("input[type=file]").attr("disabled","disabled");

                });

                $("ul.pagination li a").click(function(e){
                    e.preventDefault();

                    var obj = $(e.target);

                    $.get(obj.attr("href")).success(function(result){
                        $("#banco-imagens .modal-body").html(result);    
                        binds();   
                    });
                });
            }

            $("#trigger-banco-imagens, a.banco-imagens").click(function(e){

                $.get("/banco-imagens").success(function(result){
                    $("#banco-imagens .modal-body").html(result);    
                    binds();          
                }); 

            });

            var form = null;
                
            $("input[type=file]").change(function(e) {
                var obj = $(e.target).parents("form");
                obj.find(".imagem-hidden").remove();
            });

            $("a.banco-imagens").bind("click", function(e){
                form = $(e.target).parents("form");
            });

        });

    </script>
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/assets/admin/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="/assets/admin/plugins/masked-input/masked-input.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="/assets/admin/plugins/password-indicator/js/password-indicator.js"></script>
    <script src="/assets/admin/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
    <script src="/assets/admin/plugins/bootstrap-select/bootstrap-select.min.js"></script    <script src="/assets/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
    <script src="/assets/admin/plugins/jquery-tag-it/js/tag-it.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-daterangepicker/moment.js"></script>
    <script src="/assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/assets/admin/plugins/select2/dist/js/select2.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/admin/plugins/switchery/switchery.min.js"></script>
    <script src="/assets/admin/plugins/powerange/powerange.min.js"></script>
    <script src="/assets/admin/js/form-slider-switcher.demo.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    

    <script>
        $(document).ready(function() {
        
            FormSliderSwitcher.init();

        })
    </script>
@stop
