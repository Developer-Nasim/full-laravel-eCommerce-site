(function ($) {
    "use strict";
    if ($('body').hasClass('dark')) {
       $('head').append('<link rel="stylesheet" href="dist/vendors/summernote/plex/summernote-lite-plex.css" type="text/css" />');
    }
    if ($('body').hasClass('dark-alt')) {
      $('head').append('<link rel="stylesheet" href="dist/vendors/summernote/plex/summernote-lite-plex.css" type="text/css" />');
  }
   
    
    
  $('.summernote').summernote({
        height: 200
      });
$('.summernote-inline').summernote({
        height: 200,
        airMode:!0
      });


})(jQuery);
