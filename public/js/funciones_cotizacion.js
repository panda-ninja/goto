$(document).ready(function(){
    $('.collapsible').collapsible();
});

$('.collapsible').collapsible({
        accordion: false, // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        onOpen: function(el) { alert('Open'); }, // Callback for Collapsible open
        onClose: function(el) { alert('Closed'); } // Callback for Collapsible close
    }
);
$('.fixed-action-btn').openFAB();
$('.fixed-action-btn').closeFAB();
// activate Nestable for list 1
$('#nestable').nestable()

$(function () {
    var nestablecount = 4;
    $('#appendnestable').click(function () {
        $('ol.outer').append('<li class="dd-item" data-id="' + nestablecount + '"><div class="dd-handle">Item ' + nestablecount + '</div></li>');
        nestablecount++;
    });
});
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
    CKEDITOR.replace( 'desc_itinerario_'+nro_iti);
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
function Pasar_datos(pid,pdia,ptitulo){
    id=pid;
    dia=pdia;
    titulo=ptitulo;
}
