
// $(document).on('click','#topic',function(event)
// {   
//         $('.detail').css({"display":"block"});  
// });


$(document).ready(function(){

	$(".sidebar-menu > li.have-children a").on("click", function(i){
		  i.preventDefault();
    if( ! $(this).parent().hasClass("active") ){
      $(".cms_form").slideUp();
      $(this).next().slideToggle();
      $(".cms_form").removeClass("active");
      $(this).parent().addClass("active");
    }
    else{
      $(this).next().slideToggle();
      $(".sidebar-menu li").removeClass("active");
        }
    });
});

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