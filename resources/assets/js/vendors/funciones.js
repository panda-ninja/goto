
$(document).ready(function(){
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
});
function submit(pos){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.ajax({
        url: '/editar_paquete_itinerario',//action del formulario, ej:
        //http://localhost/mi_proyecto/mi_controlador/mi_funcion
        type: 'post',//el método post o get del formulario
        data: $('#form_editar_itinerario_'+pos).serialize(),//obtenemos todos los datos del formulario
        error: function(data){
            console.log('eroorr: '+data);
        },
        success:function(data){
            //hacemos algo cuando finalice
            var rpt=data.split('_');
            console.log('resultados: '+data);
            if(rpt[1]==1) {
                console.log('correcto: '+data);
                // $("#response").html(data[1]);
                // $("#action_itinerario_"+pos).html('Datos enviados<i class="mdi-content-send right"></i>');
                // $("#action_itinerario_"+pos).addClass('green');
            }
            else{
                console.log('error: '+data);
                // $("#response_tinerario").html(data);
            }

        }
    });
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    $.post('/borrar_paquete_itinerario', {id: id}, function(data) {
        if(data==1){
            $('#Itine_'+pos).remove();
            console.log('correcto: '+data);
            poner_valor();
        }
        else{

        }
    }).fail(function (data) {

    });
}

function acomodacion(){
    var $st_2=  ($('#acom_t').val()*$('#t_2').val())+
                ($('#acom_d').val()*$('#d_2').val())+
                ($('#acom_m').val()*$('#m_2').val())+
                ($('#acom_s').val()*$('#s_2').val());

    $('#total2').val($st_2);
    var $st_3=  ($('#acom_t').val()*$('#t_3').val())+
        ($('#acom_d').val()*$('#d_3').val())+
        ($('#acom_m').val()*$('#m_3').val())+
        ($('#acom_s').val()*$('#s_3').val());
    $('#total3').val($st_3);

    var $st_4=  ($('#acom_t').val()*$('#t_4').val())+
        ($('#acom_d').val()*$('#d_4').val())+
        ($('#acom_m').val()*$('#m_4').val())+
        ($('#acom_s').val()*$('#s_4').val());
    $('#total4').val($st_4);

    var $st_5=  ($('#acom_t').val()*$('#t_5').val())+
        ($('#acom_d').val()*$('#d_5').val())+
        ($('#acom_m').val()*$('#m_5').val())+
        ($('#acom_s').val()*$('#s_5').val());
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

    if(acom==2) {
        $('#ptotal2').html('0');
        $('#nptotal_2').val(0);
        $('#vstar_2').val(0);
        $('#pventa_2').val(0);
    }
    if(acom==3) {
        $('#ptotal3').html('0');
        $('#nptotal_3').val(0);
        $('#vstar_3').val(0);
        $('#pventa_3').val(0);

    }
    if(acom==4) {
        $('#ptotal4').html('0');
        $('#nptotal_4').val(0);
        $('#vstar_4').val(0);
        $('#pventa_4').val(0);
    }
    if(acom==5) {
        $('#ptotal5').html('0');
        $('#nptotal_5').val(0);
        $('#vstar_5').val(0);
        $('#pventa_5').val(0);
    }
    if( $('#star'+acom).is(':checked') ) {
        console.log('esta marcado:'+acom);
        var $ss=$('#total'+acom).val();
        console.log('ss:'+$ss);
        $('#ptotal'+acom).html($ss);
        $('#nptotal_'+acom).val($ss);
        $('#vstar_'+acom).val(1);
        $('#pventa_'+acom).val($ss);
        utilidad(acom);
    }
}

