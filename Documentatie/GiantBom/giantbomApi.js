var apikey = "ab94894a7ed257fa89eceb0c6aa8d629cc16fc39";
var baseUrl = "http://www.giantbomb.com/api";

// construct the uri with our apikey
var GamesSearchUrl = baseUrl + '/search/?api_key=' + apikey + '&format=jsonp';
var query = "COD";

$(document).ready(function() {

   // send off the query
   $.ajax({
     url: GamesSearchUrl + '&query=' + encodeURI(query) + '&json_callback=?' ,
     dataType: 'JSONP',
     success: function (data) {
      console.log(data.results[1]);
         $(".name").html(data.results[0].name);
   }
 });
});