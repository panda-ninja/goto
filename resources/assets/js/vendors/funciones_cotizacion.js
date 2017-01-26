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
$('#agregar_dia').click(function(){
    var total=$('#nroItis').val();
    nro_iti=parseInt(total)+1;
    $('#nroItis').val(nro_iti);
    $('.lista_itinerario').append(''+
        '<div id="pl_'+nro_iti+'" class="portlet">'+
        '<div id="pl_h_'+nro_iti+'" class="portlet-header"  onmousedown="Pasar_datos(\''+nro_iti+'\',\''+nro_iti+'\',\''+nro_iti+'\')"><span class="cursor-move">DAY <span class="pos_iti" name="posdia[]" id="pos_dia_'+nro_iti+'">'+nro_iti+'</span>: <i id="titulo_'+nro_iti+'">TITULO</i></span></div>'+
    '<div class="portlet-content" onmouseenter="estado_edicion(1)" onmouseleave="estado_edicion(0)">'+
        '<div class="row">'+
        '<div class="col s12">'+
        '<span class="grey-text text-darken-3">'+
        '<input name="titulo_itinerario[]" id="titulo_itinerario_'+nro_iti+'" type="text" placeholder="Ingrese el titulo">'+
        '</span>'+
        '</div>'+
        '</div>'+
        '<textarea  name="desc_itinerario[]" id="desc_itinerario_'+nro_iti+'">'+
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
    $('#pl_'+nro_iti)
        .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
        .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span class='ui-icon ui-icon-plusthick portlet-toggle'></span>");

    $('#pl_h_'+nro_iti).on( "click", function() {
        var icon = $( this );
        icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
        icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();

    });

    });

var dia=0;
var titulo=0;
var id=0;
$('#borrar_itinerario').click(function(){
        if(true) {
            swal({   title: "Esta seguro?",
                    text: "Eliminar el registro 'DIA "+dia+" : "+titulo,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, Borrar ahora!",
                    cancelButtonText: "No, Cancelar por favor!",
                    closeOnConfirm: false,
                    closeOnCancel: false },
                function(isConfirm){
                    if (isConfirm) {
                        $('#Itine_'+id).remove();
                        swal("Borrado!", "Tu registro fue borrado :(", "success");   }
                    else {
                        swal("Cancelado", "Tu registro esta seguro :)", "error");   }
                });
        }
    }
);

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
