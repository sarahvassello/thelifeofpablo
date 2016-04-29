(function($) {
    $(document).ready(function() {
        getNewsData("thelifeofpablo");
    });
}) (jQuery);

$("#search-news").keyup(function(event) {
    if (event.which == 13) {
        var keyword = $("#search-news").val();
        getNewsData(keyword);
     }
});

function getNewsData(keyword) {
	var apiurl = "http://api.nytimes.com/svc/search/v2/articlesearch.json?callback=svc_search_v2_articlesearch&q=thelifeofpablo" + "&begin_date=20120101&sort=newest&hl=true&api-key=a8fefbe82ab9b347f5c1e7c01f9e7c27:19:75089980"
	var nyt = "";
    var html = "";
	var htmlMobile = "";

        $.ajax({
        	type: "GET",
        	dataType: "json",
        	cache: false,
        	url: apiurl,
        	success: parseData
        });

        function parseData(json){
            var i = 0;
            html = "";
            htmlMobile = "";

            htmlMobile += '<div class="swiper-container"><div class="row swiper-wrapper">';

            $.each(json.response.docs,function(i, theNode){
				var date = new Date(theNode.pub_date);
				var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
				var day = days[date.getDay()];
				var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
				var month = months[date.getMonth()];
				var dayOfMonth = date.getDate();
				var year = date.getFullYear();

				var multimediaArray = [];
				nodeMultimedia = theNode.multimedia;
				var imgURL = "http://www.nytimes.com/";
				var multimediaImg = nodeMultimedia[0];
				var multimediaURL;

				if (theNode.type_of_material != "Blog") {
                    html += '<div class="article-div">';
                    html += '<a href="' + theNode.web_url + '" target="_blank"> <div class="article-headline">' + theNode.headline.main + '</div></a>';
                    html += '<div class="article-padding">';
                    html += '<span class="article-byline">' + theNode.byline.original + '</span>';
                    html += '<span class="article-date">' + month + ' ' + dayOfMonth + ', ' + year + '</span>';
                    html += '</div>';
                    if (theNode.lead_paragraph != null) {
                        html += '<div class="article-intro">' + theNode.lead_paragraph + '</div>'
    				}
                    html += '</div>';

                    htmlMobile += '<div class="article-div swiper-slide">';
                    htmlMobile += '<a href="' + theNode.web_url + '" target="_blank"> <div class="article-headline">' + theNode.headline.main + '</div></a>';
                    htmlMobile += '<div class="article-padding">';
                    htmlMobile += '<span class="article-byline">' + theNode.byline.original + '</span>';
                    htmlMobile += '<span class="article-date">' + month + ' ' + dayOfMonth + ', ' + year + '</span>';
                    htmlMobile += '</div>';
                    if (theNode.lead_paragraph != null) {
                        htmlMobile += '<div class="article-intro">' + theNode.lead_paragraph + '</div>'
    				}
                    htmlMobile += '</div>';




				}
            });


            $("#nyt").text("");
            $("#nyt").append(html);
	  }
};