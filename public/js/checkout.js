/**
 * Created by freddy on 4/11/2016.
 */
// $(document).ready(function() {
//     $('select').material_select();
//     $('#charge-error').addClass('hide');
// });
Stripe.setPublishableKey('pk_live_REwwDqPEJ4Jh4mI9u8htxZTk');

var $form=$('#checkout-form');
$form.submit(function(event){
    $form.find('button').prop('disabled',true);
    Stripe.card.createToken({
        name: $('#name-card').val(),
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        address_zip: $('#address_zip').val()
    }, stripeResponseHandler);

    return false;
});
function stripeResponseHandler(status,response){

    if(response.error){
        $('#charge-error').removeClass('hide');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled',false);
        //alert('error '+response.id+':'+response.error.message+':'+$('#card-type').val());
    }
    else{
        //alert('no error'+response.id);
        var token=response.id;
        $form.append($('<input type="hidden" name="stripeToken" id="stripeToken"/>').val(token));
        // console.log(token);
        //$('#pago').val('Proccesing ...');
        $form.get(0).submit();
    }
}
var $form1=$('#checkout-form1');
$form1.submit(function(event){
    $form1.find('button').prop('disabled',true);
    Stripe.card.createToken({
        name: $('#name_card_p').val(),
        number: $('#credit_card_number_p').val(),
        cvc: $('#card_verification_p').val(),
        exp_month: $('#expiration_date_month_p').val(),
        exp_year: $('#expiration_date_year_p').val(),
        address_zip: $('#zip_p').val()
    }, stripeResponseHandler1);

    return false;
});
function stripeResponseHandler1(status,response){

    if(response.error){
        $('#charge-error').removeClass('hide');
        $('#charge-error').text(response.error.message);
        $form1.find('button').prop('disabled',false);
        //alert('error '+response.id+':'+response.error.message+':'+$('#card-type').val());
    }
    else{
        //alert('no error'+response.id);
        var token=response.id;
        $form1.append($('<input type="hidden" name="stripeToken" id="stripeToken"/>').val(token));
        console.log(token);
        //$('#pago').val('Proccesing ...');
        $form1.get(0).submit();
    }
}

function mensaje9(){
    alert('hola papi');
}


//# sourceMappingURL=checkout.js.map
