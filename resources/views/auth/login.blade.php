<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SISEMO</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('plugins/login/img/icofona.png') }}" />
    <link rel="stylesheet prefetch" href="{{ asset('plugins/login/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/login/css/style.css') }}">
</head>
<body>
<div class="cont">
    <div class="demo">
        <div class="login">        
            <center class="login__cabecera">
                <img class="imagen" src="{{ asset('plugins/login/img/logo.jpg') }}"/>
                <p class="login__titulo">SISTEMA DE SEGUIMIENTO Y MONITOREO DE PROYECTOS</p>
			</center>
			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
            {!! Form::open(['route' => 'login', 'method' => 'POST', 'name' => 'frmlogin']) !!}
                <div class="login__form">
                    <div class="login__row">
                        <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                        </svg>
                        <input type="text" class="login__input name" placeholder="Cuenta de Usuario" name="email" id="email" autofocus value="{{ old('email') }}" />
                    </div>
                    <div class="login__row">
                        <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                        </svg>
                        <input type="password" class="login__input pass" placeholder="Contrasena" name="password" id="password"/>
                    </div>
                    <button type="submit" class="login__submit"><b>Iniciar Sesión</b></button>
                    <p class="login__signup">Olvido su contraseña? &nbsp;<a href="{{ route('password.request') }}">Recuperar</a></p>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script src="{{ asset('plugins/login/js/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/login/js/index.js') }}"></script>
</body>
</html>