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

var idCotizacion=0;
var NroClic=0;
var crear_plan=0;

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
                crear_plan=1;
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



function generar_pqt(){

    if(crear_plan==1){
        swal({   title: "Mensaje del sistema",
                text: "Esta seguro de agregar el plan a la cotizacion",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#388E3C",
                confirmButtonText: "Si, Agregar ahora!",
                cancelButtonText: "No, Cancelar por favor!",
                closeOnConfirm: false,
                closeOnCancel: false },
            function(isConfirm){
                if (isConfirm) {
                    if($('#email_3').val()==""){
                        $('#email_3').focus();
                        swal(
                            'Oops...',
                            'Ingrese el email del cliente!',
                            'warning'
                        )
                    }
                    if(idCotizacion==0){
                        console.log('no hay coti');
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
                                console.log('ya se guardo la nueva cotizacion: '+idCotizacion);
                                var descr=$('#text_descripcion').val();
                                var precio_plan=0;
                                if($('#total').html()!=''){
                                    precio_plan=$('#total').html();
                                }
                                console.log('total:'+precio_plan);
                                var destinos= '';
                                jQuery("input[name='chb_destinos[]']:checked").each(function(){
                                    destinos+= $(this).val() + '[]';
                                });
                                destinos=destinos.substring(0, destinos.length-2);

                                var iti_titulo= '';
                                jQuery("textarea.iti_titulo").each(function() {
                                    iti_titulo+= $(this).val() + '[]';
                                });
                                iti_titulo=iti_titulo.substring(0, iti_titulo.length-2);

                                var iti_descricion= '';
                                jQuery("textarea.iti_descripcion").each(function() {
                                    iti_descricion+= $(this).val() + '[]';
                                });
                                iti_descricion=iti_descricion.substring(0, iti_descricion.length-2);
                                var room_t=$('#room_t').val();
                                var room_d=$('#room_d').val();
                                var room_m=$('#room_m').val();
                                var room_s=$('#room_s').val();

                                var precio_2_t=$('#precio_2_t').val();
                                var precio_2_d=$('#precio_2_d').val();
                                var precio_2_d_m=$('#precio_2_d_m').val();
                                var precio_2_s=$('#precio_2_s').val();

                                var precio_3_t=$('#precio_3_t').val();
                                var precio_3_d=$('#precio_3_d').val();
                                var precio_3_d_m=$('#precio_3_d_m').val();
                                var precio_3_s=$('#precio_3_s').val();

                                var precio_4_t=$('#precio_4_t').val();
                                var precio_4_d=$('#precio_4_d').val();
                                var precio_4_d_m=$('#precio_4_d_m').val();
                                var precio_4_s=$('#precio_4_s').val();

                                var precio_5_t=$('#precio_5_t').val();
                                var precio_5_d=$('#precio_5_d').val();
                                var precio_5_d_m=$('#precio_5_d_m').val();
                                var precio_5_s=$('#precio_5_s').val();

                                var precios='room_t='+room_t+'&&room_d='+room_d+'&&room_m='+room_m+'&&room_s='+room_s+
                                            '&&precio_2_t='+precio_2_t+'&&precio_2_d='+precio_2_d+'&&precio_2_d_m='+precio_2_d_m+'&&precio_2_s='+precio_2_s+
                                            '&&precio_3_t='+precio_3_t+'&&precio_3_d='+precio_3_d+'&&precio_3_d_m='+precio_3_d_m+'&&precio_3_s='+precio_3_s+
                                            '&&precio_4_t='+precio_4_t+'&&precio_4_d='+precio_4_d+'&&precio_4_d_m='+precio_4_d_m+'&&precio_4_s='+precio_4_s+
                                            '&&precio_5_t='+precio_5_t+'&&precio_5_d='+precio_5_d+'&&precio_5_d_m='+precio_5_d_m+'&&precio_5_s='+precio_5_s;
                                    // console.log(valor);
                                // var formData = new FormData();
                                // var file=document.getElementById("foto").files[0];
                                // formData.append('foto',file);
                                // console.log(file);
                                var formData = new FormData();
                                var foto=$('#foto');
                                formData.append("foto", foto);
                                $.ajax({
                                    type: 'POST',
                                    contentType:false,
                                    processData:false,
                                    // cache:false,
                                    url: url3+'/guardar_plan_cotizacion',
                                    data: formData,
                                    // data: $('#form_plan').serialize()+'&&'+formData+'&&'+precios+'&&descr='+descr+'&&precio_plan='+precio_plan+'&&idCotizacion='+idCotizacion+'&&destinos='+destinos+'&&iti_titulo='+iti_titulo+'&&iti_descricion='+iti_descricion,
                                    // data:valor,
                                    // Mostramos un mensaje con la respuesta de PHP
                                    success: function(data){
                                        $('#list_planes').html('');
                                        $('#lista_plan_cotizacion').html(data);
                                        crear_plan=0;
                                    }
                                });
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
                            // $( "#cerrar_modal" ).trigger( "click" );
                        });
                    }
                    else{
                        console.log('ya se guardo la nueva cotizacion: '+idCotizacion);
                        var descr=$('#text_descripcion').val();

                        var precio_plan=0;
                        if($('#total').html()!=''){
                            precio_plan=$('#total').html();
                        }
                        console.log('total:'+precio_plan);
                        var destinos= '';
                        jQuery("input[name='chb_destinos[]']:checked").each(function(){
                            destinos+= $(this).val() + '[]';
                        });
                        destinos=destinos.substring(0, destinos.length-2);

                        var iti_titulo= '';
                        jQuery("textarea.iti_titulo").each(function() {
                            iti_titulo+= $(this).val() + '[]';
                        });
                        iti_titulo=iti_titulo.substring(0, iti_titulo.length-2);

                        var iti_descricion= '';
                        jQuery("textarea.iti_descripcion").each(function() {
                            iti_descricion+= $(this).val() + '[]';
                        });
                        iti_descricion=iti_descricion.substring(0, iti_descricion.length-2);
                        var room_t=$('#room_t').val();
                        var room_d=$('#room_d').val();
                        var room_m=$('#room_m').val();
                        var room_s=$('#room_s').val();

                        var precio_2_t=$('#precio_2_t').val();
                        var precio_2_d=$('#precio_2_d').val();
                        var precio_2_d_m=$('#precio_2_d_m').val();
                        var precio_2_s=$('#precio_2_s').val();

                        var precio_3_t=$('#precio_3_t').val();
                        var precio_3_d=$('#precio_3_d').val();
                        var precio_3_d_m=$('#precio_3_d_m').val();
                        var precio_3_s=$('#precio_3_s').val();

                        var precio_4_t=$('#precio_4_t').val();
                        var precio_4_d=$('#precio_4_d').val();
                        var precio_4_d_m=$('#precio_4_d_m').val();
                        var precio_4_s=$('#precio_4_s').val();

                        var precio_5_t=$('#precio_5_t').val();
                        var precio_5_d=$('#precio_5_d').val();
                        var precio_5_d_m=$('#precio_5_d_m').val();
                        var precio_5_s=$('#precio_5_s').val();

                        var precios='room_t='+room_t+'&&room_d='+room_d+'&&room_m='+room_m+'&&room_s='+room_s+
                            '&&precio_2_t='+precio_2_t+'&&precio_2_d='+precio_2_d+'&&precio_2_d_m='+precio_2_d_m+'&&precio_2_s='+precio_2_s+
                            '&&precio_3_t='+precio_3_t+'&&precio_3_d='+precio_3_d+'&&precio_3_d_m='+precio_3_d_m+'&&precio_3_s='+precio_3_s+
                            '&&precio_4_t='+precio_4_t+'&&precio_4_d='+precio_4_d+'&&precio_4_d_m='+precio_4_d_m+'&&precio_4_s='+precio_4_s+
                            '&&precio_5_t='+precio_5_t+'&&precio_5_d='+precio_5_d+'&&precio_5_d_m='+precio_5_d_m+'&&precio_5_s='+precio_5_s;
                        // console.log(valor);
                        $.ajax({
                            type: 'POST',
                            url: url3+'/guardar_plan_cotizacion',
                            // data: $('#form_plan').serializeArray(),
                            data: $('#form_plan').serialize()+'&&'+precios+'&&descr='+descr+'&&precio_plan='+precio_plan+'&&idCotizacion='+idCotizacion+'&&destinos='+destinos+'&&iti_titulo='+iti_titulo+'&&iti_descricion='+iti_descricion,
                            // data:valor,
                            // Mostramos un mensaje con la respuesta de PHP
                            success: function(data){
                                $('#list_planes').html('');
                                $('#lista_plan_cotizacion').html(data);
                                crear_plan=0;
                            }
                        });
                    }
                    swal("Agregado!", "Tu pla de cotizacion fue agregado :)", "success");
                }
                else {
                    swal("Cancelado", "Tu plan de cotizacion no fue agregado :(", "error");
                }
            });

    }
}
function Buscar_iti(){
    var valor=$('#buscar').val();
    if(valor.trim()!=""){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });
        $.post(url3+'/buscar_itinerario', {valor: valor}, function(markup) {
            if(markup!='0'){
                $('#jalar_iti').html('');
                $('#jalar_iti').html(markup);
                // $.getScript('https://code.jquery.com/ui/1.12.1/jquery-ui.js');
                // console.log(markup);
            }
            else{
                $('#jalar_iti').html('');
                // console.log('error de registro cerrarmos :'+markup);
            }
        }).fail(function (markup) {
            $('#jalar_iti').html('');
             // console.log('Fail cerrarmos :'+markup);
        });
    }
    else{
        $('#jalar_iti').html('');
        $('#buscar').focus();
    }
}

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
                // $.getScript('https://code.jquery.com/ui/1.12.1/jquery-ui.js');
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

function enviarPlan(id){
    swal({   title: "Mensaje del sistema",
            text: "Desea enviar el plan",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#388E3C",
            confirmButtonText: "Si, enviar ahora!",
            cancelButtonText: "No, cancelar por favor!",
            closeOnConfirm: false,
            closeOnCancel: false },
        function(isConfirm){
            if (isConfirm) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').val()
                    }
                });
                $.post(url3+'/enviar_plan', {id: id}, function(markup) {
                    if(markup=='1'){
                        $('#send'+id).removeClass('green-text');
                        $('#send'+id).addClass('grey-text');
                        // $.getScript('https://code.jquery.com/ui/1.12.1/jquery-ui.js');
                        // console.log(markup);
                    }
                    else if(markup=='0'){
                         console.log('error de registro cerrarmos :'+markup);
                    }
                }).fail(function (markup) {
                     console.log('Fail cerrarmos :'+markup);
                });
                swal("Enviado!", "Tu plan fue enviado :)", "success");   }
            else {
                swal("Cancelado", "no se puedo enviar tu plan :(", "error");   }
        });
}
