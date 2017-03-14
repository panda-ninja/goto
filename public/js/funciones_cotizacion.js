function iniciacion(){
    $( ".column" ).sortable({
        connectWith: ".column",
        handle: ".portlet-header",
        cancel: ".portlet-toggle",
        placeholder: "portlet-placeholder ui-corner-all"
    });

    $( ".portlet" )
        .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
        .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span class='ui-icon ui-icon-plusthick portlet-toggle'></span>");

    $( ".portlet-toggle" ).on( "click", function() {
        var icon = $( this );
        icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
        icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();

    });

}
 $( function() {
     iniciacion();
} );
$('.fixed-action-btn').openFAB();
$('.fixed-action-btn').closeFAB();
var nro_iti=0;
$('.modal-trigger').leanModal({
    dismissible: false, // Modal can be dismissed by clicking outside of the modal
    opacity: 0.5, // Opacity of modal background
    in_duration: 300, // Transition in duration
    out_duration: 200, // Transition out duration
    ready: function() {
        //alert('Ready');
    }, // Callback for Modal open
    complete: function() {
        //alert('Closed');
    } // Callback for Modal close
});
$('#agregar_dia').click(function(){
    var total=0;
    $("input[name=chb_itinerario_n]").each(function (index) {
        if($(this).is(':checked')){
            var itine = $(this).val().split('[');
            // alert(itine[0]+'_'+itine[1]);
            var nroPa=$('#nropasajeros').val();
            total=$('#nroItis').val();
            nro_iti=parseInt(total)+1;
            $('#nroItis').val(nro_iti);
            $('.lista_itinerario').append(''+
                '<div id="Itine_'+nro_iti+'" class="portlet">'+
                '<div class="col m9"><div id="pl_h_'+nro_iti+'" class="portlet-header"  onmousedown="Pasar_datos(\''+nro_iti+'\',\''+nro_iti+'\',\''+itine[0]+'\')"><span class="cursor-move">DAY <span class="pos_iti" name="posdia[]" id="pos_dia_'+nro_iti+'">'+nro_iti+'</span>: <i id="titulo_'+nro_iti+'">'+itine[0]+'</i>($ <b class="green-text" id="subtotal_itineraio_dia'+nro_iti+'">0.00</b> for person)</span> </div></div>'+
                '<div class="col m3"><a class="modal-trigger blue-text right" href="#!" onclick="mostrar_modal('+nro_iti+')"><i class="mdi-action-settings small"></i></a> <a href="#!" class="red-text text-darken-2 right" onclick="borrar_itinerario('+nro_iti+')"><i class="mdi-action-delete small"></i></a></div>'+
                '<div class="portlet-content" onmouseenter="estado_edicion(1)" onmouseleave="estado_edicion(0)">'+
                '<div class="row">'+
                '<div class="col s12">'+
                '<span class="grey-text text-darken-3">'+
                '<input name="titulo_itinerario" id="titulo_itinerario_'+nro_iti+'" type="text" value="'+itine[0]+'" placeholder="Ingrese el titulo">'+
                // '<span>$ <span id="iti_precio'+nro_iti+'" class="blue-text">0</span></span>'+
                '<input name="precio_itinerario" id="precio_itinerario_'+nro_iti+'" type="text" value="0" placeholder="Precio" onchange="cambiar_precio_iti('+nro_iti+')">'+
                '</span>'+
                '</div>'+
                '</div>'+
                '<textarea  name="desc_itinerario[]" id="desc_itinerario_'+nro_iti+'">'+itine[1]+
                '</textarea>'+
                '</div>'+
                '</div>'+
                '<script>'+
                '$(function(){'+
                '$(\'#desc_itinerario_'+nro_iti+'\')'+
                '.on(\'froalaEditor.initialized\', function (e, editor) {'+
                '$(\'#desc_itinerario_'+nro_iti+'\').parents(\'form\').on(\'submit\', function () {'+
                '  })'+
                '})'+
                '.froalaEditor({iframe:false,enter: $.FroalaEditor.ENTER_P, placeholderText: null});'+
                '$(\'#titulo_itinerario_'+nro_iti+'\').keypress(function() {'+
                '$(\'#titulo_'+nro_iti+'\').html($(\'#titulo_itinerario_'+nro_iti+'\').val());'+
                '});'+
                '$(\'#titulo_itinerario_'+nro_iti+'\').keydown(function() {'+
                '$(\'#titulo_'+nro_iti+'\').html($(\'#titulo_itinerario_'+nro_iti+'\').val());'+
                '});'+
                '$(\'#titulo_itinerario_'+nro_iti+'\').keyup(function() {'+
                '$(\'#titulo_'+nro_iti+'\').html($(\'#titulo_itinerario_'+nro_iti+'\').val());'+
                '});'+
                '});'+
                '</script>');

            $('#Itine_'+nro_iti)
                .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
                .find( ".portlet-header" )
                .addClass( "ui-widget-header ui-corner-all" )
                .prepend( "<span class='ui-icon ui-icon-plusthick portlet-toggle'></span>");

            $('#pl_h_'+nro_iti).on( "click", function() {
                var icon = $( this );
                icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
                icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();

            });
            sumatotal();
            $('#buscar').val('');
            $('#jalar_iti').html('');
            $('#modales').append('' +
                '<div id="modal_'+nro_iti+'" class="modal modal-fixed-footer open" style="z-index: 1003; display: none; opacity: 1; transform: scaleX(1); top: 10%;">'+
                '<div class="modal-content">'+
                    '<div class="row">'+
                          '<div class="input-field col s3">'+
                            '<select name="orden_nombre" id="modal_orden_'+nro_iti+'">' +
                                '<option value="0" disabled selected>Escoja un tipo de orden</option>'+
                                '<option value="1">Option 1</option>'+
                                '<option value="2">Option 2</option>'+
                                '<option value="3">Option 3</option>'+
                                '<option value="4">Option 4</option>'+
                                '<option value="5">Option 5</option>'+
                                '<option value="6">Option 6</option>'+
                            '</select>'+
                            '<label for="modal_orden_'+nro_iti+'" class="active">Orden</label>'+
                        '</div>'+
                        '<div class="input-field col s2">'+
                            '<input name="orden_precio" id="modal_precio_'+nro_iti+'" type="number" min="0" class="validate">'+
                            '<label for="modal_precio_'+nro_iti+'" class="">Precio</label>'+
                        '</div>'+
                        '<div class="input-field col s7">'+
                            '<textarea name="orden_observaciones" id="modal_textarea_'+nro_iti+'" class="materialize-textarea"></textarea>'+
                            '<label for="modal_textarea_'+nro_iti+'" class="">Observaciones</label>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row">' +
                        '<div class="input-field col s6">'+
                            '<a href="#!" class="waves-effect waves-light  btn green" onclick="guardar_modal('+nro_iti+')">Agregar</a>'+
                        '</div>'+
                    '</div>'+
                    '<hr>'+
                    '<div class="row">'+
                        '<div class="col m12">' +
                        '<h4>Lista de ordenes</h4>'+
                            '<table class="striped">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th data-field="id">Orden</th>'+
                                        '<th data-field="name">Precio</th>'+
                                        '<th data-field="price">Observaciones</th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody id="Lista_ordenes_'+nro_iti+'">'+
                                '</tbody>'+
                            '</table>'+
                            '<table class="striped">'+
                                '<tbody>'+
                                    '<tr>'+
                                    '<td><b>Total</b></td>'+
                                    '<td><b id="subtotal_itineraio_dia_pre_'+nro_iti+'"></b></td>'+
                                    '<td></td>'+
                                    '</tr>'+
                                '</tbody>'+
                            '</table>'+
                        '</div>'+
                    '</div>'+
              '</div>'+
            '<div class="modal-footer">'+
                '<a href="#" onclick="ocultar_modal('+nro_iti+')" class="waves-effect waves-red btn-flat modal-action modal-close">Cerrar</a>'+
                '<a href="#" onclick="ocultar_modal1('+nro_iti+')" class="waves-effect waves-green btn-flat modal-action modal-close">Guardar</a>'+
                '</div>'+
                '</div>');
        }
    });
    });
