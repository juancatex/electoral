$(document).ready(function() {
    md.checkFullPageBackgroundImage();
    setTimeout(function() { 
      $('.card').removeClass('card-hidden');
      $( "#papeleta" ).focus(); 
    }, 700);
  });