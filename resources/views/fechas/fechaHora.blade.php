<?php
	function fechaHora($fecha){
		$fecha = explode('-', $fecha);
		$hora = explode(' ', $fecha[2]);
		return $hora[0].'/'.meses($fecha[1]).'/'.$fecha[0].' a horas : '.$hora[1];
	}

	function meses($mes){
		$arrayMes = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
		return $arrayMes[(int)$mes - 1];
	}

	function soloFecha($fecha){
		$fecha = explode('-', $fecha);
		$hora = explode(' ', $fecha[2]);
		return $hora[0].'/'.meses($fecha[1]).'/'.$fecha[0];
	}

	function soloHora($fecha){
		$fecha = explode('-', $fecha);
		$hora = explode(' ', $fecha[2]);
		return $hora[1];
	}
?>