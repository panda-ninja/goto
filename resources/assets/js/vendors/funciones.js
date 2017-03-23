function editar_paquete(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });

    $.ajax({
        url: "/editar_paquete_cotizacion",
        type: "POST",
        data: new FormData('form_editar_pqt'),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
            var rpt=dada.split('_');
            if(rpt[0]==1) {
                $("#response").html(data[1]);
                $("#action").html('Datos enviados<i class="mdi-content-send right"></i>');
            }
            else{
                $("#response").html(data[1]);
            }
        }
    });

};