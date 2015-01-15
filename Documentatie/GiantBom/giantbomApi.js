var apikey = "ab94894a7ed257fa89eceb0c6aa8d629cc16fc39";
var baseUrl = "http://www.giantbomb.com/api";

// construct the uri with our apikey
var GamesSearchUrl = baseUrl + '/search/?api_key=' + apikey + '&format=jsonp';
var query = "serieus sam";
var serieus_sam;

$(document).ready(function() {

   // send off the query
   $.ajax({
     url: GamesSearchUrl + '&query=' + encodeURI(query) + '&json_callback=?' ,
     dataType: 'JSONP',
     success: function (data) {
      console.log(data.results[1]);
      $(".deck").html(data.results[1].deck);
      $(".game-name").html(data.results[1].name);
      $(".overview").html(data.results[1].description);
      serieus_sam = [data.results[1].description];
     
   }
 });
});