$(document).ready(function() {
    // geting latest news
    loadVijesti(($(".category_name").text()).toLowerCase());
    
    
    // processing newsfeed
    $(".league_search").keyup(function(){
        console.log($(this).val());
        loadWordNews(($(".category_name").text()).toLowerCase(), $(this).val());
    });
    
});
// function for all category news
function loadVijesti(category){
     $.ajax({
          url: 'ajaxRequests/loadVijesti.php',
          type: 'POST',
          data: 'category='+category,
          success: function (data) {
              $(".category_news_container").html(data);
          }
      });
}

// function for all category news
function loadWordNews(category, word){
     if(word === ''){
        loadVijesti(($(".category_name").text()).toLowerCase()); 
     }else{
        $.ajax({
          url: 'ajaxRequests/loadCertainNews.php',
          type: 'POST',
          data: 'category='+category+'&word='+word,
          success: function (data) {
              $(".category_news_container").html(data);
          }
        });
     }
}


