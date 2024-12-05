<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/logoc2.png')}}">
    <title>Transporte</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="{{route('inicio')}}" class="logo">
					<img src="{{asset('img/logoc2.png')}}" class="img-fluid" width="80" height="35" alt="">
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{{asset('img/user.jpg')}}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>{{Auth::user()->name}}</span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="{{route('inicio')}}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a>
                        </li>
						<li>
                            <a href="{{route('user.index')}}"><i class="fa fa-user"></i> <span>Utilizadores</span></a>
                        </li>
                        <li>
                            <a href="{{route('funcio.index')}}"><i class="fa fa-users"></i> <span>Funcionario</span></a>
                        </li>
                        <li>
                            <a href="{{route('motorista.index')}}"><i class="fa fa-id-card"></i> <span>Motoristas</span></a>
                        </li>
                        <li>
                            <a href="{{route('veiculo.index')}}"><i class="fa fa-truck"></i> <span>Veiculo</span></a>
                        </li>
                        <li>
                            <a href="{{route('manutecao.index')}}"><i class="fa fa-list"></i> <span>Tipo de Manutenção</span></a>
                        </li>
                        <li>
                            <a href="{{route('realizar.index')}}"><i class="fa fa-cog"></i> <span>Manutenção</span></a>
                        </li>
                        <li>
                            <a href="{{route('manutecao.index')}}"><i class="fa fa-cogs"></i> <span>Reparação</span></a>
                        </li>
                       
						
                    </ul>
                </div>
            </div>
        </div>
        @yield('mecanica')
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('js/Chart.bundle.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $(function(){
          $('.alert').fadeOut(5000)
        })
      </script>
</body>



</html>