var max_T;
var max_D;
var max_S;
var max_M;
function cambiarfecha(){
    var dat=$('#date_travel').val();
    $('#travellers_p').val(dat);
}

function ch_travelers(){
    // $('#idTravelers').val($('#travelers').val());
    // $('#idTravelers').html($('#travelers').val());
// alert('hola1');
    var nrotra=$('#travelers').val();
    var nroextr=$('#ch_extras_total').val();

    for(var e=1;e<=nroextr;e++){
        var precio_o=$('#precio_optional_activities_'+e).val();
        $('#extra_precioP_'+e).html(nrotra*precio_o);
        $('#extra_precioS_'+e).html(precio_o);
    }
    $('#travellers_p').val(nrotra);
    // $('#NroTra').html(nrotra);
    // alert(nrotra);
    if(nrotra>0){
        $('#travellers_1').addClass('hide');
        $('#travellers_2').addClass('hide');
        $('#travellers_3').addClass('hide');
        $('#travellers_4').addClass('hide');
        $('#travellers_5').addClass('hide');
        $('#travellers_6').addClass('hide');
        // alert('hola');
        $('#nro_ontriple_p').val(0);
        $('#nro_ondouble_p').val(0);
        $('#nro_onmatrimonial_p').val(0);
        $('#nro_onsimple_p').val(0);

        if(nrotra==1){
            $('#nro_travelers').html('<i class="fa fa-male fa-2x"></i>');
            $('#nroHabitacionesT').val('0');
            $('#nroHabitacionesT').attr("max",0);
            max_T=0;
            $('#nroHabitacionesD').val('0');
            $('#nroHabitacionesD').attr("max",0);
            max_D=0;
            $('#nroHabitacionesM').val('0');
            $('#nroHabitacionesM').attr("max",0);
            max_M=0;
            $('#nroHabitacionesS').val('1');
            $('#nroHabitacionesS').attr("max",1);
            max_S=1;
            $('#travellers_1').removeClass('hide');
            $('#nro_onsimple_p').val(1);
        }
        if(nrotra==2){
            $('#nro_travelers').html('<i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i>');
            $('#nroHabitacionesT').val('0');
            $('#nroHabitacionesT').attr("max",0);
            max_T=0;
            $('#nroHabitacionesD').val('1');
            $('#nroHabitacionesD').attr("max",1);
            max_D=1;
            $('#nroHabitacionesM').val('0');
            $('#nroHabitacionesM').attr("max",1);
            max_M=1;
            $('#nroHabitacionesS').val('0');
            $('#nroHabitacionesS').attr("max",2);
            max_S=2;
            $('#travellers_1').removeClass('hide');
            $('#travellers_2').removeClass('hide');
            $('#nro_ondouble_p').val(1);
        }
        if(nrotra==3){
            $('#nro_travelers').html('<i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i>');
            $('#nroHabitacionesT').val('1');
            $('#nroHabitacionesT').attr("max",1);
            max_T=1;
            $('#nroHabitacionesD').val('0');
            $('#nroHabitacionesD').attr("max",1);
            max_D=1;
            $('#nroHabitacionesM').val('0');
            $('#nroHabitacionesM').attr("max",1);
            max_M=1;
            $('#nroHabitacionesS').val('0');
            $('#nroHabitacionesS').attr("max",3);
            max_S=3;
            $('#travellers_1').removeClass('hide');
            $('#travellers_2').removeClass('hide');
            $('#travellers_3').removeClass('hide');
            $('#nro_ontriple_p').val(1);
        }
        if(nrotra==4){
            $('#nro_travelers').html('<i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i>');
            $('#nroHabitacionesT').val('0');
            $('#nroHabitacionesT').attr("max",1);
            $('#nroHabitacionesD').val('2');
            $('#nroHabitacionesD').attr("max",2);
            $('#nroHabitacionesM').val('0');
            $('#nroHabitacionesM').attr("max",2);
            $('#nroHabitacionesS').val('0');
            $('#nroHabitacionesS').attr("max",4);
            $('#travellers_1').removeClass('hide');
            $('#travellers_2').removeClass('hide');
            $('#travellers_3').removeClass('hide');
            $('#travellers_4').removeClass('hide');
            $('#nro_ondouble_p').val(2);
        }
        if(nrotra==5){
            $('#nro_travelers').html('<i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i>');
            $('#nroHabitacionesT').val('1');
            $('#nroHabitacionesT').attr("max",1);
            $('#nroHabitacionesD').val('1');
            $('#nroHabitacionesD').attr("max",2);
            $('#nroHabitacionesM').val('0');
            $('#nroHabitacionesM').attr("max",2);
            $('#nroHabitacionesS').val('0');
            $('#nroHabitacionesS').attr("max",5);
            $('#travellers_1').removeClass('hide');
            $('#travellers_2').removeClass('hide');
            $('#travellers_3').removeClass('hide');
            $('#travellers_4').removeClass('hide');
            $('#travellers_5').removeClass('hide');
            $('#nro_ontriple_p').val(1);
            $('#nro_ondouble_p').val(1);
        }
        if(nrotra==6){
            $('#nro_travelers').html('<i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i><i class="fa fa-male fa-2x"></i>');
            $('#nroHabitacionesT').val('0');
            $('#nroHabitacionesT').attr("max",2);
            $('#nroHabitacionesD').val('3');
            $('#nroHabitacionesD').attr("max",3);
            $('#nroHabitacionesM').val('0');
            $('#nroHabitacionesM').attr("max",3);
            $('#nroHabitacionesS').val('0');
            $('#nroHabitacionesS').attr("max",6);
            $('#travellers_1').removeClass('hide');
            $('#travellers_2').removeClass('hide');
            $('#travellers_3').removeClass('hide');
            $('#travellers_4').removeClass('hide');
            $('#travellers_5').removeClass('hide');
            $('#travellers_6').removeClass('hide');
            $('#nro_ondouble_p').val(3);
        }
        var nroT=0;
        var nroD=0;
        var nroM=0;
        var nroS=0;
        var roms=$('#nro_estrellas').val();//+nroT+nroD+nroS;
        $('#acomodacion_1').addClass('hide');
        $('#acomodacion_2').addClass('hide');
        $('#acomodacion_M').addClass('hide');
        $('#acomodacion_3').addClass('hide');
        //
        $('#aco_2_T').removeClass('precio-verde');
        $('#aco_2_D').removeClass('precio-verde');
        $('#aco_2_M').removeClass('precio-verde');
        $('#aco_2_S').removeClass('precio-verde');
        $('#aco_3_T').removeClass('precio-verde');
        $('#aco_3_D').removeClass('precio-verde');
        $('#aco_3_M').removeClass('precio-verde');
        $('#aco_3_S').removeClass('precio-verde');
        $('#aco_4_T').removeClass('precio-verde');
        $('#aco_4_D').removeClass('precio-verde');
        $('#aco_4_M').removeClass('precio-verde');
        $('#aco_4_S').removeClass('precio-verde');
        $('#aco_5_T').removeClass('precio-verde');
        $('#aco_5_D').removeClass('precio-verde');
        $('#aco_5_M').removeClass('precio-verde');
        $('#aco_5_S').removeClass('precio-verde');

        if($('#TipoPaquete').val()=='SinHotel'){
            $('#rooms_D').html(nroD);
            $('#acomodacion_2').removeClass('hide');
            $('#aco_'+roms+'_D').addClass('precio-verde');
            if(nrotra==1){
                $('#nro_person').html('<i class="fa fa-male"></i>');
            }
            if(nrotra==2){
                $('#nro_person').html('<i class="fa fa-male"></i><i class="fa fa-male"></i>');
            }
            if(nrotra==3){
                $('#nro_person').html('<i class="fa fa-male"></i><i class="fa fa-male"></i><i class="fa fa-male"></i>');
            }
            if(nrotra==4){
                $('#nro_person').html('<i class="fa fa-male"></i><i class="fa fa-male"></i><i class="fa fa-male"></i><i class="fa fa-male"></i>');
            }
            if(nrotra==5){
                $('#nro_person').html('<i class="fa fa-male"></i><i class="fa fa-male"></i><i class="fa fa-male"></i><i class="fa fa-male"></i><i class="fa fa-male"></i>');
            }
            if(nrotra==6){
                $('#nro_person').html('<i class="fa fa-male"></i><i class="fa fa-male"></i><i class="fa fa-male"></i><i class="fa fa-male"></i><i class="fa fa-male"></i><i class="fa fa-male"></i>');
            }
        }
        else{
            if($('#nroHabitacionesT').val()>0){
                nroT = $('#nroHabitacionesT').val();
                $('#rooms_T').html(nroT);
                $('#acomodacion_3').removeClass('hide');
                $('#aco_'+roms+'_T').addClass('precio-verde');
            }
            if($('#nroHabitacionesD').val()>0){
                nroD = $('#nroHabitacionesD').val();
                $('#rooms_D').html(nroD);
                $('#acomodacion_2').removeClass('hide');
                $('#aco_'+roms+'_D').addClass('precio-verde');
            }
            if($('#nroHabitacionesM').val()>0){
                nroM = $('#nroHabitacionesM').val();
                $('#rooms_M').html(nroM);
                $('#acomodacion_M').removeClass('hide');
                $('#aco_'+roms+'_M').addClass('precio-verde');
            }
            if($('#nroHabitacionesS').val()>0){
                nroS = $('#nroHabitacionesS').val();
                $('#rooms_S').html(nroS);
                $('#acomodacion_1').removeClass('hide');
                $('#aco_'+roms+'_S').addClass('precio-verde');
            }
        }
        $('#nro_ontriple_p').val(nroT);
        $('#nro_ondouble_p').val(nroD);
        $('#nro_onmatrimonial_p').val(nroM);
        $('#nro_onsimple_p').val(nroS);
        $('#rooms').html(roms);
        $('#nroHabitaciones').html(parseInt(nroT)+parseInt(nroM)+parseInt(nroD)+parseInt(nroS));
        $('#precioPaquete').val($('#precio_D').val());

        var ch_total=$('#ch_extras_total').val();
        for(var oe=1;oe<=ch_total;oe++){
            $('#p_'+oe).html($('#ch_extras_' + oe).val()*nrotra+' ($'+$('#ch_extras_' + oe).val());
            $('#v_extras_' + oe).html('$ '+parseInt($('#ch_extras_' + oe).val()*$('#travelers').val()));
        }
        ch_extra();
        recalcular_total();
    }
}

