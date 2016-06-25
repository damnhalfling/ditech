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
    <link href="/assets/admin/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" /> 
    <!-- ================== END PAGE CSS STYLE ================== -->

    <style>
        .form-horizontal.form-bordered .form-group>div {
            min-height: 86px;
        }

        .form-horizontal.form-bordered .form-group:last-child {
            border-bottom: 1px solid #eee;
        }
    
        .dz-preview.dz-image-preview {
            float: left;
            width: 200px;
            position: relative;
            margin-right: 10px;
        }
        
        .dz-image {
         height: 200px;
         overflow: hidden;
        }
        .dz-image img {
            width: 100%;
        }

        /* The MIT License */
        .dropzone,
        .dropzone *,
        .dropzone-previews,
        .dropzone-previews * {
          -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;
        }

        .dropzone.dz-clickable {
          cursor: pointer;
        }
        .dropzone.dz-clickable .dz-message,
        .dropzone.dz-clickable .dz-message span {
          cursor: pointer;
        }
        .dropzone.dz-clickable * {
          cursor: default;
        }
        .dropzone .dz-message {
          opacity: 1;
          -ms-filter: none;
          filter: none;
        }
        .dropzone.dz-drag-hover {
          border-color: rgba(0,0,0,0.15);
          background: rgba(0,0,0,0.04);
        }
        .dropzone.dz-started .dz-message {
          display: none;
        }
        .dropzone .dz-preview,
        .dropzone-previews .dz-preview {
          background: rgba(255,255,255,0.8);
          position: relative;
          display: inline-block;
          margin: 17px;
          vertical-align: top;
          border: 1px solid #acacac;
          padding: 6px 6px 6px 6px;
        }
        .dropzone .dz-preview.dz-file-preview [data-dz-thumbnail],
        .dropzone-previews .dz-preview.dz-file-preview [data-dz-thumbnail] {
          display: none;
        }
        .dropzone .dz-preview .dz-details,
        .dropzone-previews .dz-preview .dz-details {
          width: 100%;
          position: relative;
          padding: 5px;
          margin-bottom: 22px;
        }
        .dropzone .dz-preview .dz-details .dz-filename,
        .dropzone-previews .dz-preview .dz-details .dz-filename {
          overflow: hidden;
          height: 100%;
        }
        .dropzone .dz-preview .dz-details img,
        .dropzone-previews .dz-preview .dz-details img {
          position: absolute;
          top: 0;
          left: 0;
          width: 100px;
          height: 100px;
        }
        .dropzone .dz-preview .dz-details .dz-size,
        .dropzone-previews .dz-preview .dz-details .dz-size {
          line-height: 28px;
        }
        .dropzone .dz-preview.dz-error .dz-error-mark,
        .dropzone-previews .dz-preview.dz-error .dz-error-mark {
          display: block;
        }
        .dropzone .dz-preview.dz-success .dz-success-mark,
        .dropzone-previews .dz-preview.dz-success .dz-success-mark {
          display: block;
        }
        .dropzone .dz-preview:hover .dz-details img,
        .dropzone-previews .dz-preview:hover .dz-details img {
          display: none;
        }
        .dropzone .dz-preview .dz-success-mark,
        .dropzone-previews .dz-preview .dz-success-mark,
        .dropzone .dz-preview .dz-error-mark,
        .dropzone-previews .dz-preview .dz-error-mark {
          display: none;
          position: absolute;
          width: 40px;
          height: 40px;
          font-size: 30px;
          text-align: center;
          right: -10px;
          top: -10px;
        }
        .dropzone .dz-preview .dz-success-mark,
        .dropzone-previews .dz-preview .dz-success-mark {
          color: #8cc657;
        }
        .dropzone .dz-preview .dz-error-mark,
        .dropzone-previews .dz-preview .dz-error-mark {
          color: #ee162d;
        }
        .dropzone .dz-preview .dz-progress,
        .dropzone-previews .dz-preview .dz-progress {
          position: absolute;
          top: 100px;
          left: 6px;
          right: 6px;
          height: 6px;
          background: #d7d7d7;
          display: none;
        }
        .dropzone .dz-preview .dz-progress .dz-upload,
        .dropzone-previews .dz-preview .dz-progress .dz-upload {
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          width: 0%;
          background-color: #8cc657;
        }
        .dropzone .dz-preview.dz-processing .dz-progress,
        .dropzone-previews .dz-preview.dz-processing .dz-progress {
          display: block;
        }
        .dropzone .dz-preview .dz-error-message,
        .dropzone-previews .dz-preview .dz-error-message {
          display: none;
          position: absolute;
          top: -5px;
          left: -20px;
          background: rgba(245,245,245,1);
          padding: 8px 10px;
          color: #800;
          min-width: 140px;
          max-width: 500px;
          z-index: 500;
        }
        .dropzone .dz-preview:hover.dz-error .dz-error-message,
        .dropzone-previews .dz-preview:hover.dz-error .dz-error-message {
          display: block;
        }
        .dropzone {
          border: 1px solid rgba(0,0,0,0.03);
          min-height: 360px;
          -webkit-border-radius: 3px;
          border-radius: 3px;
          background: rgba(0,0,0,0.03);
          padding: 23px;
          position: relative;
          overflow: hidden;
        }
        .dropzone .dz-default.dz-message {
          opacity: 1;
          -ms-filter: none;
          filter: none;
          -webkit-transition: opacity 0.3s ease-in-out;
          -moz-transition: opacity 0.3s ease-in-out;
          -o-transition: opacity 0.3s ease-in-out;
          -ms-transition: opacity 0.3s ease-in-out;
          transition: opacity 0.3s ease-in-out;
          background-image: url("../img/spritemap.png");
          background-repeat: no-repeat;
          background-position: 0 0;
          position: absolute;
          width: 428px;
          height: 123px;
          margin-left: -214px;
          margin-top: -61.5px;
          top: 50%;
          left: 50%;
        }
        @media all and (-webkit-min-device-pixel-ratio:1.5),(min--moz-device-pixel-ratio:1.5),(-o-min-device-pixel-ratio:1.5/1),(min-device-pixel-ratio:1.5),(min-resolution:138dpi),(min-resolution:1.5dppx) {
          .dropzone .dz-default.dz-message {
            background-image: url("../img/spritemap@2x.png");
            -webkit-background-size: 428px 406px;
            -moz-background-size: 428px 406px;
            background-size: 428px 406px;
          }
        }
        .dropzone .dz-default.dz-message span {
          display: none;
        }
        .dropzone.dz-square .dz-default.dz-message {
          background-position: 0 -123px;
          width: 268px;
          margin-left: -134px;
          height: 174px;
          margin-top: -87px;
        }
        .dropzone.dz-drag-hover .dz-message {
          opacity: 0.15;
          -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=15)";
          filter: alpha(opacity=15);
        }
        .dropzone.dz-started .dz-message {
          display: block;
          opacity: 0;
          -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
          filter: alpha(opacity=0);
        }
        .dropzone .dz-preview,
        .dropzone-previews .dz-preview {
          -webkit-box-shadow: 1px 1px 4px rgba(0,0,0,0.16);
          box-shadow: 1px 1px 4px rgba(0,0,0,0.16);
          font-size: 14px;
        }
        .dropzone .dz-preview.dz-image-preview:hover .dz-details img,
        .dropzone-previews .dz-preview.dz-image-preview:hover .dz-details img {
          display: block;
          opacity: 0.1;
          -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=10)";
          filter: alpha(opacity=10);
        }
        .dropzone .dz-preview.dz-success .dz-success-mark,
        .dropzone-previews .dz-preview.dz-success .dz-success-mark {
          opacity: 1;
          -ms-filter: none;
          filter: none;
        }
        .dropzone .dz-preview.dz-error .dz-error-mark,
        .dropzone-previews .dz-preview.dz-error .dz-error-mark {
          opacity: 1;
          -ms-filter: none;
          filter: none;
        }
        .dropzone .dz-preview.dz-error .dz-progress .dz-upload,
        .dropzone-previews .dz-preview.dz-error .dz-progress .dz-upload {
          background: #ee1e2d;
        }
        .dropzone .dz-preview .dz-error-mark,
        .dropzone-previews .dz-preview .dz-error-mark,
        .dropzone .dz-preview .dz-success-mark,
        .dropzone-previews .dz-preview .dz-success-mark {
          display: block;
          opacity: 0;
          -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
          filter: alpha(opacity=0);
          -webkit-transition: opacity 0.4s ease-in-out;
          -moz-transition: opacity 0.4s ease-in-out;
          -o-transition: opacity 0.4s ease-in-out;
          -ms-transition: opacity 0.4s ease-in-out;
          transition: opacity 0.4s ease-in-out;
          background-image: url("../img/spritemap.png");
          background-repeat: no-repeat;
        }
        @media all and (-webkit-min-device-pixel-ratio:1.5),(min--moz-device-pixel-ratio:1.5),(-o-min-device-pixel-ratio:1.5/1),(min-device-pixel-ratio:1.5),(min-resolution:138dpi),(min-resolution:1.5dppx) {
          .dropzone .dz-preview .dz-error-mark,
          .dropzone-previews .dz-preview .dz-error-mark,
          .dropzone .dz-preview .dz-success-mark,
          .dropzone-previews .dz-preview .dz-success-mark {
            background-image: url("../img/spritemap@2x.png");
            -webkit-background-size: 428px 406px;
            -moz-background-size: 428px 406px;
            background-size: 428px 406px;
          }
        }
        .dropzone .dz-preview .dz-error-mark span,
        .dropzone-previews .dz-preview .dz-error-mark span,
        .dropzone .dz-preview .dz-success-mark span,
        .dropzone-previews .dz-preview .dz-success-mark span {
          display: none;
        }
        .dropzone .dz-preview .dz-error-mark,
        .dropzone-previews .dz-preview .dz-error-mark {
          background-position: -268px -123px;
        }
        .dropzone .dz-preview .dz-success-mark,
        .dropzone-previews .dz-preview .dz-success-mark {
          background-position: -268px -163px;
        }
        .dropzone .dz-preview .dz-progress .dz-upload,
        .dropzone-previews .dz-preview .dz-progress .dz-upload {
          -webkit-animation: loading 0.4s linear infinite;
          -moz-animation: loading 0.4s linear infinite;
          -o-animation: loading 0.4s linear infinite;
          -ms-animation: loading 0.4s linear infinite;
          animation: loading 0.4s linear infinite;
          -webkit-transition: width 0.3s ease-in-out;
          -moz-transition: width 0.3s ease-in-out;
          -o-transition: width 0.3s ease-in-out;
          -ms-transition: width 0.3s ease-in-out;
          transition: width 0.3s ease-in-out;
          -webkit-border-radius: 2px;
          border-radius: 2px;
          position: absolute;
          top: 0;
          left: 0;
          width: 0%;
          height: 100%;
          background-image: url("../img/spritemap.png");
          background-repeat: repeat-x;
          background-position: 0px -400px;
        }
        @media all and (-webkit-min-device-pixel-ratio:1.5),(min--moz-device-pixel-ratio:1.5),(-o-min-device-pixel-ratio:1.5/1),(min-device-pixel-ratio:1.5),(min-resolution:138dpi),(min-resolution:1.5dppx) {
          .dropzone .dz-preview .dz-progress .dz-upload,
          .dropzone-previews .dz-preview .dz-progress .dz-upload {
            background-image: url("../img/spritemap@2x.png");
            -webkit-background-size: 428px 406px;
            -moz-background-size: 428px 406px;
            background-size: 428px 406px;
          }
        }
        .dropzone .dz-preview.dz-success .dz-progress,
        .dropzone-previews .dz-preview.dz-success .dz-progress {
          display: block;
          opacity: 0;
          -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
          filter: alpha(opacity=0);
          -webkit-transition: opacity 0.4s ease-in-out;
          -moz-transition: opacity 0.4s ease-in-out;
          -o-transition: opacity 0.4s ease-in-out;
          -ms-transition: opacity 0.4s ease-in-out;
          transition: opacity 0.4s ease-in-out;
        }
        .dropzone .dz-preview .dz-error-message,
        .dropzone-previews .dz-preview .dz-error-message {
          display: block;
          opacity: 0;
          -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
          filter: alpha(opacity=0);
          -webkit-transition: opacity 0.3s ease-in-out;
          -moz-transition: opacity 0.3s ease-in-out;
          -o-transition: opacity 0.3s ease-in-out;
          -ms-transition: opacity 0.3s ease-in-out;
          transition: opacity 0.3s ease-in-out;
        }
        .dropzone .dz-preview:hover.dz-error .dz-error-message,
        .dropzone-previews .dz-preview:hover.dz-error .dz-error-message {
          opacity: 1;
          -ms-filter: none;
          filter: none;
        }
        .dropzone a.dz-remove,
        .dropzone-previews a.dz-remove {
          background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fafafa), color-stop(1, #eee));
          background-image: -webkit-linear-gradient(top, #fafafa 0, #eee 100%);
          background-image: -moz-linear-gradient(top, #fafafa 0, #eee 100%);
          background-image: -o-linear-gradient(top, #fafafa 0, #eee 100%);
          background-image: -ms-linear-gradient(top, #fafafa 0, #eee 100%);
          background-image: linear-gradient(top, #fafafa 0, #eee 100%);
          -webkit-border-radius: 2px;
          border-radius: 2px;
          border: 1px solid #eee;
          text-decoration: none;
          display: block;
          padding: 4px 5px;
          text-align: center;
          color: #aaa;
          margin-top: 26px;
        }
        .dropzone a.dz-remove:hover,
        .dropzone-previews a.dz-remove:hover {
          color: #666;
        }
        @-moz-keyframes loading {
          0% {
            background-position: 0 -400px;
          }

          100% {
            background-position: -7px -400px;
          }
        }
        @-webkit-keyframes loading {
          0% {
            background-position: 0 -400px;
          }

          100% {
            background-position: -7px -400px;
          }
        }
        @-o-keyframes loading {
          0% {
            background-position: 0 -400px;
          }

          100% {
            background-position: -7px -400px;
          }
        }
        @-ms-keyframes loading {
          0% {
            background-position: 0 -400px;
          }

          100% {
            background-position: -7px -400px;
          }
        }
        @keyframes loading {
          0% {
            background-position: 0 -400px;
          }

          100% {
            background-position: -7px -400px;
          }
        }

	.form-horizontal.form-bordered .form-group>div,
	.form-horizontal.form-bordered .form-group {
		min-height: 131px;
	}
        
        .modal-body ul {
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

    </style>

    <link href="/assets/admin/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css" rel="stylesheet" />
@stop

@section('conteudo')

    <div id="content" class="content">

        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Form Stuff</a></li>
            <li class="active">Form Elements</li>
        </ol>



        @if(preg_match("/_/",$class))
            <h1 class="page-header"> {{Str::studly( explode("_",$class)[1] )}}</h1>
        @else
            <h1 class="page-header"> {{Str::studly( $class )}}</h1>
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
                        
                            <input class="form-control" type="hidden" value="{{$obj['id']}}" name="id" />

                            <div class="row">

                                @foreach ($colunas as $row)

                                    @if ($row['campo'] != "id")

                                        @if ( preg_match('/text/', $row['tipo']) || preg_match('/smalltext/', $row['tipo']) || preg_match('/mediumtext/', $row['tipo'])  || preg_match('/longtext/', $row['tipo']) )
                                            
                                            <div class="form-group col-md-12">

                                                <label style="margin:10px 0;">

                                                    @if( preg_match("/b_/",$row['campo']) || preg_match("/id_/",$row['campo'])) 
                                                        {{ explode("_",$row['campo'])[ sizeof(explode("_",$row['campo'])) -1 ] }}
                                                    @else 
                                                        {{ $row['campo'] }}
                                                    @endif

                                                    @if($row['null'] == "NO") 
                                                        *
                                                    @endif

                                                </label>

                                                <textarea name="{{ $row['campo'] }}" rows="6" style="width:100%">{{$obj[$row['campo']]}}</textarea>

                                            </div>

                                        @else

                                            <div class="form-group col-md-6">

                                                <label class="control-label col-md-4 ui-sortable">
                                                    @if( preg_match("/b_/",$row['campo']) || preg_match("/id_/",$row['campo'])) 
                                                        {{ explode("_",$row['campo'])[ sizeof(explode("_",$row['campo'])) -1 ] }}
                                                    @else 
                                                        {{ $row['campo'] }}
                                                    @endif

                                                    @if($row['null'] == "NO") 
                                                        *
                                                    @endif
                                                </label>

                                                <div class="col-md-8 ui-sortable">

                                                    @if ( preg_match('/enum/', $row['tipo']) )

                                                        <select name="{{$row['campo']}}" class="form-control">

                                                            @if ( isset($obj[$row['campo']]) ) 
                                                                <option value="{{$obj[$row['campo']]}}" selected>{{$obj[$row['campo']]}}</option>
                                                            @endif

                                                            @foreach($row['opcoes'] as $op)

                                                                <option value="{{$op}}">{{$op}}</option>

                                                            @endforeach

                                                        </select>

                                                    @elseif ( preg_match('/date/', $row['tipo'], $i) )

                                                        <div class="input-group date" id="datetimepicker_{{$row['campo']}}">
                                                            <input type="text" class="form-control" name="{{$row['campo']}}" value="{{$obj[$row['campo']]}}">
                                                            
                                                            <span class="input-group-addon">
                                                              <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>

                                                    @else

                                                        @if ( preg_match('/id_/', $row['campo']) && !preg_match('/id_gb_imagem/', $row['campo']) )

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

                                                                      @if( $obj[$row['campo']] == $value['id'])
                                                                        <option value="{{$value['id']}}" selected>
                                                                      @else
                                                                        <option value="{{$value['id']}}">
                                                                      @endif
                                                                       	    <?php
										 $categ = $value['nome'];
									    ?> 
                                                                            {{$value['nome']}}
                                                                        </option>
                                                                    @elseif(!empty($value['categoria']))
                                                                        
                                                                        @if( $obj[$row['campo']] == $value['id'])
                                                                          <option value="{{$value['id']}}" selected>
                                                                        @else
                                                                          <option value="{{$value['id']}}">
                                                                        @endif
									    <?php
										$categ = $value['categoria'];
									    ?>
                                                                            {{$value['categoria']}}
                                                                        </option>
                                                                    @elseif(!empty($value['email']))
                                                                        
                                                                          @if( $obj[$row['campo']] == $value['id'])
                                                                            <option value="{{$value['id']}}" selected>
                                                                          @else
                                                                            <option value="{{$value['id']}}">
                                                                          @endif

                                                                            {{$value['email']}}
                                                                        </option>
                                                                    @endif                                                              

                                                                @endforeach

                                                            </select>

                                                        @elseif ( $row['campo'] == "id_gb_imagem")

                                                            <a id="trigger-banco-imagens" href="#banco-imagens" class="banco-imagens" data-toggle="modal" style="width:100%;display:block">
                                                                <i style="font-size: 30px; margin-right:10px;" class="fa fa-picture-o"></i><span>Clique aqui para selecionar uma imagem</span> 
                                                            </a>
                                                            <b style="display:block; margin-top:10px;">OU add nova imabem</b>
                                                            <div>  
                                                                <input class="form-control" type="file" value="" name="{{ $row['campo'] }}"  placeholder="{{ $row['campo'] }}" style="float: left; margin-right: 10px; margin-top:10px;" /> 
                                                            </div>

                                                        @elseif ( $row['campo'] == "cor" || $row['campo'] == "hexa")

                                                          <div class="input-group colorpicker-component" data-color="{{$obj[$row['campo']]}}" data-color-format="rgb"  id="colorpicker-prepend">
                                                              <input class="form-control" type="text" value="{{$obj[$row['campo']]}}" name="{{ $row['campo'] }}" placeholder="{{ $row['campo'] }}" />
                                                              <span class="input-group-addon"><i></i></span>
                                                          </div>

                                                        @elseif ( preg_match('/b_/', $row['campo']) )

                                                            @if ( !empty($obj[$row['campo']]) )
                                                                <input type="checkbox" name="{{ $row['campo'] }}" data-render="switchery" checked />
                                                            @else
                                                                <input type="checkbox" name="{{ $row['campo'] }}" data-render="switchery" />
                                                            @endif

                                                        @elseif ( $row['campo'] == "banner" || $row['campo'] == "imagem" || $row['campo'] == "imagem_mobile" )

                                                            <input class="form-control" type="file" value="{{$obj[$row['campo']]}}" name="{{ $row['campo'] }}" placeholder="{{ $row['campo'] }}" />

                                                        @else

                                                            <input class="form-control" type="text" value="{{$obj[$row['campo']]}}" name="{{ $row['campo'] }}" placeholder="{{ $row['campo'] }}" />

                                                        @endif
                                                      
                                                    @endif

                                                </div>

                                            </div>

                                        @endif

                                    @endif

                                @endforeach

                            </div>

			    @if($class == "ed_materia") 
				<div class="row" style="margin-top:20px;">
					<a class="btn btn-success col-md-offset-4 col-md-4" href="http://www.sexy17.com.br/{{Str::slug($categ)}}/{{Str::slug($obj['titulo'])}}-{{$obj['id']}}" target="_blank"> Visualizar matéria </a>
				</div>
			    @endif

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

        @if($class == "usr_usuario")

          <?php
            $perfil = App\UsrPerfil::where('id_usr_usuario',$obj['id'])->first();
          ?>

          <div class="row">
                     
            <div class="col-md-12">

              <div class="panel panel-inverse" data-sortable-id="form-stuff-2">

                <div class="panel-heading">

                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>

                    <h4 class="panel-title">Editar Perfil</h4>

                </div>

                <div class="panel-body">

                    {{ Form::open(['url' => '/salvar/usr_perfil', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal form-bordered', 'role' => 'form']) }}


                    <input type="hidden" value="{{ !empty($perfil->id) ? $perfil->id : 0 }}" name="id" />
                    <input type="hidden" value="{{$obj['id']}}" name="id_usr_usuario" />

                    <div class="row">

                      <div class="form-group col-md-6">

                        <label class="control-label col-md-4 ui-sortable"> Nome *</label>

                        <div class="col-md-8 ui-sortable">

                          <input class="form-control" type="text" value="{{ !empty($perfil->nome) ? $perfil->nome : 0 }}" name="nome" placeholder="Nome" />

                        </div>

                      </div>

                      <div class="form-group col-md-6">

                        <label class="control-label col-md-4 ui-sortable"> Sobrenome *</label>

                        <div class="col-md-8 ui-sortable">

                          <input class="form-control" type="text" value="{{ !empty($perfil->sobrenome) ? $perfil->sobrenome : 0 }}" name="sobrenome" placeholder="Sobrenome" />

                        </div>

                      </div>

                      <div class="form-group col-md-6">

                        <label class="control-label col-md-4 ui-sortable"> Imagem </label>

                        <div class="col-md-8 ui-sortable">
                                
                                <a href="#banco-imagens" class="banco-imagens" data-toggle="modal" style="width:100%;display:block">
                                        <i style="font-size: 30px; margin-right:10px;" class="fa fa-picture-o"></i>
                                        <span>Clique aqui para selecionar uma imagem</span> 
                                </a>
                                
                                <b style="display:block; margin-top:10px;">OU add nova imabem</b>

                                <input class="form-control" type="file" value="" name="id_gb_imagem"  placeholder="imagem" style="float: left; margin-right: 10px; margin-top:10px;" /> 

                        </div>

                      </div>

                      <div class="form-group col-md-6">

                        <label class="control-label col-md-4 ui-sortable"> CPF *</label>

                        <div class="col-md-8 ui-sortable">

                          <input class="form-control" type="text" value="{{ !empty($perfil->cpf) ? $perfil->cpf : 0 }}" name="cpf" placeholder="CPF"/>

                        </div>

                      </div>

                      <div class="form-group col-md-6">

                        <label class="control-label col-md-4 ui-sortable"> RG </label>

                        <div class="col-md-8 ui-sortable">

                          <input class="form-control" type="text" value="{{ !empty($perfil->rg) ? $perfil->rg : 0 }}" name="rg" placeholder="RG"/>

                        </div>

                      </div>

                      <div class="form-group col-md-6">

                        <label class="control-label col-md-4 ui-sortable"> Sexo </label>

                        <div class="col-md-8 ui-sortable">

                          <select name="sexo" class="form-control">
                            <option value="0">Selecione</option>
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                          </select>

                        </div>

                      </div>

                      <div class="form-group col-md-6">

                        <label class="control-label col-md-4 ui-sortable"> Data Nascimento </label>

                        <div class="col-md-8 ui-sortable">

                         <div class="input-group date" id="datetimepicker_nascimento">
                              <input type="text" class="form-control" name="data_nasc" value="{{ !empty($perfil->data_nasc) ? $perfil->data_nasc : 0 }}">
                              
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>

                        </div>

                      </div>

                      <div class="form-group col-md-6">

                        <label class="control-label col-md-4 ui-sortable"> Telefone </label>

                        <div class="col-md-8 ui-sortable">

                          <input type="text" class="form-control" name="telefone" value="{{ !empty($perfil->telefone) ? $perfil->telefone : 0 }}">
                         
                        </div>

                      </div>

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

        @endif        

        @if($class == "ed_capa" || $class == "ed_materia")

            <div id="live-editor-forms" class="row">
                         
                <div class="col-md-12">

                    <div class="panel panel-inverse" data-sortable-id="form-stuff-2">

                        <div class="panel-heading">

                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>

                            <h4 class="panel-title">Live editor de capas</h4>

                        </div>

                        <div class="panel-body">

                            @if($class == "ed_capa")
                                <iframe src="/live-editor/capa/{{$obj->id}}" width="100%" height="700px;" style="border:none;overflow:auto;"></iframe>
                            @else
                                <iframe src="/live-editor/materia/{{$obj->id}}" width="100%" height="700px;" style="border:none;overflow:auto;"></iframe>
                            @endif

                        </div>

                    </div>

                </div>

                <div class="col-md-12">

                  <div id="modulo" class="panel panel-inverse" data-sortable-id="form-wysiwyg-2" style="display:none;">

                    <div class="panel-heading">

                      <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                      </div>

                      <h4 class="panel-title">Editar Módulo</h4>

                    </div>

                    <div class="panel-body panel-form">

                      {{ Form::open(['url' => '/live-editor/salvar/ed_modulo', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'submit-type' => 'ajax', 'class' => 'form-horizontal form-bordered', 'role' => 'form']) }}

                        <input type="hidden" name="id"        id="id_ed_mod" value="">

                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Layout: </label>
                          <div class="col-md-8 ui-sortable">
                            <select class="form-control" name="layout">

                              <option value="texto foto" selected="selected">Texto Foto</option>
                              <option value="foto texto">Foto Texto</option>

                            </select>
                          </div>

                        </div>

                        <div class="col-md-12" style="margin-top:20px; margin-bottom:20px;">

                          <button type="submit" class="btn btn-success">Salvar</button>

                        </div>

                      {{ Form::close() }}

                    </div>

                  </div>


                  <div id="conteudo" class="panel panel-inverse" data-sortable-id="form-wysiwyg-2" style="display:none;">

                    <div class="panel-heading">

                      <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                      </div>

                      <h4 class="panel-title">Editar Conteúdo</h4>

                    </div>

                    <div class="panel-body panel-form">

                      {{ Form::open(['url' => '/live-editor/salvar/ed_conteudo', 'method' => 'POST',  'id' => 'mdulo-form', 'submit-type' => 'ajax', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal form-bordered', 'role' => 'form']) }}


                        <input type="hidden" name="id"        id="id_ed_conteudo" value="">
                        <input type="hidden" name="id_ed_modulo"  id="id_ed_modulo" value="">

                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Titulo: </label>
                          <div class="col-md-8 ui-sortable">
                            <input type="text" name="titulo" class="form-control" value="" placeholder="Título">
                          </div>

                        </div>
                       
                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Imagem: </label>
                          <div class="col-md-8 ui-sortable">

                                <a href="#banco-imagens" class="banco-imagens" data-toggle="modal" style="width:100%;display:block">
                                        <i style="font-size: 30px; margin-right:10px;" class="fa fa-picture-o"></i>
                                        <span>Clique aqui para selecionar uma imagem</span> 
                                </a>

                                <b style="display:block; margin-top:10px;">OU add nova imabem</b>
                                
                                <input class="btn btn-default" id="id_gb_imagem" type="file" name="id_gb_imagem">

                          </div>

                        </div>
                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Link Label: </label>
                          <div class="col-md-8 ui-sortable">
                            <input type="text" name="link_label" class="form-control" value="" placeholder="Link">
                          </div>

                        </div>
                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Link: </label>
                          <div class="col-md-8 ui-sortable">
                            <input type="text" name="link" class="form-control" value="" placeholder="Link">
                          </div>

                        </div>
                        
                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Video: </label>
                          <div class="col-md-8 ui-sortable">
                            <input type="text" name="video" class="form-control" value="" placeholder="Link">
                          </div>

                        </div>
                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Layout: </label>
                          <div class="col-md-8 ui-sortable">
                            <select class="form-control" name="layout">

                              <option value="texto foto" selected="selected">Texto Foto</option>
                              <option value="foto texto">Foto Texto</option>

                            </select>
                          </div>

                        </div>

                        <div class="form-group col-md-12" style="margin-top:20px; padding-bottom:20px;">

                          <label> Texto: </label>
                          <textarea class="textarea form-control" name="texto" id="wysihtml5" placeholder="Enter text ..." rows="12"></textarea>

                        </div>
                        <div class="col-md-12" style="margin-top:20px; margin-bottom:20px;">

                          <button type="submit" class="btn btn-success">Salvar</button>

                          <a href="/excluir/ed_conteudo"  class="btn btn-danger remove pull-right" style="color:#fff; margin-right:10px;">Remover</a>

                        </div>

                      {{ Form::close() }}

                    </div>

                  </div>

                  <div id="linha" class="panel panel-inverse" style="display:none;">

                    <div class="panel-heading">

                      <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                      </div>

                      <h4 class="panel-title">Editar Linha</h4>

                    </div>

                    <div class="panel-body panel-form">

                      {{ Form::open(['url' => '/live-editor/salvar/ed_linha', 'method' => 'POST', 'submit-type' => 'ajax', 'class' => 'form-horizontal form-bordered', 'role' => 'form']) }}

                        @if ($class == "ed_capa")
                          <input type="hidden" name="id_ed_capa"    id="id_ed_capa"    value="{{$obj['id']}}">
                        @else
                          <input type="hidden" name="id_ed_materia" id="id_ed_materia" value="{{$obj['id']}}">
                        @endif
                        
                        <input type="hidden" name="id" id="id_ed_linha"   value="">

                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable">Ativo: </label>

                          <div class="col-md-8 ui-sortable">
                            <input type="checkbox" name="b_ativo" data-render="switchery" />
                          </div>

                        </div>

                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Tipo: </label>

                          <div class="col-md-8 ui-sortable">
                            <select class="form-control" name="tipo">

                              <option value="normal" selected="selected">Normal</option>
                              <option value="slider">Slider</option>
                              <option value="slider boxes">Slider Boxes</option>
                              <option value="paralax">Paralax</option>

                            </select>
                          </div>

                        </div>

                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Titulo da linha: </label>

                          <div class="col-md-8 ui-sortable">
                            <input type="text" class="form-control" name="titulo" value="">
                          </div>

                        </div>

                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Quantidade de colunas: </label>

                          <div class="col-md-8 ui-sortable">
                            <select class="form-control" name="colunas">

                              <option value="1" selected="selected">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>

                            </select>
                          </div>

                        </div>
                        
                        <div class="form-group col-md-6">

                          <label class="control-label col-md-4 ui-sortable"> Alinhamento das colunas: </label>
                          <div class="col-md-8 ui-sortable">
                            <select class="form-control" name="alinhamento">

                              <option value="esquerda">Esquerda</option>
                              <option value="direita">Direita</option>
                              <option value="centro" selected="selected">Centro</option>

                            </select>
                          </div>

                        </div>

                        <div class="col-md-12" style="margin-top:20px; margin-bottom:20px;">

                          <button type="submit" class="btn btn-success">Salvar</button>
                          <a href="/excluir/ed_linha"  class="btn btn-danger remove pull-right" style="color:#fff; margin-right:10px;">Remover</a>

                        </div>

                      {{ Form::close() }}

                    </div>

                  </div>

                </div>

            </div>

        @endif

        @if($class == "ec_produto")

            <div class="row">
                     
                <div class="col-md-12">

                    <div class="panel panel-inverse" data-sortable-id="form-stuff-2">

                        <div class="panel-heading">

                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>

                            <h4 class="panel-title">Salvar imagens relacionadas</h4>

                        </div>

                        <div class="panel-body">
  
                            {{ Form::open(['url' => '/salvar/ec_produto/imagem', 'method' => 'POST', 'id' => 'my-dropzone', 'class' => 'dropzone', 'role' => 'form']) }}
                                <input type="hidden" name="id" value="{{$obj['id']}}">
                                <div class="fallback">
                                    <input name="imagem" type="file" multiple="" />
                                </div>
                            {{ Form::close() }}

                        </div>

                    </div>

                </div>

            </div>

        @endif

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

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/assets/admin/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="/assets/admin/plugins/masked-input/masked-input.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="/assets/admin/plugins/password-indicator/js/password-indicator.js"></script>
    <script src="/assets/admin/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
    <script src="/assets/admin/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
    <script src="/assets/admin/plugins/jquery-tag-it/js/tag-it.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-daterangepicker/moment.js"></script>
    <script src="/assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/assets/admin/plugins/select2/dist/js/select2.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <script src="/assets/admin/js/dropzone.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/admin/plugins/ckeditor/ckeditor.js"></script>
    <script src="/assets/admin/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="/assets/admin/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
    <script src="/assets/admin/js/form-wysiwyg.demo.js"></script>
    <script src="/assets/admin/plugins/switchery/switchery.min.js"></script>
    <script src="/assets/admin/plugins/powerange/powerange.min.js"></script>
    <script src="/assets/admin/js/form-slider-switcher.demo.js"></script>
    <script src="/assets/admin/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="/assets/admin/js/ui-modal-notification.demo.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
        $(document).ready(function() {

            var form = null;

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


            $("#trigger-banco-imagensi, a.banco-imagens").click(function(e){

                $.get("/banco-imagens").success(function(result){
                    $("#banco-imagens .modal-body").html(result);    
                    binds();          
                }); 

            });

            

            $("input[type=file]").change(function(e) {
                var obj = $(e.target).parents("form");
                obj.find(".imagem-hidden").remove();
            });

            $("a.banco-imagens").bind("click", function(e){
                form = $(e.target).parents("form");
            });

            Dropzone.options.myDropzone = {
            
                init: function() {
                    
                    this.on("addedfile", function(file) {

                        var removeButton = Dropzone.createElement("<button data-id=\""+file.id+"\">Remove file</button>");
                        var _this = this;

                        removeButton.addEventListener("click", function(e) {

                            e.preventDefault();
                            e.stopPropagation();

                            var obj = $(e.target);
                            
                            _this.removeFile(file);

                            $.ajax({
                                type: "GET",
                                url: "/excluir/produto/imagem/"+obj.attr("data-id")
                            });

                        });

                        file.previewElement.appendChild(removeButton);
                    });
                
                }
            
            };

            setTimeout(function(){

                @if(isset($imagens))
                    @foreach($imagens as $imagem)

                        var mockFile = { name: '{{explode("/",$imagem->imagem)[sizeof(explode("/",$imagem->imagem))-1]}}', size: '{{$imagem->tamanho}}', id: '{{$imagem->id}}' };

                        Dropzone.instances[0].emit("addedfile", mockFile);
                        Dropzone.instances[0].emit("thumbnail", mockFile, '{{$imagem->imagem}}');

                    @endforeach 
                @endif

            }, 3000);

            FormSliderSwitcher.init();
            FormWysihtml5.init();

        });

       @if($class == "ed_capa" || $class == "ed_materia")

        var liveEditable = function(type, obj, modulo) {

            var linha = $("#linha");
            var conteudo = $("#conteudo");
            var mod = $("#modulo");


            linha.hide();
            conteudo.hide();

            if (type == "conteudo") {

              conteudo.show();
//              mod.show();

              conteudo.find("#id_ed_conteudo").val(obj.attr("data-edit-conteudo"));
              conteudo.find("#id_ed_modulo").val(obj.attr("data-edit-modulo"));
  //            mod.find("#id_ed_mod").val(obj.attr("data-edit-modulo"));
   
                if (modulo.find(".titulo").html()) conteudo.find("input[name=titulo]").val(modulo.find(".titulo").html());
                else conteudo.find("input[name=titulo]").val("");
                
                if (modulo.find(".texto").html()) $(conteudo.find("iframe")[0].contentWindow.document).find("body").html(modulo.find(".texto").html());
                else  $(conteudo.find("iframe")[0].contentWindow.document).find("body").html("");
                
                if (modulo.find(".video").html()) $(conteudo.find("input[name=video]")).val(modulo.find(".video").html().trim());
                else  $(conteudo.find("input[name=video]")).val("");
  
            } else {
             
              linha.show();
              
              linha.find("#id_ed_linha").val(obj.attr("data-edit-linha"))

            }

        }

        $("#live-editor-forms a.remove").click(function(e){
          e.preventDefault();
          
          var obj = $(e.target);
          var value = obj.parents("form").find("input[name=id]").val();
  
          $.ajax({
            method: "POST",
            url: obj.attr("href"),
            data: { id: value, _token: "{{ csrf_token() }}" }
          })
          .done(function( msg ) {
            $("iframe")[0].contentWindow.location.reload();
          });

        });

        $("#live-editor-forms form").submit(function(e){
          e.preventDefault();

          var obj = $(e.target);

          var data = new FormData(obj[0]),
            url = obj.attr("action");

          $.ajax({
            url: url,
            type: 'POST',
            data: data,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

              if(data.tipo == "success") $("iframe")[0].contentWindow.location.reload();

            }
          });         

        });

        @endif

    </script>
@stop
