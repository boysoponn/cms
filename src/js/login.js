$(document).ready(function(){
  $( document ).on( 'focus', ':input', function(){
      $( this ).attr( 'autocomplete', 'off' );
  });
});

$(function() {
    $('.form-group .form-control').focusout(function() {
      var $text_val = $(this).val();
      if ($text_val === "") {
        $(this).removeClass('active');
      } else {
        $(this).addClass('active');
      }
    });
  });


$(document).on('click','#register',function(event)
{   
        $('.material-form2').css({"display":"block"});
        $('.material-form1').css({"display":"none"});    
});
$(document).on('click','#login',function(event)
{   
        $('.material-form2').css({"display":"none"});
        $('.material-form1').css({"display":"block"});    
});