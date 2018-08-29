//---------------------------------------send data-------------------------------
$(document).ready(function(){

	$('#formsubmit').click(function(){
		$.post("navbar.php", 
      {
        title: $('#title').val(),
        description: $('#description').val()},
			function(data){
        data.preventDefault();
        $('#title').html(data);
        $('#description').html(data);
			}
		);		
  });
});

//--------------------------------------------------------------------------------


// -----------------------------sidebar---------------------------------------
$(document).ready(function(){
	$("#f").on("click", function(i){
		  i.preventDefault();
    if( $("#title").hasClass("active") ){
      $("#title").slideToggle();

      $(".sidebar-menu li").removeClass("active");
      $("#title").removeClass("active");
    }
    else{
      i.preventDefault();
      $("#title").addClass("active");
      $("#title").slideToggle();
      $(".sidebar-menu li").addClass("active");

        }
    });
});
// ------------------------------------------------------------------------------