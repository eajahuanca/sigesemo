<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FICHA TECNICA</title>
    <style type="text/css">
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        table.tableizer-table {
            font-size: 12px;
            border: 1px solid #000000;
        }
        .tableizer-table td {
            padding: 4px;
            margin: 3px;
            border: 1px solid #000000;
        }
        .tableizer-table th {
            background-color: #104E8B;
            color: #FFF;
        }
        .tableBorder{
            border: 1px solid #000000;
            border-collapse: collapse;
        }
        .tableEspaciosTitulo{
            margin-bottom:2em;
            margin-top:-1em;
        }
        .tableEspacios{
            margin-bottom:2em;
            margin-top:-2em;
        }
        .nota,.impresion{
            font-style:italic;
            font-size:10px;
        }
        .observaciones{
            font-style:italic;
            font-size:11px;
        }
        .valores{
            width:80%;
            border:1px solid #000000;
            padding:10px;
            border-radius:5px;
            margin-left:3em;
            font-size:12px;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td align="left" width="50%"><img src="{{ asset('plugins/login/img/bolivia.jpg') }}" width="95px" height="80px"/></td>
            <td align="right" width="50%"><img src="{{ asset('plugins/login/img/logo.jpg') }}" width="200px" height="50px"/></td>
        </tr>
    </table>
        <center><h2>FICHA TÉCNICA</h2></center>
    <hr>
    <b>CATEGORIZACIÓN</b><br>
    <b>&nbsp;&nbsp;&nbsp;&nbsp; 1.- PERTINENCIA (30)</b><br>
    <div class="valores">
        <table width="100%">
            <tr>
                <td><img src="{{ asset('plugins/login/img/check.jpg') }}"/>&nbsp;&nbsp; Agenda 2025</td>
                <td><img src="{{ asset('plugins/login/img/check.jpg') }}"/>&nbsp;&nbsp; PDES</td>
                <td><img src="{{ asset('plugins/login/img/check.jpg') }}"/>&nbsp;&nbsp; PSDI</td>
            </tr>
            <tr>
                <td><img src="{{ asset('plugins/login/img/check.jpg') }}"/>&nbsp;&nbsp; PEI</td>
                <td><img src="{{ asset('plugins/login/img/check.jpg') }}"/>&nbsp;&nbsp; Normativa del Sector</td>
                <td><img src="{{ asset('plugins/login/img/check.jpg') }}"/>&nbsp;&nbsp; GUIA</td>
            </tr>
        </table>    
    </div>
    <b>&nbsp;&nbsp;&nbsp;&nbsp; 2.- MAGNITUD (20)</b><br>
    <b>&nbsp;&nbsp;&nbsp;&nbsp; 3.- COMPLEJIDAD (30)</b><br>
    <b>&nbsp;&nbsp;&nbsp;&nbsp; 4.- COBERTURA (20)</b><br>
</body>
</html>