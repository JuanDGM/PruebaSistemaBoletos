@extends('layout.principal')

@section('title','asignación')

@section('titlePage','LABOLETERÍA.COM')

@section('accesoAdministrador')
   <a href="{{ route('home') }}"><i class="small material-icons" style="color:#fff;margin-right:10px;">arrow_back</i></a>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css\stylesApp.css') }}">
    <link href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">    
@endsection

@section('content')
    <div class="titleSection" style="color:#222;">ASIGNACIÓN DE BOLETAS A CLIENTES REGISTRADOS</div>

    <form id="FormTickedAssign">
        <div class="input-field input-small">
            <select id="selectUsersRegister" name="selectUsersRegister" onchange="showAssignedTickets(this.value);" required></select>
            <label>USUARIOS REGISTRADOS</label>
        </div>

        <div class="input-field input-small">
            <input id="cantidadBoletasDisponibles" disabled style="border-bottom:none;color:red;font-size:20px;">
            <label class="active">BOLETOS DISPONIBLES</label>
        </div>

        <div class="input-field input-small">
            <input type="number" placeholder="" name="numberTicketsAssigned" id="numberTicketsAssigned" min="1" required>
            <label class="active">CANTIDAD BOLETOS ASIGNAR</label>
        </div>

        <div style="width:100%;">
            <a class="waves-effect blue lighten-1 btn" onclick="saveTicketAssignment();">ASIGNAR BOLETOS</a>    
        </div>
    </form>
<br/>
<div class="frameTicketAssigned" style="display: none;">
    <h6 style="width:100%;font-weight:bold;">BOLETOS ASIGNADOS AL USUARIO</h6>

    <div class="frameInfoClient">
        <div>INFORMACIÓN CLIENTE</div>
        <table class="striped">
            <tbody>
                <tr>
                    <td><label>NOMBRE</label></td>
                    <td><label id="nombreId"></label></td>
                </tr>
                <tr>
                    <td><label>CEDULA</label></td>
                    <td><label id="cedulaId"></label></td>
                </tr>
                <tr>
                    <td><label>EMAIL</label></td>
                    <td><label id="emailId"></label></td>
                </tr>
                <tr>
                    <td><label>CELULAR</label></td>
                    <td><label id="celularId"></label></td>
              </tr>
            </tbody>
          </table>    
    </div>            
    <div class="frameDetailReservation">
        <div>DETALLE RESERVA</div>
        <label>Cantidad boletos asignados:&nbsp;<label id="numeTicketsAssig">5</label></label>
        <div>CODIGO BOLETOS ASIGNADOS</div>
        <div id="codTicketsAssig" style="display:flex;flex-wrap:wrap;width:100%;"></div>
    </div>

</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.getElementById('footer').style.display='none';
    </script>
@endsection