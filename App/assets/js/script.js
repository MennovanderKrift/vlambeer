$(document).ready(function(){
		$(".header-profile-menu").hide();
	$(".profile-wrapper").click(function(){
    	$(".header-profile-menu").slideToggle(0);
  	});
  	
  	$(".profile-wrapper").mouseleave(function(){
    	$(".header-profile-menu").hide();
	});


	$('.admin-table-head').click(function () {
	    $(this).siblings('.admin-table-content').slideToggle();
	});
	$(".collapsed").click(function(){
	     $(this).parent(".captionbox").slideUp('slow');
	});
});