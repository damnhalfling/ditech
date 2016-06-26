@extends('admin.container')

@section('conteudo')

	<div class="login login-with-news-feed">
	    
	    <div class="col-md-6 col-sm-6 col-xs-2">
	    
	        <div class="login-header">
	        
	            <div class="brand">
	                <span class="logo"></span> Cadastro
	            </div>
	            <div class="icon">
	                <i class="fa fa-sign-in"></i>
	            </div>

	        </div>
            
            @if(session('mensagem_erro'))
                <p>{{session('mensagem_erro')}}</p>
            @endif

	        <div class="login-content">
	            
                {{ Form::open(['url' => '/usuario/cadastrar', 'method' => 'POST', 'class' => "margin-bottom-0"]) }}
	                <div class="form-group m-b-15">
	                    <input type="text" class="form-control input-lg" name="email" placeholder="Email" />
	                </div>
	                <div class="form-group m-b-15">
	                    <input type="password" class="form-control input-lg" name="password" placeholder="Senha" />
	                </div>
                    <div class="form-group m-b-15">
	                    <input type="password" class="form-control input-lg" name="password_confirmation" placeholder="Corfimação de Senha" />
	                </div>

	                <div class="login-buttons">
                    	<button type="submit" class="btn btn-success btn-block btn-lg">Cadastrar</button>
	                </div>

                    <hr />
                    
                {{ Form::close() }}

	        </div>
	        
	    </div>
	    
	    <div class="col-md-6 col-sm-6 col-xs-2">
	    
	        <div class="login-header">
	        
	            <div class="brand">
	                <span class="logo"></span> Login 
	            </div>
	            <div class="icon">
	                <i class="fa fa-sign-in"></i>
	            </div>

	        </div>
	        
	        <div class="login-content">
	            
                {{ Form::open(['url' => '/usuario/verificar', 'method' => 'POST', 'class' => "margin-bottom-0"]) }}
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
                {{ Form::close() }}

	        </div>
	        
	    </div>
	    
	</div>

@stop
