<?php

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    //Roles
    Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
    Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
    Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');
    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:roles.show');

    //Permisos
    Route::get('permisos', 'PermisoController@index')->name('permisos.index')->middleware('permission:permisos.index');
    Route::get('permisos/create', 'PermisoController@create')->name('permisos.create')->middleware('permission:permisos.create');
    Route::post('permisos/store', 'PermisoController@store')->name('permisos.store')->middleware('permission:permisos.create');
    Route::get('permisos/{permiso}/edit', 'PermisoController@edit')->name('permisos.edit')->middleware('permission:permisos.edit');
    Route::put('permisos/{permiso}', 'PermisoController@update')->name('permisos.update')->middleware('permission:premisos.edit');
    Route::get('permisos/{permiso}', 'PermisoController@show')->name('permisos.show')->middleware('permission:permisos.show');

    //users
    Route::get('/perfil', 'UserController@perfilUsuario');
    Route::put('changeImg', 'UserController@cambiarImagenUsuario');
    Route::put('changePass', 'UserController@cambiarPasswordUsuario');
    Route::get('users', 'UserController@listarUsuario')->name('users.listar')->middleware('permission:users.listar');
    Route::get('users/nuevo', 'UserController@nuevoUsuario')->name('users.nuevo')->middleware('permission:users.nuevo');
    Route::post('users/guardar', 'UserController@guardarUsuario')->name('users.guardar')->middleware('permission:users.guardar');
    Route::get('users/{user}/editar', 'UserController@editarUsuario')->name('users.editar')->middleware('permission:users.editar');
    Route::put('users/{user}', 'UserController@actualizarUsuario')->name('users.modificar')->middleware('permission:users.modificar');
    Route::get('users/{user}', 'UserController@mostrarUsuario')->name('users.mostrar')->middleware('permission:users.mostrar');

    //Documentacion Previa
    Route::get('previous', 'PreviousController@index')->name('previous.index')->middleware('permission:previous.index');
    Route::get('previous/create', 'PreviousController@create')->name('previous.create')->middleware('permission:previous.create');
    Route::post('previous/store', 'PreviousController@store')->name('previous.store')->middleware('permission:previous.store');
    Route::get('previous/{previo}/edit', 'PreviousController@edit')->name('previous.edit')->middleware('permission:previous.edit');
    Route::put('previous/{previo}', 'PreviousController@update')->name('previous.update')->middleware('permission:previous.update');
    Route::get('previous/{previo}', 'PreviousController@show')->name('previous.show')->middleware('permission:previous.show');
    Route::get('reportchart','PreviousController@getPieChart');

    //Cumplimiento de Elegibilidad - FINANCIERO
    Route::get('elefin', 'ElegibleFinancieroController@index')->name('elefin.index')->middleware('permission:elefin.index');
    Route::get('elefin/{elegible}/create', 'ElegibleFinancieroController@create')->name('elefin.create')->middleware('permission:elefin.create');
    Route::post('elefin/store', 'ElegibleFinancieroController@store')->name('elefin.store')->middleware('permission:elefin.store');
    Route::get('elefin/{elegible}/edit', 'ElegibleFinancieroController@edit')->name('elefin.edit')->middleware('permission:elefin.edit');
    Route::put('elefin/{elegible}', 'ElegibleFinancieroController@update')->name('elefin.update')->middleware('permission:elefin.update');
    Route::get('elefin/{elegible}', 'ElegibleFinancieroController@show')->name('elefin.show')->middleware('permission:elefin.show');

    //Cumplimiento de elegibilidad - TECNICO
    Route::get('eletec', 'ElegibleTecnicoController@index')->name('eletec.index')->middleware('permission:eletec.index');
    Route::get('eletec/create', 'ElegibleTecnicoController@create')->name('eletec.create')->middleware('permission:eletec.create');
    Route::post('eletec/store', 'ElegibleTecnicoController@store')->name('eletec.store')->middleware('permission:eletec.store');
    Route::get('eletec/{elegible}/edit', 'ElegibleTecnicoController@edit')->name('eletec.edit')->middleware('permission:eletec.edit');
    Route::put('eletec/{elegible}', 'ElegibleTecnicoController@update')->name('eletec.update')->middleware('permission:eletec.update');
    Route::get('eletec/{elegible}', 'ElegibleTecnicoController@show')->name('eletec.show')->middleware('permission:eletec.show');

    //Cumplimiento de elegibilidad - LEGAL
    Route::get('eleleg', 'ElegibleLegalController@index')->name('eleleg.index')->middleware('permission:eleleg.index');
    Route::get('eleleg/create', 'ElegibleLegalController@create')->name('eleleg.create')->middleware('permission:eleleg.create');
    Route::post('eleleg/store', 'ElegibleTecnElegibleLegalControllericoController@store')->name('eleleg.store')->middleware('permission:eleleg.store');
    Route::get('eleleg/{elegible}/edit', 'ElegibleLegalController@edit')->name('eleleg.edit')->middleware('permission:eleleg.edit');
    Route::put('eleleg/{elegible}', 'ElegibleLegalController@update')->name('eleleg.update')->middleware('permission:eleleg.update');
    Route::get('eleleg/{elegible}', 'ElegibleLegalController@show')->name('eleleg.show')->middleware('permission:eleleg.show');

    //Municipios
    Route::get('getmunicipio/{depto}','MunicipioController@getMunicipio');

    Route::get('/home', 'HomeController@index');
});
