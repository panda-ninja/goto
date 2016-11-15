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
    full_width: true,
    height: 500,
    indicators: false,
    no_wrap: true
  });

  //carousel owl
  var owl = $("#owl-demo");

  owl.owlCarousel({
    items : 3
  });

  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })

  // $('.materialboxed').materialbox();

});


