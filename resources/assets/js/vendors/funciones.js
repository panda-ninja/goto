var $url='http://localhost/goto2/public';
//hidalgo
$(document).ready(function(){
    Materialize.updateTextFields();
//cuando hagamos submit al formulario con id id_del_formulario
//se procesara este script javascript
    $("#form_editar_pqt").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),//action del formulario, ej:
            //http://localhost/mi_proyecto/mi_controlador/mi_funcion
            type: $(this).attr("method"),//el método post o get del formulario
            data: $(this).serialize(),//obtenemos todos los datos del formulario
            error: function(){
                //si hay un error mostramos un mensaje
            },
            success:function(data){
                //hacemos algo cuando finalice
                var rpt=data.split('_');

                if(rpt[0]==1) {
                    // $("#response").html(data[1]);
                    $("#action").html('Datos enviados<i class="mdi-content-send right"></i>');
                    $("#action").addClass('green');
                }
                else{
                    $("#response").html(data);
                }

            }
        });
    });
    $("#form_editar_pqt_nuevo").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),//action del formulario, ej:
            //http://localhost/mi_proyecto/mi_controlador/mi_funcion
            type: $(this).attr("method"),//el método post o get del formulario
            data: $(this).serialize(),//obtenemos todos los datos del formulario
            error: function(){
                //si hay un error mostramos un mensaje
            },
            success:function(data){
                //hacemos algo cuando finalice
                var rpt=data.split('_');
                console.log(data);
                if(rpt[0]==1) {
                    // $("#response").html(data[1]);
                    $("#action").html('Datos enviados<i class="mdi-content-send right"></i>');
                    $("#action").addClass('green');
                }
                else{
                    // $("#response").html(data);
                }

            }
        });
    });
    $("#formDestinos").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),//action del formulario, ej:
            //http://localhost/mi_proyecto/mi_controlador/mi_funcion
            type: $(this).attr("method"),//el método post o get del formulario
            data: $(this).serialize(),//obtenemos todos los datos del formulario
            error: function(){
                //si hay un error mostramos un mensaje
            },
            success:function(data){
                //hacemos algo cuando finalice
                var rpt=data.split('_');

                if(rpt[0]==1) {
                    // $("#response").html(data[1]);
                    $("#actionDestino").html('Datos enviados<i class="mdi-content-send right"></i>');
                    $("#actionDestino").addClass('green');
                }
                else{
                    $("#response").html(data);
                }

            }
        });
    });
    $("#formDestinos_pqt").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),//action del formulario, ej:
            //http://localhost/mi_proyecto/mi_controlador/mi_funcion
            type: $(this).attr("method"),//el método post o get del formulario
            data: $(this).serialize(),//obtenemos todos los datos del formulario
            error: function(){
                //si hay un error mostramos un mensaje
            },
            success:function(data){
                //hacemos algo cuando finalice
                var rpt=data.split('_');

                if(rpt[0]==1) {
                    // $("#response").html(data[1]);
                    $("#actionDestino").html('Datos enviados<i class="mdi-content-send right"></i>');
                    $("#actionDestino").addClass('green');
                }
                else{
                    $("#response").html(data);
                }

            }
        });
    });

    // $("#form_editar_itinerario").submit(function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         url: $(this).attr("action"),//action del formulario, ej:
    //         //http://localhost/mi_proyecto/mi_controlador/mi_funcion
    //         type: $(this).attr("method"),//el método post o get del formulario
    //         data: $(this).serialize(),//obtenemos todos los datos del formulario
    //         error: function(data){
    //             console.log('eroorr: '+data);
    //         },
    //         success:function(data){
    //             //hacemos algo cuando finalice
    //             var rpt=data.split('_');
    //             console.log('resultados: '+data);
    //             if(rpt[1]==1) {
    //                 // console.log('correcto: '+data);
    //                 // // $("#response").html(data[1]);
    //                 // $("#action_itinerario_"+rpt[0]).html('Datos enviados<i class="mdi-content-send right"></i>');
    //                 // $("#action_itinerario_"+rpt[0]).addClass('green');
    //             }
    //             else{
    //                 // console.log('error: '+data);
    //                 // $("#response_tinerario").html(data);
    //             }
    //
    //         }
    //     });
    // });

    $("#form_registrar_cliente").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),//action del formulario, ej:
            //http://localhost/mi_proyecto/mi_controlador/mi_funcion
            type: $(this).attr("method"),//el método post o get del formulario
            data: $(this).serialize(),//obtenemos todos los datos del formulario
            error: function(){
                //si hay un error mostramos un mensaje
            },
            success:function(data){
                if(data==1) {
                    // $("#response").html(data[1]);
                    $("#action_R").html('Datos enviados<i class="mdi-content-send right"></i>');
                    $("#action_R").addClass('green');
                }
                else if(data==0){
                    // $("#email3").val($("#email").val());
                }

            }
        });
    });
});
function enviar(pos){

    $("#action_itinerario_"+pos).html('Enviando<i class="mdi-action-autorenew right"></i>');
    $("#action_itinerario_"+pos).addClass('green');
    var nombre='form_editar_itinerario_'+pos;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.post($url+'/editar_paquete_itinerario', $('#'+nombre).serialize(), function(data) {
        var rpt=data.split('_');
        console.log('resultados: '+data);
        if(rpt[1]==1) {
            console.log('correcto: '+data);
            // $("#response_tinerario").html('aaaa'+rpt[2]);
            $("#titulo_iti_"+pos).html(rpt[3]);
            $("#descrp_"+pos).html(rpt[4]);
            $("#action_itinerario_"+pos).html('Agregar<i class="mdi-content-send right"></i>');
            $("#action_itinerario_"+pos).removeClass('green');
            $("#action_itinerario_"+pos).addClass('pink accent-2');

        }
        else{
            $("#response_tinerario").html(rpt[2]);
            console.log('error: '+data);
            // $("#response_tinerario").html(data);
        }
    }).fail(function (data) {
        console.log('eroorr: '+data);
    });
}
function enviar_obs(pos){

    $("#action_itinerario_obs_"+pos).html('Enviando<i class="mdi-action-autorenew right"></i>');
    $("#action_itinerario_obs_"+pos).addClass('green');
    var nombre='form_editar_itinerario_obs_'+pos;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.post($url+'/editar_paquete_itinerario_obs', $('#'+nombre).serialize(), function(data) {
        var rpt=data.split('_');
        // console.log('resultados: '+data);
        if(rpt[1]==1) {
            console.log('correcto: '+data);
            // $("#response_tinerario").html('aaaa'+rpt[2]);
            // $("#titulo_iti_"+pos).html(rpt[3]);
            $("#observaciones_iti_"+pos).html(rpt[3]);
            $("#action_itinerario_obs_"+pos).html('Agregar<i class="mdi-content-send right"></i>');
            $("#action_itinerario_obs_"+pos).removeClass('green');
            $("#action_itinerario_obs_"+pos).addClass('pink accent-2');

        }
        else{
            // $("#response_tinerario").html(rpt[2]);
            // console.log('error: '+data);
            // $("#response_tinerario").html(data);
        }
    }).fail(function (data) {
        console.log('eroorr: '+data);
    });
}
function enviar_serv(pos){

    $("#action_itinerario_serv_"+pos).html('Enviando<i class="mdi-action-autorenew right"></i>');
    $("#action_itinerario_serv_"+pos).addClass('green');
    var nombre='form_editar_itinerario_serv_'+pos;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.post($url+'/editar_paquete_itinerario_serv', $('#'+nombre).serialize(), function(data) {
        var rpt=data.split('_');
        // console.log('resultados: '+data);
        if(rpt[1]==1) {
            console.log('correcto: '+data);
            // $("#response_tinerario").html('aaaa'+rpt[2]);
            // $("#titulo_iti_"+pos).html(rpt[3]);
            $("#iti_precio_serv_"+pos).html(rpt[3]);
            $("#action_itinerario_serv_"+pos).html('Agregar<i class="mdi-content-send right"></i>');
            $("#action_itinerario_serv_"+pos).removeClass('green');
            $("#action_itinerario_serv_"+pos).addClass('pink accent-2');
            poner_valor();
            pasartotal(0);
        }
        else{
            // $("#response_tinerario").html(rpt[2]);
            // console.log('error: '+data);
            // $("#response_tinerario").html(data);
        }
    }).fail(function (data) {
        console.log('eroorr: '+data);
    });
}


