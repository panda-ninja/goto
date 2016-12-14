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
    $('.lista_itinerario').append('<li id="Itine_'+nro_iti+'" onclick="Pasar_datos(\''+nro_iti+'\',\''+nro_iti+'\',\'Nuevo registro\')">'+
        '<div class="collapsible-header"> DAY '+nro_iti+': <span class="grey-text text-darken-3">Nuevo registro</span></div>'+
        '<div class="collapsible-body">'+
        '<div class="row">'+
        ' <div class="col s2"><input type="text" value="DAY" disabled></div>'+
        '<div class="col s2 ">'+
        '  <input name="dia_itinerario" id="dia_itinerario" type="text" value="">'+
        '  </div>'+
        '  <div class="col s8">'+
        '  <span class="grey-text text-darken-3">'+
        ' <input name="titulo_itinerario" id="titulo_itinerario" type="text" value="">'+
        '  </span>'+
        '</div>'+
        '  </div>'+
        '<textarea name="desc_itinerario" id="desc_itinerario_'+nro_iti+'" cols="30" rows="10">'+
        '</textarea>'+
        '  </div>'+
        ' </li>');
    // CKEDITOR.replace( 'desc_itinerario_'+nro_iti);
    // importarScript("//cdn.tinymce.com/4/tinymce.min.js");
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

function Pasar_datos(pid,pdia,ptitulo) {
    id = pid;
    dia = pdia;
    titulo = ptitulo;
    // var frame = document.getElementById('desc_itinerario_' + id + '_ifr');
    // if (frame.contentDocument){
    //     valor_head = frame.contentDocument.getElementsByTagName('head')[0];
    //     // valor_body= frame.contentDocument.getElementsByTagName('body')[0];
    // } else if (frame.contentWindow) {
    //     valor_head = frame.contentWindow.document.getElementsByTagName('head')[0];
    //     // valor_body= frame.contentWindow.document.getElementsByTagName('body')[0];
    // }
    // console.log('Cuando el raton para por encima: '+valor_head.innerHTML);


    var $frame = $('#desc_itinerario_' + id + '_ifr');
    setTimeout( function() {

        var doc = $frame[0].contentWindow.document;
        var $head = $('head',doc);
        valor_head=$head.html();
        var $body = $('body',doc);
        valor_body=$body.html();
    }, 1 );

    console.log('click head: '+valor_head);
    console.log('click body: '+valor_body);
}
var esta_en_edicion=0;
function poner_valor(){
    // console.log('Cuando se suelta el ratón: '+valor_head.innerHTML);
    // var frame = document.getElementById('desc_itinerario_'+id+'_ifr');
    // frame.contentDocument.getElementsByTagName('head')[0]='holaaaaaaaaaaaaaaaaa';
     if(esta_en_edicion==0) {
        var $frame = $('#desc_itinerario_' + id + '_ifr');
        setTimeout(function () {
            var doc = $frame[0].contentWindow.document;
            // doc.html="<!DOCTYPE html>";
            var $head = $('head',doc);
            $head.html(valor_head);
            var $body = $('body', doc);
            $body.html(valor_body);
            $body.attr('id','tinymce');
            $body.addClass('mce-content-body');
            $body.attr('data-id','desc_itinerario_'+id);
            $body.attr('contentEditable','true');
            // $head.html(valor_head);

        }, 1);
        console.log('soltar head: '+valor_head);
        console.log('soltar body: '+valor_body);
        // getScript('//cdn.tinymce.com/4/tinymce.min.js');
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
//# sourceMappingURL=funciones_cotizacion.js.map
