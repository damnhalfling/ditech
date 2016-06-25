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

@stop

@section('conteudo')
 	<div id="content" class="content">

        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Usuario</a></li>
            <li class="active">Criar</li>
        </ol>

        <h1 class="page-header"> Usuario <small> Editar de item </small></h1>

        <div class="row">
                     
            <div class="col-md-12">

                <div class="panel panel-inverse" data-sortable-id="form-stuff-2">

                    <div class="panel-heading">

                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>

                        <h4 class="panel-title">Novo Usuario</h4>
                        
                    </div>

                    <div class="panel-body">

						<form class="form-horizontal" role="form" action="/novo/usr_usuario" method="POST">

							<div class="form-group col-md-6">

								<label class="control-label col-md-4 ui-sortable">Email</label>

								<div class="col-md-8 ui-sortable">
									
									<input type="text" class="form-control" name="email" value="">
										
						        </div>

						    </div>

						    <div class="form-group col-md-6">

								<label class="control-label col-md-4 ui-sortable">Nivel</label>

								<div class="col-md-8 ui-sortable">
									<select class="form-control" name="nivel">
										<option value="0" selected>Site</option>
									    <option value="3">Logista</option>
									    <option value="4">Revendedora</option>
									    <option value="8">Redação</option>
									    <option value="9">Administrador</option>
									</select>
						        </div>

						    </div>

						    <div class="form-group col-md-6">

								<label class="control-label col-md-4 ui-sortable">Senha</label>

								<div class="col-md-8 ui-sortable">
									<input type="password" class="form-control" name="senha">
						        </div>

						    </div>

						    <div class="form-group col-md-6">

								<label class="control-label col-md-4 ui-sortable">Confirmar senha</label>

								<div class="col-md-8 ui-sortable">
									<input type="password" class="form-control" name="senha_confirmation">
						        </div>

						    </div>

							<div class="form-group col-md-6">
								<label class="control-label col-md-4 ui-sortable">Admin</label>

								<div class="col-md-8 ui-sortable">
					                <input type="checkbox" name="b_admin" data-render="switchery" >
						        </div>
						    </div>

							<div class="form-group col-md-6">
								<label class="control-label col-md-4 ui-sortable">Ativo</label>

								<div class="col-md-8 ui-sortable">
					                <input type="checkbox" name="b_ativo"  data-render="switchery" >
						        </div>
						    </div>


						    <div class="form-group col-md-12">
								<button type="submit" class="btn btn-success">Salvar</button>
							</div>

						</form>

					</div>

                </div>

            </div>

        </div>

    </div>

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
	    <!-- ================== END PAGE LEVEL JS ================== -->
	    
	    <script>
	    		$(document).ready(function() {
	    	   		FormSliderSwitcher.init();
	    		});
	   	</script>
@stop