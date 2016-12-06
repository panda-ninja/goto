$("#btnBuscar_pqt").click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    var codigopx=$("#codigopx").val();
    // alert(codigopx);
    var token='drmLwc3gMXKsyrhxzMJrr4dlC8rrvtcj9Fuv9vfU';
    if(codigopx.length>0){

        // $.post("/buscarpaquete",{codigo:codigopx}, function(data){
        //     console.log(data);
        //     $('#list_planes').html(data);
        //
        // });
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
        // sleep(300);
        $.post('http://gotoperu.mo/buscarpaquete', {codigo: codigopx}, function(markup) {

            if(markup){

                console.log(markup);
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

        // $.ajax({
        //     dataType:'json',
        //     type:'post',
        //     url:"http://gotoperu.mo/buscarpaquete",
        //     headers:{'X-CSRF-TOKEN': $('[id="_token"]').val()},
        //     data:{codigo:codigopx},
        //     success: function(data){
        //         alert(data);
        //         console.log(data);
        //             $('#list_planes').html(data);
        // //         // $("#codigopx").empty().html(data);
        //     }
        //     // ,
        //     // error: function(data){
        //     //     $("#mensaje").html(
        //     //         '<div id="card-alert" class="card red lighten-5">'+
        //     //             '<div class="card-content red-text">'+
        //     //                 '<p>ERROR : '+data.responseJSON.name+'</p>'+
        //     //             '</div>'+
        //     //         '</div>');
        //     // }
        // });
    }
    else{

        $("#codigopx").focus();
    }
});

var idCotizacion=0;

$('#agregar_pqt').click( function(){
    // console.log(idCotizacion);
        if(idCotizacion==0){
            var pemail=$('#email_3').val();
            var pnropasajeros=$('#nropasajeros').val();
            var pfecha=$('#fecha').val();
            alert(pemail+'-'+pnropasajeros+'-'+pfecha);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });
            $.post('http://gotoperu.mo/guardar_pre_cotizacion', {email: pemail,nropasajeros:pnropasajeros,fecha:pfecha}, function(markup) {
                if(markup){
                    // console.log(markup);
                    // alert(markup);
                     idCotizacion=markup;

                }
                else{
                    // console.log(markup);
                    idCotizacion=markup;
                }
            }).fail(function (markup) {
                // console.log(markup);
                idCotizacion=0;
            });
            // alert('estamos guardamos la cotizacion');
            // idCotizacion=1;
            // console.log(idCotizacion);
        }
    }
);