function random(min, max){
	return Math.floor(Math.random() * (max - min + 1)) + min;
}

document.getElementById("slogan").innerHTML = "bringing back arcard game since " + random(1725, 2014);