var idItinerario=0;
function  agarrar(id) {
    idItinerario=id;
}
function poner_valor(){
    // if(esta_en_edicion==0) {
    //     var $frame = $('#desc_itinerario_' + id);
    //     setTimeout(function () {
    //         var doc = $frame;
    //     }, 1);

        // console.log('soltar body: '+valor_html);
        setTimeout(function () {
            ordenar_lista_dias();

        }, 1);
    // }
}
function ordenar_lista_dias(){
    var nroiti=$('#nroItis').val();
    // console.log('nro dias: '+nroiti);
    var pos=1;
    $(".pos_iti").each(function(){
        $(this).html(''+pos);
        pos=pos+1;
        // console.log('se asigno: '+pos);
        // console.log('se asigno: '+pos);
    });
    var $total_itineartio=0;
    $(".precio_itinerario").each(function(){
        $total_itineartio+=parseInt($(this).val());
    });
    console.log('precio iti:'+$total_itineartio);
    $('#totalItinerario').val($total_itineartio);
}
function borrarItinerario(pos,id){
    swal({   title: "Mensaje del sistema",
            text: "Desea borrar este itinerario",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#388E3C",
            confirmButtonText: "Si, borrar ahora!",
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
                $.post($url+'/borrar_paquete_itinerario', {id: id}, function(data) {
                    if(data==1){
                        $('#Itine_'+pos).remove();
                        console.log('correcto: '+data);
                        poner_valor();
                        pasartotal(0);
                    }
                    else{

                    }
                }).fail(function (data) {

                });
                swal("Borrado!", "El servicio fue borrado:)", "success");   }
            else {
                swal("Cancelado", "no se pudo borrar el servicio :(", "error");   }
        });

}