function mostrar_modal(modal){
    // alert('se hizo click para mostarr el modal');
    var aa='#modal_'+modal;
    $('#modal_'+modal).show();
    // $('#modal_'+modal).css({'display':'block'});
    $('#modal_orden_'+modal).material_select();
}
function ocultar_modal1(modal){
    var su=calcular_suma_iti_dia(modal);
    $('#subtotal_itineraio_dia'+modal).html(su);
    $('#precio_itinerario_'+modal).val(su);
    sumatotal();
    var aa='#modal_'+modal;
    $(aa).hide();
    // $(aa).css({'display':'block'});
    // $('#modal_'+modal).modal();
}
function ocultar_modal(modal){
    var aa='#modal_'+modal;
    $(aa).hide();
    // $(aa).css({'display':'block'});
    // $('#modal_'+modal).modal();
}
function guardar_modal(modal){
    $('#Lista_ordenes_'+modal).append(''+
        '<tr>'+
        '<td><input type="hidden" name="orden_nombre_'+modal+'" value="'+$('#modal_orden_'+modal).val()+'">'+$('#modal_orden_'+modal).val()+'</td>'+
        '<td><input type="hidden" name="orden_precio_'+modal+'" value="'+$('#modal_precio_'+modal).val()+'">'+$('#modal_precio_'+modal).val()+'</td>'+
        '<td><input type="hidden" name="orden_observacion_'+modal+'" value="'+$('#modal_textarea_'+modal).val()+'">'+$('#modal_textarea_'+modal).val()+'</td>'+
        '</tr>');
    $("#modal_orden_"+modal+" option[value=0]").attr("selected",true);
    $('#modal_precio_'+modal).val('0');
    $('#modal_textarea_'+modal).val('');
    var su=calcular_suma_iti_dia(modal);
    console.log('suma:'+su);
    $('#subtotal_itineraio_dia_pre_'+modal).html(su);
}

