
/* Clientes */

function createUser(){
    $(function(){

        const name = $("#nombreId").val();
        const cedula = $("#cedulaId").val();
        const email = $("#emailId").val();
        const celular = $("#celularId").val();

        if(name==0 || cedula=='' || email=='' || celular==''){
            $("#modal1").append(
                '<div class="alertValidacion">Diligencia todos los campos</div>'
            );

            $(".alertValidacion").fadeOut(5000);
        }else{

        $.post('http://127.0.0.1:8000/api/sistemareservasboletasclientes',{
            name:name,
            cedula:cedula,
            email:email,
            celular:celular
        },function(response){
            
            var r = JSON.parse(response);

            $.alert({
                title: 'Confirmación!',
                content: r,
            });

            $("#nombreId").val('');
            $("#cedulaId").val('');
            $("#emailId").val('');
            $("#celularId").val('');

            $('#modal1').modal({dimissible:true});

        });
    }
    });

}

function showUsersRegister(){

    $(function(){

       $.get('http://127.0.0.1:8000/api/sistemareservasboletasclientes',function(response){
            
        $("#selectUsersRegister").empty();

            const r = JSON.parse(response);

            var option="";

            $("#selectUsersRegister").append(
                "<option>-- selecciona --</option>"
            );
            for(var i=0;i<r.length;i++){
                option+="<option value="+r[i]['id']+">"+r[i]['name']+"</option>";
            }

            $("#selectUsersRegister").append(option);

            $('select').formSelect();            
       });
    });
}

/* Metodos: Tiquetes asignacion general */

function showAvailableTickets(){

    $(function(){

        $.get('http://127.0.0.1:8000/api/sistemareservasboletasdisponibles',function(response){

            $("#cantidadBoletasDisponibles").empty();
             
            $("#cantidadBoletasDisponibles").val(response);
           
        }); 
     });    
}

function showAssignedTickets(idUser){
    $(function(){
        
        $.get('http://127.0.0.1:8000/api/sistemareservasboletasdisponibles/'+idUser,function(response){
            
            const r = JSON.parse(response);

            if(r.length>0){

            $(".frameTicketAssigned").show();
            
            $("#nombreId").empty();
            $("#cedulaId").empty();
            $("#emailId").empty();
            $("#celularId").empty();
            $("#numeTicketsAssig").empty();
            $("#codTicketsAssig").empty();


            $("#nombreId").append(r[0]['name']);
            $("#cedulaId").append(r[0]['cedula']);
            $("#emailId").append(r[0]['email']);
            $("#celularId").append(r[0]['celular']);    

            $("#numeTicketsAssig").append(r.length);

            let IdTickets = "";
            for(i=0;i<r.length;i++){
                IdTickets += r[i]['id'];
                IdTickets+=", ";
            }

            $("#codTicketsAssig").append(IdTickets);

        }else{
            $(".frameTicketAssigned").hide();
        }
            
    });

        
    });

}

function saveTicketAssignment(){

    $(function(){

       const selectUsersRegister    = $("#selectUsersRegister").val();
       const numberTicketsAssigned = $("#numberTicketsAssigned").val();
        
       if(selectUsersRegister==''){
        
        $(".alertValidacion").remove();
        $("#FormTickedAssign").append(
            '<div class="alertValidacion">Diligencia todos los campos</div>'
        );

        $(".alertValidacion").fadeOut(5000);
    }else{

       $.post('http://127.0.0.1:8000/api/sistemareservasboletasdisponibles',{
            idUser:selectUsersRegister,
            numberTicketsAssigned:numberTicketsAssigned
    
    },function(response){
       /* alert(response); */
       var r = JSON.parse(response);

       $.alert({
            title: 'Confirmación!',
            content: r,
        });
       
       showAvailableTickets();
       showAssignedTickets(selectUsersRegister);
       $("#selectUsersRegister").val('');
       $("#numberTicketsAssigned").val('');
       $('select').formSelect(); 

    });   
    }     
    });

}


/* INIT */

showUsersRegister();

showAvailableTickets();

showStage();

showAvailableTicketsStage();

$('.dropdown-trigger').dropdown();

$(function() {
    M.updateTextFields();

    $('.modal').modal();

    $('select').formSelect();

});