function acomodacion(){
    var totalIti=parseInt($('#totalItinerario').val());

    var $st_2=  ($('#acom_t').val()*$('#t_2').val())+
                ($('#acom_d').val()*$('#d_2').val())+
                ($('#acom_m').val()*$('#m_2').val())+
                ($('#acom_s').val()*$('#s_2').val())+totalIti;

    $('#total2').val($st_2);
    var $st_3=  ($('#acom_t').val()*$('#t_3').val())+
        ($('#acom_d').val()*$('#d_3').val())+
        ($('#acom_m').val()*$('#m_3').val())+
        ($('#acom_s').val()*$('#s_3').val())+totalIti;
    $('#total3').val($st_3);

    var $st_4=  ($('#acom_t').val()*$('#t_4').val())+
        ($('#acom_d').val()*$('#d_4').val())+
        ($('#acom_m').val()*$('#m_4').val())+
        ($('#acom_s').val()*$('#s_4').val())+totalIti;
    $('#total4').val($st_4);

    var $st_5=  ($('#acom_t').val()*$('#t_5').val())+
        ($('#acom_d').val()*$('#d_5').val())+
        ($('#acom_m').val()*$('#m_5').val())+
        ($('#acom_s').val()*$('#s_5').val())+totalIti;
    $('#total5').val($st_5);

    pasartotal(2);
    pasartotal(3);
    pasartotal(4);
    pasartotal(5);

}
function utilidad(acom){
    if(acom==2){
        $('#pventa_2').val(0);
        var u2=parseInt( parseInt(($('#utilidad_2').val()*0.01)*$('#nptotal_2').val())+parseInt($('#nptotal_2').val()));
        $('#pventa_2').val(u2);
    }

    if(acom==3){
        $('#pventa_3').val(0);
        var u3=parseInt( parseInt(($('#utilidad_3').val()*0.01)*$('#nptotal_3').val())+parseInt($('#nptotal_3').val()));
        $('#pventa_3').val(u3);
    }
    if(acom==4){
        $('#pventa_4').val(0);
        var u4=parseInt( parseInt(($('#utilidad_4').val()*0.01)*$('#nptotal_4').val())+parseInt($('#nptotal_4').val()));
        $('#pventa_4').val(u4);
    }
    if(acom==5){
        $('#pventa_5').val(0);
        var u5=parseInt( parseInt(($('#utilidad_5').val()*0.01)*$('#nptotal_5').val())+parseInt($('#nptotal_5').val()));
        $('#pventa_5').val(u5);
    }
}
function pasartotal(acom){
    // $('#vstar_2').val(1);
    // console.log('vstar2:'+$('#vstar_2').val());
    var $itinerario=parseInt($('#totalItinerario').val());
    console.log('total iti: '+$itinerario);
    $('#preciov_2_t').html('0.00');
    $('#preciov_2_d').html('0.00');
    $('#preciov_2_m').html('0.00');
    $('#preciov_2_s').html('0.00');

    $('#preciov_3_t').html('0.00');
    $('#preciov_3_d').html('0.00');
    $('#preciov_3_m').html('0.00');
    $('#preciov_3_s').html('0.00');

    $('#preciov_4_t').html('0.00');
    $('#preciov_4_d').html('0.00');
    $('#preciov_4_m').html('0.00');
    $('#preciov_4_s').html('0.00');

    $('#preciov_5_t').html('0.00');
    $('#preciov_5_d').html('0.00');
    $('#preciov_5_m').html('0.00');
    $('#preciov_5_s').html('0.00');
    if(acom==2) {
        $('#vstar_2').val(0);
    }
    if(acom==3) {
        $('#vstar_3').val(0);
    }
    if(acom==4) {
        $('#vstar_4').val(0);
    }
    if(acom==5) {
        $('#vstar_5').val(0);
    }
    if( $('#star'+acom).is(':checked') ) {
        $('#vstar_'+acom).val(1);
        // utilidad(acom);
    }

    var $t2=((parseInt($('#duracion_m').val())*parseInt($('#t_2').val()))+$itinerario);
    var $d2=((parseInt($('#duracion_m').val())*parseInt($('#d_2').val()))+$itinerario);
    var $m2=((parseInt($('#duracion_m').val())*parseInt($('#m_2').val()))+$itinerario);
    var $s2=((parseInt($('#duracion_m').val())*parseInt($('#s_2').val()))+$itinerario);
    var $tu2=($t2+($t2*(parseInt($('#utilidad_2').val())*0.01)));
    var $mu2=($m2+($m2*(parseInt($('#utilidad_2').val())*0.01)));
    var $du2=($d2+($d2*(parseInt($('#utilidad_2').val())*0.01)));
    var $su2=($s2+($s2*(parseInt($('#utilidad_2').val())*0.01)));

    var $t3=((parseInt($('#duracion_m').val())*parseInt($('#t_3').val()))+$itinerario);
    var $d3=((parseInt($('#duracion_m').val())*parseInt($('#d_3').val()))+$itinerario);
    var $m3=((parseInt($('#duracion_m').val())*parseInt($('#m_3').val()))+$itinerario);
    var $s3=((parseInt($('#duracion_m').val())*parseInt($('#s_3').val()))+$itinerario);
    var $tu3=($t3+($t3*(parseInt($('#utilidad_3').val())*0.01)));
    var $mu3=($m3+($m3*(parseInt($('#utilidad_3').val())*0.01)));
    var $du3=($d3+($d3*(parseInt($('#utilidad_3').val())*0.01)));
    var $su3=($s3+($s3*(parseInt($('#utilidad_3').val())*0.01)));
    //
    var $t4=((parseInt($('#duracion_m').val())*parseInt($('#t_4').val()))+$itinerario);
    var $d4=((parseInt($('#duracion_m').val())*parseInt($('#d_4').val()))+$itinerario);
    var $m4=((parseInt($('#duracion_m').val())*parseInt($('#m_4').val()))+$itinerario);
    var $s4=((parseInt($('#duracion_m').val())*parseInt($('#s_4').val()))+$itinerario);
    var $tu4=($t4+($t4*(parseInt($('#utilidad_4').val())*0.01)));
    var $mu4=($m4+($m4*(parseInt($('#utilidad_4').val())*0.01)));
    var $du4=($d4+($d4*(parseInt($('#utilidad_4').val())*0.01)));
    var $su4=($s4+($s4*(parseInt($('#utilidad_4').val())*0.01)));
    //
    var $t5=((parseInt($('#duracion_m').val())*parseInt($('#t_5').val()))+$itinerario);
    var $d5=((parseInt($('#duracion_m').val())*parseInt($('#d_5').val()))+$itinerario);
    var $m5=((parseInt($('#duracion_m').val())*parseInt($('#m_5').val()))+$itinerario);
    var $s5=((parseInt($('#duracion_m').val())*parseInt($('#s_5').val()))+$itinerario);
    var $tu5=($t5+($t5*(parseInt($('#utilidad_5').val())*0.01)));
    var $mu5=($m5+($m5*(parseInt($('#utilidad_5').val())*0.01)));
    var $du5=($d5+($d5*(parseInt($('#utilidad_5').val())*0.01)));
    var $su5=($s5+($s5*(parseInt($('#utilidad_5').val())*0.01)));



    $('#ptotal2').html($itinerario);
    $('#ptotal3').html($itinerario);
    $('#ptotal4').html($itinerario);
    $('#ptotal5').html($itinerario);



    $('#preciov_2_t').html(parseInt($tu2));
    $('#preciov_2_d').html(parseInt($du2));
    $('#preciov_2_m').html(parseInt($mu2));
    $('#preciov_2_s').html(parseInt($su2));

    $('#preciov_3_t').html(parseInt($tu3));
    $('#preciov_3_d').html(parseInt($du3));
    $('#preciov_3_m').html(parseInt($mu3));
    $('#preciov_3_s').html(parseInt($su3));

    $('#preciov_4_t').html(parseInt($tu4));
    $('#preciov_4_d').html(parseInt($du4));
    $('#preciov_4_m').html(parseInt($mu4));
    $('#preciov_4_s').html(parseInt($su4));

    $('#preciov_5_t').html(parseInt($tu5));
    $('#preciov_5_d').html(parseInt($du5));
    $('#preciov_5_m').html(parseInt($mu5));
    $('#preciov_5_s').html(parseInt($su5));
}
function enviarPlan(id,cliente_id){
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
                $('#send'+id).html('<div class="progress">'+
                    '<div class="indeterminate"></div>'+
                    '</div>');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').val()
                    }
                });
                $.post($url+'/enviar_plan', {id: id,cliente_id:cliente_id}, function(markup) {
                    if(markup=='1'){
                        $('#send'+id).html('<i class="mdi-content-send"></i>');
                        $('#send'+id).removeClass('green-text');
                        $('#send'+id).addClass('grey-text');
                        // $.getScript('https://code.jquery.com/ui/1.12.1/jquery-ui.js');
                        // console.log(markup);
                    }
                    else if(markup=='0'){
                        // console.log('error de registro cerrarmos :'+markup);
                    }
                }).fail(function (markup) {
                    // console.log('Fail cerrarmos :'+markup);
                });
                swal("Enviado!", "Tu plan fue enviado :)", "success");   }
            else {
                swal("Cancelado", "no se puedo enviar tu plan :(", "error");   }
        });
}
function recalcular_ordenes(){

}
function eliminar_servicio(id){
    swal({   title: "Mensaje del sistema",
            text: "Desea borrar el servicio",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#388E3C",
            confirmButtonText: "Si, borrar ahora!",
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
                $.post($url+'/borrar_orden_itinerario', {id: id}, function(data) {
                    if(data==1){
                        $('#servicio_'+id).remove();
                        console.log('correcto: '+data);
                        recalcular_ordenes();
                        poner_valor();
                        pasartotal(0);
                    }
                    else{

                    }
                }).fail(function (data) {

                });
                swal("Borrado!", "El servicio fue borrado:)", "success");   }
            else {
                swal("Cancelado", "no se pudo borrar el servicio :(", "error");   }
        });
}
function agregar_servicio(pos){
    $("#action_agregar_servicio_"+pos).html('Enviando<i class="mdi-action-autorenew right"></i>');
    $("#action_agregar_servicio_"+pos).addClass('green');
    var nombre='frm_agregar_servicio_'+pos;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.post($url+'/guardar_itinerario_servicio', $('#'+nombre).serialize(), function(data) {
        console.log('datos: '+data);
        if(data!='0') {
            $("#action_agregar_servicio_"+pos).html('Agregar<i class="mdi-content-send right"></i>');
            $("#action_agregar_servicio_"+pos).removeClass('green');
            $("#action_agregar_servicio_"+pos).addClass('pink accent-2');

            // for (var ele in data) {
            //     //1era iteración: ele === 1
            //     //2da iteración: ele === 2
            //     //demas iteraciones: metodos y propiedades del array.
            // }
            console.log('respuesta');
            console.log('datos: '+data);
            for (var ele in data) {
                var $dato=ele.split('_');
                $("#itineraio_orden_"+pos).prepend(
                    '<tr id="servicio_'+$dato[0]+'">'+
                    '<td>'+$dato[1]+'</td>'+
                    '<td id="iti_precio_serv_'+$dato[0]+'">'+$dato[2]+'</td>'+
                    '<td class="right-align">'+
                    '<a href="#modal_edit_serv_'+$dato[0]+'" class="modal-trigger blue-text "><i class="mdi-editor-mode-edit"></i></a>'+
                    '<a href="#!" class="red-text" onclick="eliminar_servicio('+$dato[0]+')"><i class="mdi-action-delete"></i></a>'+
                    '</td>'+
                    '</tr>'
                );
            }
            recalcular_ordenes();
            poner_valor();
            pasartotal(0);

        }
        else{
            // $("#response_tinerario").html(rpt[2]);
            // console.log('error: '+data);
            // $("#response_tinerario").html(data);
        }
    }).fail(function (data) {
        console.log('eroorr: '+data);
    });
}

