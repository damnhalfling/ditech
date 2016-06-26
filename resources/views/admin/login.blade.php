@extends('admin.container')

@section('conteudo')

	<div class="login login-with-news-feed">
	    
	    <div class="news-feed">
	    
	        <div class="news-image" style="background-image:url('{{$feedInsta}}'); background-size:cover;"></div>
	    
	        <div class="news-caption">
	            <h4 class="caption-title"><i class="fa fa-diamond text-success"></i> Bem vindo</h4>
	        </div>

	    </div>
	    
	    <div class="right-content">
	    
	        <div class="login-header">
	        
	            <div class="brand">
	                <span class="logo"></span> Gestor de Salas
	            </div>
	            <div class="icon">
	                <i class="fa fa-sign-in"></i>
	            </div>

	        </div>
	        
	        <div class="login-content">
	            
                {{ Form::open(['url' => '/usuario/credencial', 'method' => 'POST', 'class' => "margin-bottom-0"]) }}
	                <div class="form-group m-b-15">
	                    <input type="text" class="form-control input-lg" name="email" placeholder="Email" />
	                </div>
	                <div class="form-group m-b-15">
	                    <input type="password" class="form-control input-lg" name="senha" placeholder="Senha" />
	                </div>

	                <div class="login-buttons">
                    	<button type="submit" class="btn btn-success btn-block btn-lg">Entrar</button>
	                </div>

                    <hr />
                    
                    <p class="text-center text-inverse">
	                    &copy; {{env('APP_NAME')}} All Right Reserved 2016
	                </p>
                {{ Form::close() }}

	        </div>
	        
	    </div>
	    
	</div>

@stop
