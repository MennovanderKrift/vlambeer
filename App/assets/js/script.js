function random(min, max){
	return Math.floor(Math.random() * (max - min + 1)) + min;
}
document.getElementById("slogan").innerHTML = "Bringing back arcade since " + random(1725, 2014);

$(document).ready(function(){
  $(".header-profile img").click(function(){
    $(".header-profile-menu").slideToggle();
  });
});