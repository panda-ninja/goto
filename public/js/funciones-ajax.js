$("#btnBuscar_pqt").click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    var codigopx=$("#codigopx").val();
    // alert(codigopx);
    var token='drmLwc3gMXKsyrhxzMJrr4dlC8rrvtcj9Fuv9vfU';
    if(codigopx.length>0){

        // $.post("/buscarpaquete",{codigo:codigopx}, function(data){
        //     console.log(data);
        //     $('#list_planes').html(data);
        //
        // });
        var datastring="codigo="+codigopx
        $.post('http://gotoperu.mo/buscarpaquete', {codigo: codigopx}, function(markup) {
            console.log(markup);
            $('#list_planes').html(markup);
        });

        // $.ajax({
        //     dataType:'json',
        //     type:'post',
        //     url:"http://gotoperu.mo/buscarpaquete",
        //     headers:{'X-CSRF-TOKEN': $('[id="_token"]').val()},
        //     data:{codigo:codigopx},
        //     success: function(data){
        //         alert(data);
        //         console.log(data);
        //             $('#list_planes').html(data);
        // //         // $("#codigopx").empty().html(data);
        //     }
        //     // ,
        //     // error: function(data){
        //     //     $("#mensaje").html(
        //     //         '<div id="card-alert" class="card red lighten-5">'+
        //     //             '<div class="card-content red-text">'+
        //     //                 '<p>ERROR : '+data.responseJSON.name+'</p>'+
        //     //             '</div>'+
        //     //         '</div>');
        //     // }
        // });
    }
    else{

        $("#codigopx").focus();
    }
});