function acomodacion(nro_estrellas){
    $("#acomodacion"+nro_estrellas).prop("checked", true);
    $('#precio_T').val($('#aco_'+nro_estrellas+'_T').html().split('$')[1].trim());
    $('#precio_ontriple_p').val($('#aco_'+nro_estrellas+'_T').html().split('$')[1].trim());
    var a=$('#aco_'+nro_estrellas+'_D').html().split('$');
    if(a.length>1) {
        $('#precio_D').val(a[1].trim());
        $('#precio_ondouble_p').val(a[1].trim());

    }else {
        $('#precio_D').val($('#aco_' + nro_estrellas + '_D').html().split('$')[1].trim());
        $('#precio_ondouble_p').val($('#aco_' + nro_estrellas + '_D').html().split('$')[1].trim());
    }
    $('#precio_Ma').val($('#aco_'+nro_estrellas+'_M').html().split('$')[1].trim());
    $('#precio_onmatrimonial_p').val($('#aco_'+nro_estrellas+'_M').html().split('$')[1].trim());

    $('#precio_S').val($('#aco_'+nro_estrellas+'_S').html().split('$')[1].trim());
    $('#precio_ononsimple_p').val($('#aco_'+nro_estrellas+'_S').html().split('$')[1].trim());
    $('#nro_estrellas').val(nro_estrellas);
    var nroT=0;
    var nroD=0;
    var nroM=0;
    var nroS=0;
    var roms=$('#nro_estrellas').val();//+nroT+nroD+nroS;
    $('#acomodacion_1').addClass('hide');
    $('#acomodacion_2').addClass('hide');
    $('#acomodacion_M').addClass('hide');
    $('#acomodacion_3').addClass('hide');

    $('#aco_2_T').removeClass('precio-verde');
    $('#aco_2_D').removeClass('precio-verde');
    $('#aco_2_M').removeClass('precio-verde');
    $('#aco_2_S').removeClass('precio-verde');
    $('#aco_3_T').removeClass('precio-verde');
    $('#aco_3_D').removeClass('precio-verde');
    $('#aco_3_M').removeClass('precio-verde');
    $('#aco_3_S').removeClass('precio-verde');
    $('#aco_4_T').removeClass('precio-verde');
    $('#aco_4_D').removeClass('precio-verde');
    $('#aco_4_M').removeClass('precio-verde');
    $('#aco_4_S').removeClass('precio-verde');
    $('#aco_5_T').removeClass('precio-verde');
    $('#aco_5_D').removeClass('precio-verde');
    $('#aco_5_M').removeClass('precio-verde');
    $('#aco_5_S').removeClass('precio-verde');

    if($('#nroHabitacionesT').val()>0){
        nroT = $('#nroHabitacionesT').val();
        $('#acomodacion_3').removeClass('hide');
        $('#aco_'+roms+'_T').addClass('precio-verde');
    }
    if($('#nroHabitacionesD').val()>0){
        nroD = $('#nroHabitacionesD').val();
        $('#acomodacion_2').removeClass('hide');
        $('#aco_'+roms+'_D').addClass('precio-verde');
    }
    if($('#nroHabitacionesM').val()>0){
        nroD = $('#nroHabitacionesM').val();
        $('#acomodacion_M').removeClass('hide');
        $('#aco_'+roms+'_M').addClass('precio-verde');
    }
    if($('#nroHabitacionesS').val()>0){
        nroS = $('#nroHabitacionesS').val();
        $('#acomodacion_1').removeClass('hide');
        $('#aco_'+roms+'_S').addClass('precio-verde');
    }

    $('#rooms').html(roms);
    $('#nroHabitaciones').html(parseInt(nroT)+parseInt(nroD)+parseInt(nroM)+parseInt(nroS));
    $('#precioPaquete').val($('#precio_D').val());
    $('#precioPaquete').html($('#precio_D').val());
    $('#nro_ontriple_p').val(nroT);
    $('#nro_ondouble_p').val(nroD);
    $('#nro_onmatrimonial_p').val(nroM);
    $('#nro_onsimple_p').val(nroS);

    var ch_total=$('#ch_extras_total').val();
    subtotal_estras=0;
    for(var o=1;o<=ch_total;o++){
        if($('#ch_extras_' + o).prop('checked')){
            $('#v_extras_' + o).html(parseInt($('#ch_extras_' + o).val()*$('#travelers').val()));
            $('#visible_li_' + o).removeClass("hidden");
            subtotal_estras+=parseInt($('#ch_extras_' + o).val()*$('#travelers').val());
        }
        else{
            $('#v_extras_' + o).html(parseInt($('#ch_extras_' + o).val()*$('#travelers').val()));
            $('#visible_li_' +o).addClass("hidden");
        }
    }
    recalcular_total();
}
function distribucion(tipo){
    //$('#nro_camas_'+tipo).val($('#nroHabitaciones'+tipo).val());
    var nroT=0;
    var nroD=0;
    var nroM=0;
    var nroS=0;
    var roms=$('#nro_estrellas').val();//+nroT+nroD+nroS;
    $('#acomodacion_1').addClass('hide');
    $('#acomodacion_2').addClass('hide');
    $('#acomodacion_M').addClass('hide');
    $('#acomodacion_3').addClass('hide');

    $('#aco_2_T').removeClass('precio-verde');
    $('#aco_2_D').removeClass('precio-verde');
    $('#aco_2_M').removeClass('precio-verde');
    $('#aco_2_S').removeClass('precio-verde');
    $('#aco_3_T').removeClass('precio-verde');
    $('#aco_3_D').removeClass('precio-verde');
    $('#aco_3_M').removeClass('precio-verde');
    $('#aco_3_S').removeClass('precio-verde');
    $('#aco_4_T').removeClass('precio-verde');
    $('#aco_4_D').removeClass('precio-verde');
    $('#aco_4_M').removeClass('precio-verde');
    $('#aco_4_S').removeClass('precio-verde');
    $('#aco_5_T').removeClass('precio-verde');
    $('#aco_5_D').removeClass('precio-verde');
    $('#aco_5_M').removeClass('precio-verde');
    $('#aco_5_S').removeClass('precio-verde');
    var travelers=$('#travelers').val();

    if(travelers==2){
        if(tipo=='S'){
            if($('#nroHabitacionesS').val()==0){
                $('#nroHabitacionesD').val(1);
            }
            else{
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
            }
        }
        if(tipo=='D'){
            if($('#nroHabitacionesD').val()==0){
                $('#nroHabitacionesS').val(2);
                $('#nroHabitacionesM').val(0);
            }
            else{
                $('#nroHabitacionesS').val(0);
                $('#nroHabitacionesM').val(0);
            }
        }
        if(tipo=='M'){
            if($('#nroHabitacionesM').val()==0){
                $('#nroHabitacionesS').val(2);
                $('#nroHabitacionesD').val(0);
            }
            else{
                $('#nroHabitacionesS').val(0);
                $('#nroHabitacionesD').val(0);
            }
        }
    }
    if(travelers==3){
        if(tipo=='S'){
            if($('#nroHabitacionesS').val()==0){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
            }
            else if($('#nroHabitacionesS').val()==1){
                $('#nroHabitacionesD').val(1);
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesM').val(0);
            }
            else if($('#nroHabitacionesS').val()==2 || $('#nroHabitacionesS').val()==3){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(0);
            }
        }
        if(tipo=='D'){
            if($('#nroHabitacionesD').val()==0){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(0);
            }
            else if($('#nroHabitacionesD').val()==1){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(1);
            }
        }
        if(tipo=='M'){
            if($('#nroHabitacionesM').val()==0){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(0);
            }
            else if($('#nroHabitacionesM').val()==1){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(1);
            }
        }
        if(tipo=='T'){
            if($('#nroHabitacionesT').val()==0){
                $('#nroHabitacionesD').val(1);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(1);
            }
            else if($('#nroHabitacionesT').val()==1){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(0);
            }
        }
    }
    if(travelers==4){
        if(tipo=='S'){
            if($('#nroHabitacionesS').val()==0){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesD').val(2);
                $('#nroHabitacionesM').val(0);
            }
            else if($('#nroHabitacionesS').val()==1){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(1);
            }
            else if($('#nroHabitacionesS').val()==2){
                $('#nroHabitacionesD').val(1);
                $('#nroHabitacionesM').val(1);
                $('#nroHabitacionesT').val(0);
            }
            else if($('#nroHabitacionesS').val()==3 || $('#nroHabitacionesS').val()==4){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(0);
            }
        }
        if(tipo=='D'){
            if($('#nroHabitacionesD').val()==0){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(1);
            }
            else if($('#nroHabitacionesD').val()==1){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesM').val(1);
                $('#nroHabitacionesS').val(0);
            }
            else if($('#nroHabitacionesD').val()==2){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(0);
            }
        }
        if(tipo=='M'){
            if($('#nroHabitacionesM').val()==0){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(1);
            }
            else if($('#nroHabitacionesM').val()==1){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesD').val(1);
                $('#nroHabitacionesS').val(0);
            }
            else if($('#nroHabitacionesM').val()==2){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(0);
            }
        }
        if(tipo=='T'){
            if($('#nroHabitacionesT').val()==0){
                $('#nroHabitacionesD').val(2);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(0);
            }
            else if($('#nroHabitacionesT').val()==1){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(1);
            }
        }
    }
    if(travelers==5){
        if(tipo=='S'){
            if($('#nroHabitacionesS').val()==0){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesD').val(1);
                $('#nroHabitacionesM').val(0);
            }
            else if($('#nroHabitacionesS').val()==1){
                $('#nroHabitacionesD').val(2);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(0);
            }
            else if($('#nroHabitacionesS').val()==2){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(1);
            }
            else if($('#nroHabitacionesS').val()==3){
                $('#nroHabitacionesD').val(1);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(0);
            }
            else if($('#nroHabitacionesS').val()==4){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(0);
            }
            else if($('#nroHabitacionesS').val()==5){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(0);
            }
        }
        if(tipo=='D'){
            if($('#nroHabitacionesD').val()==0){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(2);
            }
            else if($('#nroHabitacionesD').val()==1){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(0);
            }
            else if($('#nroHabitacionesD').val()==2){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(1);
            }
        }
        if(tipo=='M'){
            if($('#nroHabitacionesM').val()==0){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(2);
            }
            else if($('#nroHabitacionesM').val()==1){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(0);
            }
            else if($('#nroHabitacionesM').val()==2){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(1);
            }
        }
        if(tipo=='T'){
            if($('#nroHabitacionesT').val()==0){
                $('#nroHabitacionesD').val(2);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(1);
            }
            else if($('#nroHabitacionesT').val()==1){
                $('#nroHabitacionesD').val(1);
                $('#nroHabitacionesM').val(1);
                $('#nroHabitacionesS').val(0);
            }
        }
    }
    if(travelers==6){
        if(tipo=='S'){
            if($('#nroHabitacionesS').val()==0){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesD').val(3);
            }
            else if($('#nroHabitacionesS').val()==1){
                $('#nroHabitacionesD').val(1);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(1);
            }
            else if($('#nroHabitacionesS').val()==2){
                $('#nroHabitacionesD').val(2);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(0);
            }
            else if($('#nroHabitacionesS').val()==3){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(1);
            }
            else if($('#nroHabitacionesS').val()==4){
                $('#nroHabitacionesD').val(1);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(0);
            }
            else if($('#nroHabitacionesS').val()==5 || $('#nroHabitacionesS').val()==6){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesT').val(0);
            }
        }
        if(tipo=='D'){
            if($('#nroHabitacionesD').val()==0){
                $('#nroHabitacionesT').val(2);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(0);
            }
            else if($('#nroHabitacionesD').val()==1){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(1);
            }
            else if($('#nroHabitacionesD').val()==2){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(2);
            }
            else if($('#nroHabitacionesD').val()==3){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(0);
            }
        }
        if(tipo=='M'){
            if($('#nroHabitacionesM').val()==0){
                $('#nroHabitacionesT').val(2);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(0);
            }
            else if($('#nroHabitacionesM').val()==1){
                $('#nroHabitacionesT').val(1);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(1);
            }
            else if($('#nroHabitacionesM').val()==2){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(2);
            }
            else if($('#nroHabitacionesM').val()==3){
                $('#nroHabitacionesT').val(0);
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesS').val(0);
            }
        }
        if(tipo=='T'){
            if($('#nroHabitacionesT').val()==0){
                $('#nroHabitacionesD').val(3);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(0);
            }
            else if($('#nroHabitacionesT').val()==1){
                $('#nroHabitacionesD').val(1);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(1);
            }
            else if($('#nroHabitacionesT').val()==2){
                $('#nroHabitacionesD').val(0);
                $('#nroHabitacionesM').val(0);
                $('#nroHabitacionesS').val(0);
            }
        }
    }
    $('#nro_ontriple_p').val(0);
    $('#nro_ondouble_p').val(0);
    $('#nro_onmatrimonial_p').val(0);
    $('#nro_onsimple_p').val(0);
    if($('#nroHabitacionesT').val()>0){
        nroT = $('#nroHabitacionesT').val();
        $('#rooms_T').html(nroT);
        $('#acomodacion_3').removeClass('hide');
        $('#aco_'+roms+'_T').addClass('precio-verde');

    }
    if($('#nroHabitacionesD').val()>0){
        nroD = $('#nroHabitacionesD').val();
        $('#rooms_D').html(nroD);
        $('#acomodacion_2').removeClass('hide');
        $('#aco_'+roms+'_D').addClass('precio-verde');

    }
    if($('#nroHabitacionesM').val()>0){
        nroM = $('#nroHabitacionesM').val();
        $('#rooms_M').html(nroM);
        $('#acomodacion_M').removeClass('hide');
        $('#aco_'+roms+'_M').addClass('precio-verde');

    }
    if($('#nroHabitacionesS').val()>0){
        nroS = $('#nroHabitacionesS').val();
        $('#rooms_S').html(nroS);
        $('#acomodacion_1').removeClass('hide');
        $('#aco_'+roms+'_S').addClass('precio-verde');

    }
    $('#nro_ontriple_p').val(nroT);
    $('#nro_ondouble_p').val(nroD);
    $('#nro_onmatrimonial_p').val(nroM);
    $('#nro_onsimple_p').val(nroS);

    $('#rooms').html(roms);
    $('#nroHabitaciones').html(parseInt(nroT)+parseInt(nroD)+parseInt(nroS)+parseInt(nroM));
    $('#precioPaquete').val($('#precio_D').val());
    recalcular_total();
}
function recalcular_total(){

    var precio_paquete=$('#precioPaquete').html();
    var nro_travelers=$('#travelers').val();
    var nro_estrellas=$('#nro_estrellas').val();
    var precio_T=$('#precio_T').val();
    var precio_D=$('#precio_D').val();
    var precio_Ma=$('#precio_Ma').val();
    var precio_S=$('#precio_S').val();
    var nro_camas_T=$('#nroHabitacionesT').val();
    var nro_camas_D=$('#nroHabitacionesD').val();
    var nro_camas_M=$('#nroHabitacionesM').val();
    var nro_camas_S=$('#nroHabitacionesS').val();
    $('#precio_3').html(precio_T);
    $('#precio_Ma2').html(precio_Ma);
    $('#precio_2').html(precio_D);
    $('#precio_1').html(precio_S);

    //alert('Precio paquete:'+precio_paquete+'\nnro travelers:'+nro_travelers+'\nnro estrellas:'+nro_estrellas+'\nprecio_T:'+precio_T+'\nprecio_D:'+precio_D+'\nprecio_S:'+precio_S+'\nnro_camas_T:'+nro_camas_T+'\nnro_camas_D:'+nro_camas_D+'\nnro_camas_S:'+nro_camas_S);
    var subtotal=/*(precio_paquete*nro_travelers)+*/(nro_camas_T*precio_T*3)+(nro_camas_M*precio_Ma*2)+(nro_camas_D*precio_D*2)+(nro_camas_S*precio_S);
    var total=subtotal+subtotal_estras;
    $('#subtotal').html(subtotal);
    $('#total').html(total);
    $('#total_p').val(total);
    $('#st_precio0').html(total);
    $('#st_precio1').html(total);
    $('#st_precio2').html(total);
    // alert('hola ');
    // console.log('recalculamos el total: '+total);

}

