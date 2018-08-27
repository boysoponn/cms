// -----------------------------sidebar---------------------------------------
$(document).ready(function(){
	$("#f").on("click", function(i){
		  i.preventDefault();
    if( $("#title").hasClass("active") ){
      $(".cms_form").slideUp();
      $(this).next().slideToggle();
      $(".cms_form").removeClass("active");
      $(".sideb+ar-menu li").addClass("active");
    }
    else{
      $("#title").remove("active")
      $("#title").slideToggle();
      $(".sidebar-menu li").removeClass("active");
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
        $('#title').html(data);
        $('#description').html(data);
			}
		);		
  });
});

//--------------------------------------------------------------------------------