 // tinymce.init({ selector:'textarea' });
$( function() {
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
} );

//
// $('#nestable').nestable();
// $(document).ready(function(){
//     // $('.collapsible').collapsible();
//     var acc = document.getElementsByClassName("accordion");
//     var i;
//     for (i = 0; i < acc.length; i++) {
//         acc[i].onclick = function(){
//             this.classList.toggle("active");
//             this.nextElementSibling.classList.toggle("show");
//         }
//     }
// });

// $('.collapsible').collapsible({
//         accordion: false, // A setting that changes the collapsible behavior to expandable instead of the default accordion style
//         onOpen: function(el) { alert('Open'); }, // Callback for Collapsible open
//         onClose: function(el) { alert('Closed'); } // Callback for Collapsible close
//     }
// );
$('.fixed-action-btn').openFAB();
$('.fixed-action-btn').closeFAB();
// activate Nestable for list 1


// $(function () {
//     var nestablecount = 4;
//     $('#appendnestable').click(function () {
//         $('ol.outer').append('<li class="dd-item" data-id="' + nestablecount + '"><div class="dd-handle">Item ' + nestablecount + '</div></li>');
//         nestablecount++;
//     });
// });
var nro_iti=0;


$('#agregar_dia').click(function(){
    var total=$('#nroItis').val();
    nro_iti=parseInt(total)+1;
    $('.lista_itinerario').append('' +
        '<div class="portlet">'+
        '<div class="portlet-header"  onmousedown="Pasar_datos(\''+nro_iti+'\',\''+nro_iti+'\',\'Dia nuevo\')"><span class="cursor-move">DAY <span class="pos_iti" name="posdia[]" id="pos_dia_'+nro_iti+'">'+nro_iti+'</span>: Dia nuevo </span></div>'+
    '<div class="portlet-content" onmouseenter="estado_edicion(1)" onmouseleave="estado_edicion(0)">'+
    '<div class="row">'+
    '<div class="col s12">'+
    '<span class="grey-text text-darken-3">'+
    '<input name="titulo_itinerario[]" id="titulo_itinerario" type="text">'+
    '</span>'+
    '</div>'+
    '</div>'+
    '<textarea  name="desc_itinerario[]" id="desc_itinerario_'+nro_iti+'"  >'+
    '</textarea>'+
    '</div>'+
    '</div>');
    $(function(){
        $('#desc_itinerario_'+nro_iti)
            .on('froalaEditor.initialized', function (e, editor) {
                $('#desc_itinerario_'+nro_iti).parents('form').on('submit', function () {

                })
            })
            .froalaEditor({iframe:false,enter: $.FroalaEditor.ENTER_P, placeholderText: null})
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

        // var doc = $frame[0].contentWindow.document;
        // var $head = $('head',doc);
        // valor_head=$head.html();
        // var $body = $('body',doc);
        // valor_body=$body.html();
        var doc = $frame;
        // var $html = $('html',doc);
        valor_html=doc.html();

    }, 1 );

    // console.log('click head: '+valor_head);
    // console.log('click body: '+valor_body);
    console.log('click html: '+valor_html);

}
var esta_en_edicion=0;
function poner_valor(){
    // console.log('Cuando se suelta el ratón: '+valor_head.innerHTML);
    // var frame = document.getElementById('desc_itinerario_'+id+'_ifr');
    // frame.contentDocument.getElementsByTagName('head')[0]='holaaaaaaaaaaaaaaaaa';
     if(esta_en_edicion==0) {
        var $frame = $('#desc_itinerario_' + id);
        setTimeout(function () {
            var doc = $frame;
            // doc.html="<!DOCTYPE html>";
            // var $head = $('head',doc);
            // $head.html(valor_head);
            // var $body = $('body', doc);
            // $body.html(valor_body);
            // var $html= $('html', doc);
            // doc.html(valor_html);

            // $body.attr('id','tinymce');
            // $body.addClass('mce-content-body');
            // $body.attr('data-id','desc_itinerario_'+id);
            // $body.attr('contentEditable','true');
            // $head.html(valor_head);

        }, 1);
        // console.log('soltar head: '+valor_head);
        // console.log('soltar body: '+valor_body);
         console.log('soltar body: '+valor_html);

         // getScript('//cdn.tinymce.com/4/tinymce.min.js');
         setTimeout(function () {
             ordenar_lista_dias();

         }, 1);
     }
    // document.write("<script type='text/javascript' src='//cdn.tinymce.com/4/tinymce.min.js'></script>");
    // importarScript("//cdn.tinymce.com/4/tinymce.min.js");
// <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

}

 function estado_edicion(valor){
     esta_en_edicion=valor;
     if(esta_en_edicion==1)
        console.log('Si esta en edicion');
     else if(esta_en_edicion==0)
         console.log('No esta en edicion');
 }

 function ordenar_lista_dias(){
     var nroiti=$('#nroItis').val();
     console.log('nro dias: '+nroiti);
     var pos=1;
     $(".pos_iti").each(function(){
         $(this).html(''+pos);
         pos=pos+1;
         console.log('se asigno: '+pos);
     });
 }

