
$("#btnBuscar_pqt").click(function(event){
    var codigopx=$("#codigopx").val();
    if(codigopx!=''){
        $.ajax({
            type:'post',
            url:'{{route("pqt_listar_path",'+codigopx+')}}',
            headers:{'X-CSRF-TOKEN':token},
            success: function(data){
                $("#codigopx").empty().html(data);
            },
            error: function(data){
                $("#mensaje").html(
                    '<div id="card-alert" class="card red lighten-5">'+
                        '<div class="card-content red-text">'+
                            '<p>ERROR : '+data.responseJSON.name+'</p>'+
                        '</div>'+
                    '</div>');
            }
        });
    }
    else{

        $("#codigopx").focus();
    }
});

