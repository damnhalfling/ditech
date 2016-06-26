<?php
use Illuminate\Support\Str;
?>
@extends('admin.container')

@section('conteudo')

    <div id="content" class="content">

        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Tables</a></li>
            <li class="active">Managed Tables</li>
        </ol>

        @if(preg_match("/_/",$class))
            <h1 class="page-header"> {{Str::studly( explode("_",$class)[1] )}} <small>  Lista de itens </small></h1>
        @else
            <h1 class="page-header"> {{Str::studly( $class )}} <small>  Lista de itens </small></h1>
        @endif

        <div class="row">
            
            <div class="col-md-12">
            
                <div class="panel panel-inverse">

                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    
                        @if(preg_match("/_/",$class))
                            <h4 class="panel-title">Listar {{Str::studly( explode("_",$class)[1] )}}</h4>
                        @else
                            <h4 class="panel-title">Listar {{Str::studly( $class )}}</h4>
                        @endif

                    </div>

                    <div class="panel-body">

                        <p>
                            @if($class == "cmp_config")
                                <a href="/criar/campanha" class="btn btn-success btn-block"> Criar Campanha </a>
                            @elseif(sizeof(explode("_",$class)) > 1)
                                <a href="/novo/{{$class}}" class="btn btn-success btn-block">Add {{Str::studly( explode("_",$class)[1] )}} </a>
                            @else
                                <a href="/novo/{{$class}}" class="btn btn-success btn-block">Add {{Str::studly( $class )}} </a>
                            @endif
                        </p>
                    
                        <div class="table-responsive">

                            @if (sizeof($obj) > 0 && sizeof($colunas) > 0)
                    
                                <table id="data-table" class="table table-striped table-bordered">
                        
                                    <thead>
                                        
                                        <tr>
                                            @foreach ($colunas as $row)
                                                <th>{{ str_replace("id_","",$row['campo']) }}</th>
                                            @endforeach
                                            <th>Ações</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($obj as $row)

                                            <tr class="odd gradeX">

                                                @foreach ($colunas as $col)

                                                    <td>

                                                        @if( $col['campo'] == 'imagem' || $col['campo'] == 'banner' )

                                                            {{Html::image($row[$col['campo']],null,["width"=>"100","height"=>"100"])}}

                                                        @elseif( preg_match("/id_/", $col['campo'] ) )

                                                            <?php 

                                                                $relacao = explode("id_",$col['campo']);
                                                                $relacao = $relacao[1];
                                                                
                                                                if (!empty($row[$col['campo']])){
                                                                                                                                    
                                                                    $model = 'App\\'.Str::studly($relacao);
                                                                    
                                                                                                                                            
                                                                    $rs = $model::find($row[$col['campo']]);
                                                                    
                                                                    if( !empty($rs->nome) ) echo $rs->nome;
									                                else if (!empty($rs->email)) echo $rs->email;
                                                                    

                                                                }

                                                            ?>


                                                        @elseif ( preg_match("/b_/", $col['campo'] ))

                                                            @if( $row[$col['campo']] == 1)
                                                               <span class="fa-stack fa-2x text-success"> <i class="fa fa-check"></i> </span>
                                                            @else
                                                                <span class="fa-stack fa-2x text-danger"> <i class="fa fa-ban"></i> </span>
                                                            @endif

                                                        @elseif ( preg_match("/hexa/", $col['campo'] ))
                                                            <span style="width:40px; height:40px; display:block; border-radius:4px; background-color:{{ $row[$col['campo']] }}"> </span>
                                                        @else

                                                            {{ $row[$col['campo']] }}

                                                        @endif

                                                    </td>

                                                @endforeach

                                                <td>
                                                    @if($class == "cmp_config")
                                                        <a class="btn btn-success" href="/editar/campanha/{{ $row['id'] }}" ><i class="fa fa-edit"></i></a>
                                                    @else
                                                        <a class="btn btn-success" href="/editar/{{$class}}/{{ $row['id'] }}" ><i class="fa fa-edit"></i></a>
                                                    @endif
                                                    <a class="btn btn-danger"  href="{{ $row['id'] }}"><i class="fa fa-trash-o "></i></a>
                                                    @if(!empty($row['imagem']))
                                                        <a class="btn btn-primary" href="javascript:return null;" onclick="window.prompt('Precione Ctrl + c para copiar o link da imagem', '{{$row['imagem']}}');"><i class="fa fa-link"></i></a>
                                                    @endif

                                                    @if($class == 'ed_materia')
                                                        @if( Session::has('fb_access_token') )
                                                            <a class="btn btn-primary" href="/social/materia/{{$row['id']}}" ><i class="fa fa-facebook"></i></a> 
                                                        @endif
                                                     @endif
                                                </td>

                                            </tr>

                                        @endforeach
                                    
                                    </tbody>

                                </table>

                                {{$obj->links()}}

                            
                            @else

                                <p> Você nao possui conteudos para {{Str::studly($class)}} cadastrados.... </p>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@stop

@section('script')
    <script>

        $(".btn.btn-danger").click(function(e){
            e.preventDefault();

            var obj = $(e.target).prop("tagName") == "A" ? $(e.target) : $(e.target).parents("a");
            var value = obj.attr("href");

            $.post( "/excluir/{{$class}}/", { id: value , _token: "{{ csrf_token() }}" } ).done(function( data ) {
                location.reload();
            });

        });

    </script>
@stop
