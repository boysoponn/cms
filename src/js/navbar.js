//----------------------sidebar--------------------------------------

$(document).ready(function(){
	$("#hero").on("click", function(i){
		  i.preventDefault();
    if( $("#content_hero").hasClass("active") ){
      $("#content_hero").slideToggle();
      $(".sidebar-menu li").removeClass("active");
      $("#content_hero").removeClass("active");
    }
    else{
      i.preventDefault();
      $("#content_hero").addClass("active");
      $("#content_hero").slideToggle();
      $(".sidebar-menu li").addClass("active");
        }
    });
    
    	$("#hero2").on("click", function(i){
		  i.preventDefault();
    if( $("#content_hero").hasClass("active") ){
      $("#content_hero").slideToggle();
      $(".sidebar-menu li").removeClass("active");
      $("#content_hero").removeClass("active");
    }
    else{
      i.preventDefault();
      $("#content_hero").addClass("active");
      $("#content_hero").slideToggle();
      $(".sidebar-menu li").addClass("active");
        }
    });
});
// ------------------------------------------------------------------------------

//----------------------label input sidebar--------------------------------------

$(function() {
  $('.form-group-cms .form-cms').focusout(function() {
    var $text_val = $(this).val();
    if ($text_val === "") {
      $(this).removeClass('active');
    } else {
      $(this).addClass('active');
    }
  });
});

//--------------------------------------------------------------------------------
//-----------------------------------logout---------------------------------------


//-------------------------------------------------------------------------------

//---------------------------------------send data-------------------------------


$(document).ready(function(){
  $('#formsubmit').click(function(){ 
    
		$.post("navbar.php", 
      {
        title: $('#title').val(),
        description: $('#description').val()},
			function(data){
        data.preventDefault();
        doCallAjax();
        $('#title').html(data);
        $('#description').html(data);
       
        
			}
		);		
  });
});

//--------------------------------------------------------------------------------