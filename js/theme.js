(function($) {
  /*
   * Theme and theme groups
   * Content navigation
   */
  $(document).ready(function() {
    $('.theme-group-item').each(function() {

      var $themeGroup = $(this);

      var $themeNav = $themeGroup.find('.theme-group-header h3');
      var $themeItems = $themeGroup.find('.theme-item');

      /*
       * Nav between theme group themes
       */
      if($themeItems.length > 1) {
        $themeItems.hide();
        $themeNav.addClass('clickable');
        $themeNav.on('click', function(e) {
          e.preventDefault();
          $themeNav.removeClass('active');
          $(this).addClass('active');
          var id = $(this).data('theme');
          $themeItems.hide();
          $themeItems.filter('#theme-' + id).show();
          window.dispatchEvent(new Event('resize'));
        });
        $themeNav.filter('.main').click();
      }

      /*
       * Nav inside theme item
       */
      $themeItems.each(function() {

        var $theme = $(this);

        var $termNav = $theme.find('.term-list li');
        var $treeNav = $theme.find('.tree-nav .tree-item');

        var $termItems = $theme.find('.term-item');

        /*
         * Nav between tax terms items
         */
        if($termNav.length && $termItems.length) {
          $termItems.hide();
          $termNav.addClass('clickable');
          $termNav.on('click', function(e) {
            e.preventDefault();
            $termNav.removeClass('active');
            $(this).addClass('active');
            var id = $(this).data('termid');
            $termItems.hide();
            $termItems.filter('[data-termid="' + id + '"]').show();
            window.dispatchEvent(new Event('resize'));
          });
          $termNav.filter(':first-child').click();
        }

        /*
         * Nav between table layout items
         */
        if($treeNav.length && $termItems.length) {
          var treeMap = {};
          $termItems.hide();
          $treeNav.find('a').on('click', function(e) {
            e.preventDefault();
            $(this).parent().find('a').removeClass('active');
            $(this).addClass('active');
            treeMap[$(this).parent().index()] = $(this).data('category');
            updateTreeItems();
          });
          $treeNav.each(function() {
            $(this).find('a:first-child').click();
          });
          function updateTreeItems() {
            $termItems.hide();
            var treeSize = Object.keys(treeMap).length;
            $termItems.each(function() {
              var cats = $(this).data('categories').split(',');
              var check = 0;
              for(var index in treeMap) {
                if(cats.indexOf(treeMap[index].toString()) !== -1)
                  check++;
              }
              if(check == treeSize)
                $(this).show();
              window.dispatchEvent(new Event('resize'));
            });
          }
        }

      });

    });
  });
})(jQuery);
