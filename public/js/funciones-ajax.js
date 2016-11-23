
$("#btnBuscar_pqt").click(function(event){
    var codigopx=$("#codigopx").val();
    // alert(codigopx);
    if(codigopx!=''){
        $.ajax({
            type:'get',
            url:'{{URL::to("buscarpaquete")}}',
            // headers:{'X-CSRF-TOKEN':token},
            data:{'codigo':codigopx},
            success: function(data){
                console.log(data);
                // $("#codigopx").empty().html(data);
            }
            // ,
            // error: function(data){
            //     $("#mensaje").html(
            //         '<div id="card-alert" class="card red lighten-5">'+
            //             '<div class="card-content red-text">'+
            //                 '<p>ERROR : '+data.responseJSON.name+'</p>'+
            //             '</div>'+
            //         '</div>');
            // }
        });
    }
    else{

        $("#codigopx").focus();
    }
});

