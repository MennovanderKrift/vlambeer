function random(min, max){
	return Math.floor(Math.random() * (max - min + 1)) + min;
}
document.getElementById("slogan").innerHTML = "Bringing back arcade since " + random(1725, 2014);

$(document).ready(function(){
		$(".header-profile-menu").hide();
	$(".profile-wrapper").click(function(){
    	$(".header-profile-menu").slideToggle(0);
  	});
  	
  	$(".profile-wrapper").mouseleave(function(){
    	$(".header-profile-menu").hide();
	});
});