function calcular_suma_iti_dia(modal){
    var sub_total_itinerario=0;
    $("input[name=orden_precio_"+modal+"]").each(function (index) {
        sub_total_itinerario+=parseInt($(this).val());
    });
    return sub_total_itinerario;
}

var dia=0;
var titulo=0;
var id=0;
var atotal_itinerartio=0;
var atotal_total=0;

function sumatotal() {
    sumar_acomo_actual();
    sumatitineraios();
    console.log('total itinerarios:'+atotal_itinerartio);
    atotal_total = atotal + atotal_itinerartio;
    $('#total').html(atotal_total);
}

function sumatitineraios(){
    var nroPa=$('#nropasajeros').val();
    console.log('nro pasajeros:'+nroPa);
    console.log('nro itinerarios:'+nro_iti);
    atotal_itinerartio=0;

    $("input[name=precio_itinerario]").each(function (index) {
        atotal_itinerartio+=(nroPa*parseInt($(this).val()));
    });
    // for(var i=1;i<=nro_iti;i++){
    //     atotal_itinerartio+=(nroPa*parseInt($('#precio_itinerario_'+i).val()));
    // }
    console.log('total:'+atotal_itinerartio);
}
function borrar_itinerario(id1){
    // alert('hola:'+id1);
        if(id1>0){
            swal({   title: "Esta seguro?",
                    text: "Eliminar el registro 'DIA "+dia+" : "+titulo,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#4CAF50",
                    confirmButtonText: "Si, Borrar ahora!",
                    cancelButtonText: "No, Cancelar por favor!",
                    closeOnConfirm: false,
                    closeOnCancel: false },
                function(isConfirm){
                    if (isConfirm) {
                        $('#Itine_'+id1).remove();
                        nro_iti--;
                        sumatotal();
                        swal("Borrado!", "Tu registro fue borrado :(", "success");   }
                    else {
                        swal("Cancelado", "Tu registro esta seguro :)", "error");   }
                });
        }
    }


var valor_head='';
var valor_body='';
var valor_html='';
function Pasar_datos(pid,pdia,ptitulo) {
    id = pid;
    dia = pdia;
    titulo = ptitulo;
    var $frame = $('#desc_itinerario_' + id);
    setTimeout( function() {
        var doc = $frame;

        valor_html=doc.html();

    }, 1 );
    console.log('paso el mouse encima:'+id);
    // console.log('click html: '+valor_html);
}
var esta_en_edicion=0;
function poner_valor(){
     if(esta_en_edicion==0) {
        var $frame = $('#desc_itinerario_' + id);
        setTimeout(function () {
            var doc = $frame;
             }, 1);

         // console.log('soltar body: '+valor_html);
         setTimeout(function () {
             ordenar_lista_dias();

         }, 1);
     }
}

 function estado_edicion(valor){
     esta_en_edicion=valor;
     // if(esta_en_edicion==1)
     //    console.log('Si esta en edicion');
     // else if(esta_en_edicion==0)
     //     console.log('No esta en edicion');
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
 }
