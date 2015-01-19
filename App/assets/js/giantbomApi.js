$(document).ready(function() {

var apikey = "ab94894a7ed257fa89eceb0c6aa8d629cc16fc39";
var baseUrl = "http://www.giantbomb.com/api";

// construct the uri with our apikey


 // construct the uri with our apikey
var GamesSearchUrl = baseUrl + '/games/?api_key=' + apikey + '&format=jsonp';
var id = "";
var url = document.URL;

var path = document.location.pathname;
switch(path){
 case "/git/vlambeer/App/store/serious-sam.php":
    id = 65;
  break;
 case "/git/vlambeer/App/store/SuperCrateBox.php":      
    id = 32945;
  break;
  case "/git/vlambeer/App/store/gunGodz.php":
    id = 37491;
  break;
  case "/git/vlambeer/App/store/luftrausers.php":
    id = 39474;
  break;
}

	
   // send off the query
   $.ajax({
     url: GamesSearchUrl + '&filter=id:' + id + '&json_callback=?' ,
     dataType: 'JSONP',
     success: function (data) {
    console.log(data);
    console.log(id);
        $(".game-description").html(data.results[0].description);
    }
	})
});
// function giantbom (game,div){
// 	var GamesSearchUrl = baseUrl + '/games/?api_key=' + apikey + '&format=jsonp';
// 	var id = ;

// 	$(document).ready(function() {

// 	   // send off the query
// 	   $.ajax({
// 	     url: GamesSearchUrl + '&filter=id:' + id + '&json_callback=?' ,
// 	     dataType: 'JSONP',
// 	     success: function (data) {
// 	      console.log(data.results[1]);
// 	      $(div).html(data.results[1].description);
// 	   }
// 	 });
// 	});
// };


// var path = document.location.pathname;

// switch(path) {
// 	case "/git/vlambeer/App/store/serious-sam.php":
// 		giantbom('Serieus Sam', '.serious-sam-description');
// 		break;
// 	case: "/git/vlambeer/App/store/superCrateBox.php":
// 		giantbom('super crate box', '.ja')
// 		break;
// 	case: "/git/vlambeer/App/store/luftrausers.php"
// 		giantbom('luftrausers', '.ja');
// 		break;
// 	case: "/git/vlambeer/App/store/gunGodz.php"
// 		giantbom('Gun Godz', '.ja');
// 		break;

// }