var subtotal_estras=0;
function ch_extra(posi){

    var ch_total=$('#ch_extras_total').val();
    subtotal_estras=0;
    for(var o=1;o<=ch_total;o++){
        if($('#ch_extras_' + o).prop('checked')){
            $('#v_extras_' + o).html('$ '+parseInt($('#ch_extras_' + o).val()*$('#travelers').val()));
            // $('#visible_li_' + o).removeClass("hidden");
            subtotal_estras+=parseInt($('#ch_extras_' + o).val()*$('#travelers').val());
            // console.log(subtotal_estras);
            $('#ch_extras_valor_' + o).val(1);
        }
        else{
            $('#v_extras_' + o).html(parseInt($('#ch_extras_' + o).val()*$('#travelers').val()));
            $('#ch_extras_valor_' + o).val(0);
            // $('#visible_li_' +o).addClass("hidden");
            // console.log(subtotal_estras);

        }
    }
    recalcular_total();
}
var url3='gotoperu.travel';
// var url3='';
// var url3='http://localhost/goto2/public';
$("#destino_travel").change(function(){
    // alert('hola');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    var codigopx=$("#destino_travel").val();
     if(codigopx.length>0){
        var datastring="codigo="+codigopx;
        $.post(url3+'/buscardisponibilidad', {codigo: codigopx}, function(markup) {
            if(markup){$('#dispo').html(markup);
               $.getScript(url3+'/js/init.js', function(){
                });
            }
            else{
              }
        }).fail(function (markup) {
            });
    }
    else{

        $("#destino_travel").focus();
    }
});

