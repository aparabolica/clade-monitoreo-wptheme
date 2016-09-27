(function($) {

  // Highlighted titles
  $(document).ready(function() {
    var $titles = $('h1.h,h2.h,h3.h');
    $titles.each(function() {
      var $title = $(this);
      if($title.find('a').length)
        $title = $(this).find('a');
      var text = $title.text();
      var words = text.split(' ');
      $title.html(text.replace(words[0], '<span>' + words[0] + '</span>'));
    });
  });

})(jQuery);
