@extends('layout.principal')

@section('title','Inicio')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css\style.css') }}">
@endsection

@section('titlePage','LABOLETERÍA.COM')

@section('accesoAdministrador')


{{-- <a href="{{ route('asignar') }}" class="waves-effect white btn" style="margin-right:10px;color:#222;">ADMINISTRADOR</a> --}}
    {{-- <a href="{{ route('asignar') }}" class="waves-effect white btn" style="margin-right:10px;color:#222;">ADMINISTRADOR</a> --}}
  <a class='dropdown-trigger btn white grey-text darken-text-2' href='#' data-target='dropdown1' style="margin-right:20px;color:#222;">ADMINISTRADOR</a>
    <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="{{ route('asignar') }}" style="margin-right:10px;">Escenario cubierto</a></li>
    <li><a href="{{ route('asignarGeneral') }}">Escenario abierto</a></li>
  </ul>


@endsection

@section('content')
<div class="titleSection">INICIO / EVENTOS / CONCIERTOS</div>

{{-- modal registro usuario --}}
<div id="modal1" class="modal">
  <div class="modal-content">
      <h5>REGÍSTRO PARA RESERVAR TU BOLETA</h5>
      <br/>

      <form id="formCreateUser">
        @csrf
        
        <div class="input-field input-small">
            <input name="nombreId" id="nombreId" placeholder="" type="text" class="validate" required>
            <label class="active">NOMBRE Y APELLIDOS</label>
        </div>

        <div class="input-field input-small">
            <input name="cedula" id="cedulaId" placeholder="" type="text" class="validate" required>
            <label class="active">CEDULA</label>
        </div>

        <div class="input-field input-small">
            <input name="email" id="emailId" placeholder="" type="email" class="validate" required>
            <label class="active">EMAIL</label>
        </div>

        <div class="input-field input-small">
            <input name="email" id="celularId" placeholder="" type="text" class="validate" required>
            <label class="active">CELULAR</label>
        </div>

        <div style="width:100%;">
            <a class="waves-effect grey lighten-2 btn" onclick="createUser();" style="color:#222;">GUARDAR</a>
            <a class="waves-effect white darken-text-2 btn modal-close" style="color:#222;">CANCELAR</a>
        </div>    
    </form>

    </div>
  </div>

  {{-- modal registro usuario end --}}


  <div class="EventDescription">

    

    <div class="frameContent" id="infoEvento">

        <h2 style="color:#b71c1c;font-weigth:bold;margin-bottom:0px !important;">GRAN CONCIERTO</h2>
        <h4 style="color:#616161;">COLOMBIA TOUR</h4>
        <h5 style="color:#616161;">30 DIC 2020 - MEDELLÍN</h5>
        <br/>
        <br/>
        <a class="waves-effect grey darken-4 darken-1 btn modal-trigger" href="#modal1">REGÍSTRATE AQUÍ PARA RESERVAR </a>
    </div>
    <div class="frameContent" id="imagenEvento">
        {{-- <img src="img/img1.jpg" alt="" style="width:100%;height:100%;"> --}}
        
        
        <div class="carousel carousel-slider center">
            <div class="carousel-fixed-item center">
              {{-- <a class="btn waves-effect white grey-text darken-text-2" href="{{ route('asignarGeneral') }}">ASIGNACION BOLETAS</a> --}}
              {{-- <a class="waves-effect red darken-1 btn modal-trigger" href="#modal1">RESERVA AQUÍ</a> --}}
            </div>
            <div class="carousel-item red white-text" href="#one!">
              {{-- <h2>First Panel</h2>
              <p class="white-text">
            </p> --}}
            <img src="img/im1.jpg" alt="" style="width:100%;height:100%;">
            </div>
            <div class="carousel-item amber white-text" href="#two!">
              {{-- <h2>Second Panel</h2>
              <p class="white-text">This is your second panel</p> --}}
              <img src="img/im2.jpg" alt="" style="width:100%;height:100%;">
            </div>
            <div class="carousel-item green white-text" href="#three!">
              {{-- <h2>Third Panel</h2>
              <p class="white-text">This is your third panel</p> --}}
              <img src="img/im3.jpg" alt="" style="width:100%;height:100%;">  
            </div>
            <div class="carousel-item blue white-text" href="#four!">
              {{-- <h2>Fourth Panel</h2>
              <p class="white-text">This is your fourth panel</p> --}}
              <img src="img/im4.jpg" alt="" style="width:100%;height:100%;">
            </div>
          </div>



    </div>


  </div>

@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>



$(document).ready(function() {
    M.updateTextFields();

    $('.modal').modal({dismissible:false});

  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });

  setInterval(function(){
$(".carousel").carousel("next");
}, 2000);


/* $('#modal1').modal({
       backdrop: 'static',
       keyboard: false
}) */

});

</script>

@endsection  