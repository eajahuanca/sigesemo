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