@extends('layout.principal')

@section('title','asignación')

@section('titlePage','LABOLETERÍA.COM')

@section('accesoAdministrador')
   <a href="{{ route('home') }}"><i class="small material-icons" style="color:#fff;margin-right:10px;">arrow_back</i></a>
@endsection


@section('styles')
    <link rel="stylesheet" href="{{ asset('css\stylesApp.css') }}">
    <link rel="stylesheet" href="{{ asset('css\styleEscenario.css') }}">
    <link href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">    
@endsection

@section('content')
<div class="titleSection" style="color:#222;">ASIGNACIÓN DE BOLETAS A CLIENTES REGISTRADOS</div>

<form id="FormTickedAssign">
<div class="frameFormAssignTicket">
    <div class="input-field">
        <select id="selectUsersRegister" name="selectUsersRegister" required></select>
        <label>USUARIOS REGISTRADOS</label>
    </div>
    <br/>
    <div class="input-field">
        <input id="cantidadBoletasDisponiblesStage" disabled style="border-bottom:none;color:red;font-size:20px;text-align:center;">
        <label class="active">BOLETOS DISPONIBLES</label>
    </div>

    
    <div style="width: 100%;">
        <a class="waves-effect blue lighten-1 btn" id="btnSaveTickestStage" onclick="showStage();">ASIGNAR BOLETOS</a>    
    </div>

</div>

<div class="frameStage">
    <div class="escenario"></div>
</div>

</form>

@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    document.getElementById('footer').style.display='none'
    </script>
@endsection  