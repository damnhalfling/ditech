<div id="sidebar" class="sidebar">

	<div data-scrollbar="true" data-height="100%">
		<a href="/">
			<ul class="nav">

				<li class="nav-profile">

					<div class="image">
				    	<i class="fa fa-user" style="margin-left:10px;  margin-top:5px;"></i>
					</div>

					<div class="info">

						@if(isset(Auth::user()->perfil->nome))
				        	{{Auth::user()->perfil->nome}}
				       	@else
				       		{{Auth::user()->email}}
			         	@endif

					</div>
			         
				</li>

			</ul>
		</a>
		
		<ul class="nav">

            <li class="has-sub">

                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-users"></i>
                    <span> Salas </span>
                </a>

                <ul class="sub-menu">
                    <li><a href="/listar/sala">Listar</a></li>
                    <li><a href="/criar/sala">Criar</a></li>
                </ul>

            </li>

            <li class="has-sub">
                
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-users"></i>
                    <span>Usuarios</span>
                </a>

                <ul class="sub-menu">
                    <li><a href="/listar/user">Listar</a></li>
                </ul>

            </li>

		</ul>

	</div>

</div>

<div class="sidebar-bg"></div>
