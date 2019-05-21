(function ($, Drupal, drupalSettings) {
var executed = false;
Drupal.behaviors.LotusBehavior = {
  attach: function (context, settings) {
     if(!executed) {
      executed =true;
      // can access setting from 'drupalSettings';
      var api_url = drupalSettings.linkedin_feed.api.api_url;
      var api_key = drupalSettings.linkedin_feed.api.api_key;
      $.ajax({
        url: api_url + '/top-headlines?sources=techcrunch&apiKey=' + api_key,
        type: 'GET',
        success: function(res) {
            var struct = '<section data-quickedit-entity-id="section_entity/8" class="contextual-region section bg-light" id="portfolio"><div class="container"><div class="row justify-content-center mb-4"><div class="col-md-8 col-lg-7 text-center"><h2 class="lg-title mb-2">&nbsp; &nbsp; News Around The World</h2><p class="mb-5">&nbsp; &nbsp; Catch the latest news from the world with latest news API Integration</p></div></div><div id="blogsia" class="row justify-content-center"></div></div></section>';
            jQuery('.portfolio-custom').after(struct);
            jQuery.each(res.articles, function(skey, svalue) {
              var main = '<div class="contextual-region col-lg-4 col-md-6 col-sm-6 mb-5"><div class="portfolio-block"><img src="' + svalue["urlToImage"] + '" alt="portfolio"><div class="portfolio-content"><h4>' + svalue["title"] + '</h4></div><div class="overlay-content"><a href="' + svalue["url"] + '" target="_blank"><i class="fa fa-link"></i></a></div></div></div>';
              jQuery('#blogsia').append(main);
            });
        }
      });
    }
  }
};
})(jQuery, Drupal, drupalSettings);