/* ASIGNACION RESERVAR ASIENTOS ENUMERADOS */
// Adicional, Asigna los boletos del escenario
function showStage(){

    $(function(){
    
        var asientoReservados = [];
    
        $.get('http://127.0.0.1:8000/api/sistemareservasboletasdisponiblestage',function(response){
            
            var r = JSON.parse(response);
    
            for(var i=0;i<r.length;i++){
                asientoReservados.push(r[i]['numero_boleto'])
            }
    
            $("#selectUsersRegister").val('');
            $('select').formSelect();
    
            $(".escenario").empty();
            $(".escenario").append(
                '<div style="width:100%;height:15%;color:#222;text-align:center;display:flex;justify-content:space-around;">'+
                    '<div><a class="waves-effect waves-light btn btn-small asiento"></a></div>Disponibles'+
                    '<div><a class="waves-effect white btn btn-small asiento"></a></div>Asignados'+
                    '<div><a class="waves-effect red btn btn-small asiento"></a></div>Seleccionados'+
                '</div>'+    
                '<div style="width:100%;height:10%;background:#222;color:#fff;text-align:center;">Escenario</div>'
        );
            
        for(var i=1;i<81;i++){
          
            if(i==7){
                if(asientoReservados.includes(i)){
                $(".escenario").append(
                    '<div class="btn btn-small asiento" style="background:#fff;border:none;box-shadow:none;"></div>'+
                    '<div class="btn btn-small asiento" style="background:#fff;border:none;box-shadow:none;"></div>'+
                    '<div class="btn btn-small asiento" style="background:#fff;border:none;box-shadow:none;"></div>'+
                    '<div class="btn btn-small asiento" style="background:#fff;border:none;box-shadow:none;"></div>'+
                    '<div class="btn btn-small asiento" style="background:#fff;border:none;box-shadow:none;"></div>'+
                    '<button class="waves-effect white btn btn-small asiento" style="color:#222;">'+i+'</button>'
                );
                }else{
                    $(".escenario").append(
                        '<div class="btn btn-small asiento" style="background:#fff;border:none;box-shadow:none;"></div>'+
                        '<div class="btn btn-small asiento" style="background:#fff;border:none;box-shadow:none;"></div>'+
                        '<div class="btn btn-small asiento" style="background:#fff;border:none;box-shadow:none;"></div>'+
                        '<div class="btn btn-small asiento" style="background:#fff;border:none;box-shadow:none;"></div>'+
                        '<div class="btn btn-small asiento" style="background:#fff;border:none;box-shadow:none;"></div>'+
                        '<button type="button" class="waves-effect waves-light btn btn-small asiento" value="'+i+'">'+i+'</button>'
                    );    
    
                }     
    
            }else{
    
                if(asientoReservados.includes(i)){
                    $(".escenario").append(
                        '<button type="button" class="waves-effect white btn btn-small asiento" style="color:#222;">'+i+'</button>'
                    );
                }else{
                    $(".escenario").append(
                        '<button type="button" class="waves-effect waves-light btn btn-small asiento" value="'+i+'">'+i+'</button>'
                    );
                }
            }
               
        }
    
    
        var boletasSeleccionadas = [];
        $(".asiento").on("click", function(e){
            $(this).css("background","red");
    
            if(boletasSeleccionadas.includes($(this).val())){
                $(this).css("background","#26a69a");
                var i = boletasSeleccionadas.indexOf( $(this).val() );
    
                boletasSeleccionadas.splice(i,1);
    
            }else{
                boletasSeleccionadas.push($(this).val());
    
            }
    
        });
    
    
        $("#btnSaveTickestStage").on('click', function(){
    
               boletasSeleccionadas;
                let idUser = document.getElementById('selectUsersRegister').value;
            if(idUser!="" && boletasSeleccionadas.length>0){

                $.post('http://127.0.0.1:8000/api/sistemareservasboletasdisponiblestage',{
                user_id:idUser,
                numero_boleto:boletasSeleccionadas
            
            },function(response){
                
                var r = JSON.parse(response);
    
                /* $.alert({
                    title: 'Confirmación!',
                    content: r,
                }); */
    
                $("#selectUsersRegister").val('');
                boletasSeleccionadas=[];    
                
            });
            
        }else{

            $(".alertValidacion").remove();
            $(".frameFormAssignTicket").append(
                '<div class="alertValidacion">Seleccion usuario y sillas requeridas</div>'
            );

            $(".alertValidacion").fadeOut(5000);

            boletasSeleccionadas=[];
        }
        showAvailableTicketsStage();
        });
    
        });
    
    });
    
    }


    /* Mostrar boletos disponibles - sillas enumeradas */

    function showAvailableTicketsStage(){

        $(function(){
    
            $.get('http://127.0.0.1:8000/api/sistemareservasboletasdisponiblestage',function(response){
    
                var r =JSON.parse(response);

                const boletasDisponibles = 80-r.length;

                $("#cantidadBoletasDisponiblesStage").empty();
                 
                $("#cantidadBoletasDisponiblesStage").val(boletasDisponibles);
               
            }); 
         });    
    }






