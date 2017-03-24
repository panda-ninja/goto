
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
                $("#action_itinerario_"+pos).html('Datos enviados<i class="mdi-content-send right"></i>');
                $("#action_itinerario_"+pos).addClass('green');
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
}
