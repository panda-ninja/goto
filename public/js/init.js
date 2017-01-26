(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();

  }); // end of document ready
})(jQuery); // end of jQuery name space


$(document).ready(function(){
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});

$(document).ready(function(){
  $('.slider').slider({

    height: 500,
    indicators: false,

  });

  //carousel owl
  var owl = $("#owl-demo");

  owl.owlCarousel({
    items : 3
  });

    // var owl = $("#owl-demo2");
    //
    // owl.owlCarousel({
    //     items : 3
    // });

  // Custom Navigation Events
  $(".nexta").click(function(){
    owl.trigger('owl.next');
  })
  $(".preva").click(function(){
    owl.trigger('owl.prev');
  })

  // $('.materialboxed').materialbox();

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

  //SCROLLSPY
    $('.scrollspy').scrollSpy();
  //SELECT
  $('select').material_select();
});
