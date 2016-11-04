/**
 * Created by freddy on 4/11/2016.
 */
Stripe.setPublishableKey('pk_test_6pRNASCoBOKtIshFeQd4XMUh');

var $form=$('#checkout-form');
$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled',true);
    Stripe.card.createToken({
        name: $('#name-card').val(),
        type: $('#card-type').val(),
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
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled',false);
    }
    else{
        var token=response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        $form.get(0).submit();
    }
}