function date_travel_dispo() {
    var txt_data1 = $("#date_travel").val();
    var txt_data = txt_data1.split("_");
    // alert(txt_data1);
    var txt_date = txt_data[0];
    var txt_country = txt_data[1];
    var txt_dias = txt_data[2];
    var txt_precio = txt_data[3];
    // alert(codigopx);
    if (txt_date.length > 0) {
        var datos = {
            "txt_date": txt_date,
            "txt_country": txt_country,
            "txt_dias": txt_dias,
            "txt_precio": txt_precio
        };
        $.ajax({
            data: datos,
            url: url3+'/travel-packages/{'+txt_country+'}_{'+txt_dias+'}/checkout1',
            type: 'post'
        });
    }
    else {

        $("#date_travel").focus();
    }
};

var $form12=$('#form_buscar');
function pasar(){
    var dat=$('#date_travel').val().split('_');
    $('#txt_price').val(dat[0]);
    alert(dat[0]);

};

function country_p_ch(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    var codigopx=$("#country_p").val();
    // alert(codigopx);
    if(codigopx.length>0){
        var datastring="codigo="+codigopx;
        $.post(url3+'/buscarstate', {codigo: codigopx}, function(markup) {
            if(markup){
                $('#state_goto').html(markup);
                $.getScript(url3+"/js/init.js", function(){
                });
            }
            else{

            }
        }).fail(function (markup) {

        });
    }
    else{

        $("#country_p").focus();
    }
};
function state_p_ch(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });
    var codigopx=$("#state_p").val();
    // alert(codigopx);
    if(codigopx.length>0){
        var datastring="codigo="+codigopx;
        $.post(url3+'/buscarcity', {codigo: codigopx}, function(markup) {
            if(markup){
                $('#city_goto').html(markup);
                $.getScript(url3+"/js/init.js", function(){
                });
            }
            else{

            }
        }).fail(function (markup) {

        });
    }
    else{

        $("#state_p").focus();
    }
};
//# sourceMappingURL=funciones-checkout.js.map
