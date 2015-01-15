var apikey = "ab94894a7ed257fa89eceb0c6aa8d629cc16fc39";
var baseUrl = "http://www.giantbomb.com/api";

// construct the uri with our apikey

function giantbom (game,div){
	var GamesSearchUrl = baseUrl + '/search/?api_key=' + apikey + '&format=jsonp';
	var query = game;

	$(document).ready(function() {

	   // send off the query
	   $.ajax({
	     url: GamesSearchUrl + '&query=' + encodeURI(query) + '&json_callback=?' ,
	     dataType: 'JSONP',
	     success: function (data) {
	      console.log(data.results[1]);
	      $(div).html(data.results[1].description);
	   }
	 });
	});
};

giantbom('Serieus Sam', '.serious-sam-description');
giantbom('Gun Godz', '.ja')
