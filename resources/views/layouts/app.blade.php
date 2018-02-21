
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>SISEMO</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('plugins/login/img/icofona.png') }}" />
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/bower_components/Ionicons/css/ionicons.min.css') }}">
	<!-- daterange picker -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/plugins/iCheck/all.css') }}">
	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/plugins/timepicker/bootstrap-timepicker.min.css') }}">
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/bower_components/select2/dist/css/select2.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/dist/css/AdminLTE.min.css') }}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{ asset('plugins/lte/dist/css/skins/_all-skins.min.css') }}">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	@yield('styles')
	
	<!--Plugins messages -->
	<link href="{{asset('plugins/toastr/toastr.min.css')}}" rel="stylesheet"/>
</head>	
<body class="hold-transition skin-green sidebar-mini">
	<div class="wrapper">
  		<header class="main-header">
			<!-- Logo -->
			<a href="." class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>LT</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Admin</b>LTE</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
    		<nav class="navbar navbar-static-top">
      			<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
      			<div class="navbar-custom-menu">
        			<ul class="nav navbar-nav">
          				@include('layouts.notification')
         	 			<!-- User Account -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="{{ asset(Auth::user()->us_imagen) }}" class="user-image" alt="{{ Auth::user()->us_nombre.' '.Auth::user()->us_paterno.' '.Auth::user()->us_materno }}">
								<span class="hidden-xs">{{ Auth::user()->us_nombre.' '.Auth::user()->us_paterno.' '.Auth::user()->us_materno }}</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="{{ asset(Auth::user()->us_imagen) }}" class="img-circle" alt="{{ Auth::user()->us_nombre.' '.Auth::user()->us_paterno.' '.Auth::user()->us_materno }}">
									<p>
										{{ Auth::user()->us_nombre.' '.Auth::user()->us_paterno.' '.Auth::user()->us_materno. ' - '.Auth::user()->idcargo }}
										<small>{{ Auth::user()->us_fechaingreso }}</small>
									</p>
								</li>
								<!--insertar user body, si es necesario-->
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="{{ url('/perfil') }}" class="btn btn-default btn-flat">Mis Datos</a>
									</div>
									<div class="pull-right">
										<a href="." class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Session</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->
						<li>
							<!--data-toggle="control-sidebar" adicionar en la etiqueta <a></a>-->
							<a href="." onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a>
						</li>
        			</ul>
      			</div>
    		</nav>
  		</header>
  		<!-- Left side column. contains the logo and sidebar -->
  		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="{{ asset(Auth::user()->us_imagen) }}" class="img-circle" alt="">
					</div>
					<div class="pull-left info">
						<p>{{ Auth::user()->us_cuenta }}</p>
						<a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
					</div>
				</div>
				@include('layouts.menu')
			</section>
			<!-- /.sidebar user panel-->
  		</aside>

		@include('layouts.body')

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			<b>Version</b> 1.0.1
			</div>
			<strong>Copyright &copy; 2018 <a href=".">Sistemas</a></strong> Todos los derechos son reservados.
		</footer>
		<!--insertar archivos de configuracion (config.blade.php) de skins y otros si es necesario -->

		<div class="control-sidebar-bg"></div>
	</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('plugins/lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('plugins/lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/lte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/lte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/lte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/lte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/lte/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('plugins/lte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/lte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('plugins/lte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('plugins/lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('plugins/lte/plugins/iCheck/icheck.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/lte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('plugins/lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('plugins/lte/dist/js/demo.js') }}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
{!! Toastr::render() !!}
@yield('scripts')

<!-- Page script -->
<script>
  	$(function () {
		//Initialize Select2 Elements
		$('.select2').select2()
		//Datemask dd/mm/yyyy
		$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
		//Datemask2 mm/dd/yyyy
		$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
		//Money Euro
		$('[data-mask]').inputmask()
		//Date range picker
		$('#reservation').daterangepicker()
		//Date range picker with time picker
		$('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
		//Date range as a button
		$('#daterange-btn').daterangepicker(
			{
				ranges   : {
				'Today'       : [moment(), moment()],
				'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month'  : [moment().startOf('month'), moment().endOf('month')],
				'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				startDate: moment().subtract(29, 'days'),
				endDate  : moment()
			},
			function (start, end) {
				$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
			}
		)
		//Date picker
		$('#datepicker').datepicker({
		autoclose: true
		})
		//Flat red color scheme for iCheck
		$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass   : 'iradio_flat-green'
		})
		//Colorpicker
		$('.my-colorpicker1').colorpicker()
		//color picker with addon
		$('.my-colorpicker2').colorpicker()
		//Timepicker
		$('.timepicker').timepicker({
		showInputs: false
		})
  	})
</script>
</body>
</html>