function Mostrar_busqueda_text(){
    $('#buscar_iti').removeClass('hide');
    $('#jalar_iti').addClass('hide');
}
function Mostrar_busqueda_jalar(){
    $('#buscar_iti').addClass('hide');
    $('#jalar_iti').removeClass('hide');
}
var atipo=2;
var atotal=0;
function sumar_acomo_actual(){
    var fila_t=0;
    var fila_d=0;
    var fila_m=0;
    var fila_s=0;
    var nropasajeros=$('#nropasajeros').val();
    var nro_pa_t=0;
    var nro_pa_d=0;
    var nro_pa_m=0;
    var nro_pa_s=0;
    nro_pa_t=$('#room_t').val();
    nro_pa_d=$('#room_d').val();
    nro_pa_m=$('#room_m').val();
    nro_pa_s=$('#room_s').val();
    console.log(nro_pa_t);
    console.log(nro_pa_d);
    console.log(nro_pa_m);
    console.log(nro_pa_s);

    fila_t=parseInt(nro_pa_t)*parseInt($('#precio_'+atipo+'_t').val())*3;
    fila_d=parseInt(nro_pa_d)*parseInt($('#precio_'+atipo+'_d').val())*2;
    fila_m=parseInt(nro_pa_m)*parseInt($('#precio_'+atipo+'_d_m').val())*2;
    fila_s=parseInt(nro_pa_s)*parseInt($('#precio_'+atipo+'_s').val());

    atotal=fila_t+fila_d+fila_m+fila_s;
    // sumatitineraios();
    // atotal_total=atotal+atotal_itinerartio;
    // $('#total').html(atotal_total);

    // console.log('fila_t:'+$('#room_t').val()+'_'+$('#precio_'+atipo+'_t').val()+'\n');
    // console.log('fila_d:'+$('#room_d').val()+'_'+$('#precio_'+atipo+'_d').val()+'\n');
    // console.log('fila_m:'+$('#room_m').val()+'_'+$('#precio_'+atipo+'_d_m').val()+'\n');
    // console.log('fila_s:'+$('#room_s').val()+'_'+$('#precio_'+atipo+'_s').val()+'\n');
    //
    // console.log('total pivot:'+atotal);

}
function foco_acomodacion(tipo){
    atipo=tipo;
    $('#aco2').removeClass('color_oro');
    $('#aco3').removeClass('color_oro');
    $('#aco4').removeClass('color_oro');
    $('#aco5').removeClass('color_oro');

    $('#aco12').removeClass('color_oro');
    $('#aco13').removeClass('color_oro');
    $('#aco14').removeClass('color_oro');
    $('#aco15').removeClass('color_oro');

    $('#aco22').removeClass('color_oro');
    $('#aco23').removeClass('color_oro');
    $('#aco24').removeClass('color_oro');
    $('#aco25').removeClass('color_oro');

    $('#aco32').removeClass('color_oro');
    $('#aco33').removeClass('color_oro');
    $('#aco34').removeClass('color_oro');
    $('#aco35').removeClass('color_oro');

    $('#aco42').removeClass('color_oro');
    $('#aco43').removeClass('color_oro');
    $('#aco44').removeClass('color_oro');
    $('#aco45').removeClass('color_oro');

    $('#aco1'+atipo).addClass('color_oro');
    $('#aco2'+atipo).addClass('color_oro');
    $('#aco3'+atipo).addClass('color_oro');
    $('#aco4'+atipo).addClass('color_oro');
    $('#aco'+atipo).addClass('color_oro');

    // $('#titu_aco2').removeClass('letra-roja');
    // $('#titu_aco3').removeClass('letra-roja');
    // $('#titu_aco4').removeClass('letra-roja');
    // $('#titu_aco5').removeClass('letra-roja');

    $('#titu_aco2').removeClass('color_oro');
    $('#titu_aco3').removeClass('color_oro');
    $('#titu_aco4').removeClass('color_oro');
    $('#titu_aco5').removeClass('color_oro');


    $('#titu_aco'+atipo).addClass('color_oro');
    sumatotal();
}



function coti_romms(acom){
    var nro_pa_t=0;
    var nro_pa_d=0;
    var nro_pa_m=0;
    var nro_pa_s=0;
    nro_pa_t=parseInt($('#room_t').val())*3;
    nro_pa_d=parseInt($('#room_d').val())*2;
    nro_pa_m=parseInt($('#room_m').val())*2;
    nro_pa_s=parseInt($('#room_s').val());
    var pre_nropasajeros=nro_pa_t+nro_pa_d+nro_pa_m+nro_pa_s;
    var nropasajeros=$('#nropasajeros').val();
    console.log(pre_nropasajeros+' '+nropasajeros);
        if(pre_nropasajeros<=nropasajeros) {
            sumatotal();
        }else{
            swal({
                    title: "Mensaje del sistema",
                    text: "Se supero el maximo de pasajeros para esta cotizacion",
                    type: "error",
                    timer:5000
                });
            $('#room_'+acom).val(0);
            sumatotal();
            $('#room_'+acom).focus();
        }
}
function coti_precio_acom(acom1,tipo1){
    sumatotal();
}

// function generar_pqt(){
//     var titulo=$('#titulo_plan').val();
//     var dia=$('#dias_plan').val();
//     swal({   title: "Mensaje del sistema",
//             text: "Esta seguro de generar el plan "+titulo+" : "+dia,
//             type: "question",
//             showCancelButton: true,
//             confirmButtonColor: "#DD6B55",
//             confirmButtonText: "Si, Generar ahora!",
//             cancelButtonText: "No, Cancelar por favor!",
//             closeOnConfirm: false,
//             closeOnCancel: false },
//         function(isConfirm){
//
//
//             // if (isConfirm) {
//             //     swal("Borrado!", "Tu registro fue borrado :(", "success");   }
//             // else {
//             //     swal("Cancelado", "Tu registro esta seguro :)", "error");   }
//         });
// }


//# sourceMappingURL=funciones_cotizacion.js.map
