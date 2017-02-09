var url3='http://gotoperu.mo';

$("#btnBuscar_pqt").click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    var codigopx=$("#codigopx").val();
    var token='drmLwc3gMXKsyrhxzMJrr4dlC8rrvtcj9Fuv9vfU';
    if(codigopx.length>0){
        var datastring="codigo="+codigopx;
        $('#idLoad').html('<div class="preloader-wrapper small active">'+
            '<div class="spinner-layer spinner-green-only">'+
            '<div class="circle-clipper left">'+
            '<div class="circle"></div>'+
            '</div><div class="gap-patch">'+
            '<div class="circle"></div>'+
            '</div><div class="circle-clipper right">'+
            '<div class="circle"></div>'+
            '</div>'+
            '</div>'+
            '</div>');
        $.post(url3+'/buscarpaquete', {codigo: codigopx}, function(markup) {
            if(markup){
                // console.log(markup);
                $('#list_planes').html('');
                $('#list_planes').html(markup);
                $('#idLoad').html('');
            }
            else{
                $('#idLoad').html('');
                $('#list_planes').html('<div id="card-alert" class="card red lighten-5">'+
                    '<div class="card-content red-text">'+
                    '<p>ERROR : Ocurrio un error al cargar los datos '+markup+'</p>'+
                    '</div>'+
                    '<button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">×</span>'+
                    '</button>'+
                    '</div>');
            }
        }).fail(function (markup) {
            $('#idLoad').html('');
            $('#list_planes').html('<div id="card-alert" class="card red lighten-5">'+
                '<div class="card-content red-text">'+
                '<p>ERROR : No se encontró el paquete con codigo: '+codigopx+'</p>'+
                '</div>'+
                '<button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">'+
                '<span aria-hidden="true">×</span>'+
                '</button>'+
                '</div>');
        });
    }
    else{

        $("#codigopx").focus();
    }
});

$("#nuevo_pqt").click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    var codigopx=$("#codigopx").val();
    var token='drmLwc3gMXKsyrhxzMJrr4dlC8rrvtcj9Fuv9vfU';
    if(codigopx.length>0){
        var datastring="codigo="+codigopx;
        $('#idLoad').html('<div class="preloader-wrapper small active">'+
            '<div class="spinner-layer spinner-green-only">'+
            '<div class="circle-clipper left">'+
            '<div class="circle"></div>'+
            '</div><div class="gap-patch">'+
            '<div class="circle"></div>'+
            '</div><div class="circle-clipper right">'+
            '<div class="circle"></div>'+
            '</div>'+
            '</div>'+
            '</div>');
        $.post(url3+'/nuevopaquete', {codigo: codigopx}, function(markup) {
            if(markup){
                // console.log(markup);
                $('#list_planes').html('');
                $('#list_planes').html(markup);
                $('#idLoad').html('');
            }
            else{
                $('#idLoad').html('');
                $('#list_planes').html('<div id="card-alert" class="card red lighten-5">'+
                    '<div class="card-content red-text">'+
                    '<p>ERROR : Ocurrio un error al cargar los datos '+markup+'</p>'+
                    '</div>'+
                    '<button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">×</span>'+
                    '</button>'+
                    '</div>');
            }
        }).fail(function (markup) {
            $('#idLoad').html('');
            $('#list_planes').html('<div id="card-alert" class="card red lighten-5">'+
                '<div class="card-content red-text">'+
                '<p>ERROR : No se encontró el paquete con codigo: '+codigopx+'</p>'+
                '</div>'+
                '<button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">'+
                '<span aria-hidden="true">×</span>'+
                '</button>'+
                '</div>');
        });
    }
    else{

        $("#codigopx").focus();
    }
});

var idCotizacion=0;
var NroClic=0;
$('#agregar_pqt').click(function(){

    if($('#email_3').val()==""){
        $('#email_3').focus();
        swal(
            'Oops...',
            'Ingrese el email del cliente!',
            'warning'
        )
    }
        if(idCotizacion==0){
            var pemail=$('#email_3').val();
            var pnropasajeros=$('#nropasajeros').val();
            var pfecha=$('#fecha').val();
            // alert(pemail+'-'+pnropasajeros+'-'+pfecha);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });
            $.post(url3+'/guardar_pre_cotizacion', {email: pemail,nropasajeros:pnropasajeros,fecha:pfecha}, function(markup) {
                if(markup!='0'){
                     // console.log(markup);
                     idCotizacion=markup;
                    NroClic=1;
                }
                else{
                      // console.log('error de registro cerrarmos :'+markup);
                    idCotizacion=markup;
                    swal(
                        'Oops...',
                        'No se encontró al cliente '+pemail+'!',
                        'warning'
                    );
                    $( "#cerrar_modal" ).trigger( "click" );
                }
            }).fail(function (markup) {
                  // console.log('Fail cerrarmos :'+markup);
                idCotizacion=0;
                swal(
                    'Oops...',
                    'currio una error vuelva a intentarlo por favor (cliente:'+pemail+', '+markup+')',
                    'warning'
                );
                $( "#cerrar_modal" ).trigger( "click" );
            });
        }
    }
);

function Buscar_iti(){
    var valor=$('#buscar').val();
    console.log(valor);
    if(valor!=""){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });
        $.post(url3+'/buscar_itinerario', {valor: valor}, function(markup) {
            if(markup!='0'){
                $('#jalar_iti').html(markup);
                console.log(markup);
            }
            else{
                console.log('error de registro cerrarmos :'+markup);
            }
        }).fail(function (markup) {
             console.log('Fail cerrarmos :'+markup);
        });
    }
}