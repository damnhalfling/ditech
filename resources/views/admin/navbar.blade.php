<div id="header" class="header navbar navbar-default navbar-fixed-top">

  <div class="container-fluid">

    <div class="navbar-header">
      
      <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> {{env('APP_NAME')}} </a>

      <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
        
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

      </button>

    </div>
    
    <ul class="nav navbar-nav navbar-right">

      <li class="dropdown navbar-user">
      
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">

          @if(!empty(Auth::user()->perfil->img_perfil))
            <img src="//assets.salvesalto.com.br{{Auth::user()->perfil->img_perfil}}" alt="Avatar">
          @else
            <i class="fa fa-user" style="margin-left:10px;  margin-top:5px;"></i>
          @endif

          @if(isset(Auth::user()->perfil->nome))
            <span class="hidden-xs">{{Auth::user()->perfil->nome}}</span> <b class="caret"></b>
          @else
            <span class="hidden-xs">{{Auth::user()->email}}</span> <b class="caret"></b>
          @endif
          
        </a>

        <ul class="dropdown-menu animated fadeInLeft">
        
          <li><a href="/logout">Log Out</a></li>

        </ul>

      </li>

    </ul>

  </div>

</div>
