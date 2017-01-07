/**
 * Created by freddy on 4/11/2016.
 */
$(document).ready(function() {
    $('select').material_select();
    $('#charge-error').addClass('hide');
});
Stripe.setPublishableKey('pk_test_dyIe8bpwdnHasxw7a27HhPoW');

var $form=$('#checkout-form');
$form.submit(function(event){
    console.log('holaaaa');
    alert('hola que pasa');
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
        console.log(token);
        //$('#pago').val('Proccesing ...');
        $form.get(0).submit();
    }
}

function mensaje9(){
    alert('hola papi!!!');
}
