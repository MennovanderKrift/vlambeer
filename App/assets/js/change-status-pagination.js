jQuery(function($) {
    // consider adding an id to your table,
    // just incase a second table ever enters the picture..?
    var items = $("table tbody tr");

    var numItems = items.length;
    var perPage = 12;

    // only show the first 2 (or "first per_page") items initially
    items.slice(perPage).hide();

    // now setup your pagination
    // you need that .pagination-page div before/after your table
    $(".pagination-page").pagination({
        items: numItems,
        itemsOnPage: perPage,
        cssStyle: "light-theme",
        onPageClick: function(pageNumber) { // this is where the magic happens
            // someone changed page, lets hide/show trs appropriately
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;

            items.hide() // first hide everything, then show for the new page
                 .slice(showFrom, showTo).show();
        }
    });

    if(numItems < 11){
        $('.pagination-page').css('display','none');
    };
});