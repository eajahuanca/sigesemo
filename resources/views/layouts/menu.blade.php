<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
	<li class="header">MENU DE NAVEGACION</li>
	<li><a href="."><i class="fa fa-tachometer text-aqua"></i> Principal</a></li>
	@can('previous.index')
	<li class="" id="liprevious">
		<a href="{{ route('previous.index') }}">
		  	<i class="fa fa-suitcase"></i> <span>Documentación Previa</span>
		  	<span class="pull-right-container">
				<small class="label pull-right bg-red">1</small>
		  	</span>
		</a>
	</li>
	@endcan

	<li class="" id="lipiechart">
		<a href="{{ url('reportchart') }}">
				<i class="fa fa-pie-chart"></i> <span>D.P. Gráfico</span>
				<span class="pull-right-container">
				<small class="label pull-right bg-yellow">1</small>
				</span>
		</a>
	</li>

	@can('elefin.index')
	<li class="" id="lielefin">
		<a href="{{ route('elefin.index') }}">
		  	<i class="fa fa-gear"></i> <span>Cum. Eleg. Financiero</span>
		  	<span class="pull-right-container">
				<small class="label pull-right bg-yellow">1</small>
		  	</span>
		</a>
	</li>
	@endcan
	@can('eletec.index')
	<li class="" id="lieletec">
		<a href="{{ route('eletec.index') }}">
		  	<i class="fa fa-gear"></i> <span>Cum. Eleg. Técnico</span>
		  	<span class="pull-right-container">
				<small class="label pull-right bg-blue">1</small>
		  	</span>
		</a>
	</li>
	@endcan
	@can('eleleg.index')
	<li class="" id="lieleleg">
		<a href="{{ route('eleleg.index') }}">
		  	<i class="fa fa-gear"></i> <span>Cum. Eleg. Legal</span>
		  	<span class="pull-right-container">
				<small class="label pull-right bg-aqua">1</small>
		  	</span>
		</a>
	</li>
	@endcan

	<li class="" id="lifichatecnica">
		<a href="{{ route('ficha.index') }}">
			<i class="fa fa-edit"></i> <span>Ficha Técnica</span>
			<span class="pull-right-container">
				<small class="label pull-right bg-orange">?</small>
		  	</span>
		</a>
	</li>

	
	@can('users.index')
	<li class="treeview" id="liparametrizacion">
		<a href="#">
			<i class="fa fa-gear text-red"></i>
			<span>Parametrizaciones</span>
			<span class="pull-right-container">
				<span class="label label-warning pull-right">3</span>
			</span>
		</a>
		<ul class="treeview-menu">
			@can('users.listar')
			<li><a href="{{ route('users.listar') }}"><i class="fa fa-user"></i> Usuarios</a></li>
			@endcan
			@can('roles.index')
			<li><a href="{{ route('roles.index') }}"><i class="fa fa-list-ul"></i> Roles</a></li>
			@endcan
			@can('permisos.index')
			<li><a href="{{ url('/permisos') }}"><i class="fa fa-th-large"></i> Permisos</a></li>
			@endcan
		</ul>
	</li>
	@endcan
	
	<li class="treeview">
		<a href="#">
			<i class="fa fa-warning text-yellow"></i> <span>Para Conocer</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li><a><i class="fa fa-stop text-green"></i> <span>Correcto</span></a></li>
			<li><a><i class="fa fa-stop text-yellow"></i> <span>Advertencia</span></a></li>
			<li><a><i class="fa fa-stop text-red"></i> <span>Peligro</span></a></li>
			<li><a><i class="fa fa-stop text-aqua"></i> <span>Información</span></a></li>
		</ul>
	</li>
</ul>