function nuevoPlan(id){
    var nropasajeros=$('#nropasajeros_'+id).val();
    var email3=$('#email3_'+id).val();
    var fecha=$('#fecha_'+id).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.post($url+'/guardar_itinerario_servicio',{nropasajeros:nropasajeros,email3:email3,fecha:fecha}, function(data) {

    }).fail(function (data) {
        console.log('eroorr: '+data);
    });
}

function enviar_pqt(pos){

    $("#action_itinerario_"+pos).html('Enviando<i class="mdi-action-autorenew right"></i>');
    $("#action_itinerario_"+pos).addClass('green');
    var nombre='form_editar_itinerario_'+pos;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.post($url+'/editar_paquete_nuevo_itinerario', $('#'+nombre).serialize(), function(data) {
        var rpt=data.split('_');
        console.log('resultados: '+data);
        if(rpt[1]==1) {
            console.log('correcto: '+data);
            // $("#response_tinerario").html('aaaa'+rpt[2]);
            $("#titulo_iti_"+pos).html(rpt[3]);
            $("#descrp_"+pos).html(rpt[4]);
            $("#action_itinerario_"+pos).html('Agregar<i class="mdi-content-send right"></i>');
            $("#action_itinerario_"+pos).removeClass('green');
            $("#action_itinerario_"+pos).addClass('pink accent-2');

        }
        else{
            $("#response_tinerario_"+pos).html(rpt[2]);
            console.log('error: '+data);
            // $("#response_tinerario").html(data);
        }
    }).fail(function (data) {
        console.log('eroorr: '+data);
    });
}
function borrarItinerario_pqt(pos,id){
    swal({   title: "Mensaje del sistema",
            text: "Desea borrar este itinerario",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#388E3C",
            confirmButtonText: "Si, borrar ahora!",
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
                $.post($url+'/borrar_paquete_nuevo_itinerario', {id: id}, function(data) {
                    if(data==1){
                        $('#Itine_'+pos).remove();
                        console.log('correcto: '+data);
                        poner_valor();
                        pasartotal(0);
                    }
                    else{

                    }
                }).fail(function (data) {
                    console.log(data);
                });
                // swal("Borrado!", "El servicio fue borrado:)", "success");
                swal.close();
            }
            else {
                swal("Cancelado", "no se pudo borrar el servicio :(", "error");   }
        });

}

