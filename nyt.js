
$(function() {

  var apiurl = "http://api.nytimes.com/svc/search/v2/articlesearch.json?callback=svc_search_v2_articlesearch&q=the+life+of+pablo&api-key=a8fefbe82ab9b347f5c1e7c01f9e7c27:19:75089980";
  // var access_token = location.hash.split('=')[1];
  var html = ""

    $.ajax({
      type: "GET",
      dataType: "json",
      cache: false,
      url: apiurl,
      success: parseData
    });


    function parseData(json){
      console.log(json);

      $.each(json.response.docs,function(i,data){

        var date = new Date(data.pub_date);
        var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        var day = days[date.getDay()];
        var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        var month = months[date.getMonth()];
        var dayOfMonth = date.getDate();
        var year = date.getFullYear();

        html += '<br><div class="sections">' + data.section_name + '</div>';
        html += '<div class="headline"><a href="' + data.web_url + '" target="_blank">' + data.headline.main + '</a></div>';
        html += '<div class="date"><span class="byline">' + data.byline.original + '</span> // ' + month + ' ' + dayOfMonth + ', ' + year + '</div>'

        if (data.lead_paragraph == null) {
          }
          else {
            html += '<div class="story">' + data.lead_paragraph + '</div>'
          }
      });

      console.log(html);
      $("#nyt").append(html);

    }




 });