function enviar_obs_nuevo(pos){

    $("#action_itinerario_obs_"+pos).html('Enviando<i class="mdi-action-autorenew right"></i>');
    $("#action_itinerario_obs_"+pos).addClass('green');
    var nombre='form_editar_itinerario_obs_'+pos;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.post($url+'/editar_nuevo_paquete_itinerario_obs', $('#'+nombre).serialize(), function(data) {
        var rpt=data.split('_');
        console.log('resultados: '+data);
        if(rpt[1]==1) {
            console.log('correcto: '+data);
            // $("#response_tinerario").html('aaaa'+rpt[2]);
            // $("#titulo_iti_"+pos).html(rpt[3]);
            $("#observaciones_iti_"+pos).html(rpt[3]);
            $("#action_itinerario_obs_"+pos).html('Agregar<i class="mdi-content-send right"></i>');
            $("#action_itinerario_obs_"+pos).removeClass('green');
            $("#action_itinerario_obs_"+pos).addClass('pink accent-2');

        }
        else{
            // $("#response_tinerario").html(rpt[2]);
            // console.log('error: '+data);
            // $("#response_tinerario").html(data);
        }
    }).fail(function (data) {
        console.log('eroorr: '+data);
    });
}

function agregar_servicio_pqt(pos){
    $("#action_agregar_servicio_"+pos).html('Enviando<i class="mdi-action-autorenew right"></i>');
    $("#action_agregar_servicio_"+pos).addClass('green');
    var nombre='frm_agregar_servicio_'+pos;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.post($url+'/guardar_itinerario_servicio_nuevo', $('#'+nombre).serialize(), function(data) {
        console.log('datos: '+data);
        if(data!='0') {
            $("#action_agregar_servicio_"+pos).html('Agregar<i class="mdi-content-send right"></i>');
            $("#action_agregar_servicio_"+pos).removeClass('green');
            $("#action_agregar_servicio_"+pos).addClass('pink accent-2');

            // for (var ele in data) {
            //     //1era iteración: ele === 1
            //     //2da iteración: ele === 2
            //     //demas iteraciones: metodos y propiedades del array.
            // }
            // var $data=data.split(',');
            $.each(data, function(i, item){
                console.log(item);
                var $dato=item.split('_');
                $("#itineraio_orden_"+pos).prepend(
                    // +'/'+$dato[1]+'/'+$dato[2]
                    '<tr id="servicio_'+$dato[0]+'">'+
                    '<td>'+$dato[1]+'</td>'+
                    '<td id="iti_precio_serv_'+$dato[0]+'">'+$dato[2]+'</td>'+
                    '<td class="right-align">'+
                    '<a href="#modal_edit_serv_'+$dato[0]+'" class="modal-trigger blue-text "><i class="mdi-editor-mode-edit"></i></a>'+
                    '<a href="#!" class="red-text" onclick="eliminar_servicio_pqt('+$dato[0]+')"><i class="mdi-action-delete"></i></a>'+
                    '</td>'+
                    '</tr>'
                );
            });
            // for (var ele in data) {
            //     console.log('orden: '+data[ele]);
            //     var $dato=ele.split('_');
            //     $("#itineraio_orden_"+pos).prepend(
            //         '<tr id="servicio_'+$dato[0]+'">'+
            //         '<td>'+$dato[1]+'</td>'+
            //         '<td id="iti_precio_serv_'+$dato[0]+'">'+$dato[2]+'</td>'+
            //         '<td class="right-align">'+
            //         '<a href="#modal_edit_serv_'+$dato[0]+'" class="modal-trigger blue-text "><i class="mdi-editor-mode-edit"></i></a>'+
            //         '<a href="#!" class="red-text" onclick="eliminar_servicio_pqt('+$dato[0]+')"><i class="mdi-action-delete"></i></a>'+
            //         '</td>'+
            //         '</tr>'
            //     );
            // }
            recalcular_ordenes();
            poner_valor();
            pasartotal(0);

        }
        else{
            // $("#response_tinerario").html(rpt[2]);
            // console.log('error: '+data);
            // $("#response_tinerario").html(data);
        }
    }).fail(function (data) {
        console.log('eroorr: '+data);
    });
}
function enviar_serv_pqt(pos){

    $("#action_itinerario_serv_"+pos).html('Enviando<i class="mdi-action-autorenew right"></i>');
    $("#action_itinerario_serv_"+pos).addClass('green');
    var nombre='form_editar_itinerario_serv_'+pos;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.post($url+'/editar_paquete_itinerario_serv_pqt', $('#'+nombre).serialize(), function(data) {
        var rpt=data.split('_');
        // console.log('resultados: '+data);
        if(rpt[1]==1) {
            console.log('correcto: '+data);
            // $("#response_tinerario").html('aaaa'+rpt[2]);
            // $("#titulo_iti_"+pos).html(rpt[3]);
            $("#iti_precio_serv_"+pos).html(rpt[3]);
            $("#action_itinerario_serv_"+pos).html('Agregar<i class="mdi-content-send right"></i>');
            $("#action_itinerario_serv_"+pos).removeClass('green');
            $("#action_itinerario_serv_"+pos).addClass('pink accent-2');
            poner_valor();
            pasartotal(0);
        }
        else{
            // $("#response_tinerario").html(rpt[2]);
            // console.log('error: '+data);
            // $("#response_tinerario").html(data);
        }
    }).fail(function (data) {
        console.log('eroorr: '+data);
    });
}