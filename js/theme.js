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

      // Remove theme nav from non existant themes
      $themeNav.each(function() {
        var id = $(this).data('theme');
        if(!$themeItems.filter('#theme-' + id).length) {
          $(this).parent().next('li').remove();
          $(this).parent().remove();
        }
      });

      // Remove child themes if empty (after remove)
      if(!$themeGroup.find('.child-themes li').length) {
        $themeGroup.find('.child-themes').remove();
      }

      if(!$themeItems.length) {

        // Remove theme group without themes
        $themeGroup.parents('.theme-group').remove();

      } else if($themeItems.length > 1) {

        $themeItems.hide();
        $themeNav.addClass('clickable');
        $themeNav.on('click', function(e) {
          var arrowPos = $(this).offset().left + ($(this).width()/2);
          e.preventDefault();
          $themeNav.removeClass('active');
          $(this).addClass('active');
          var id = $(this).data('theme');
          $themeItems.hide();

          var $theme = $themeItems.filter('#theme-' + id);
          if($theme.length) {
            var $themeContainer = $theme.find('.theme-content');
            $theme.show();
            arrowPos = ((arrowPos-$themeContainer.offset().left) / $themeContainer.width()) * 100;
            $theme.find('.arrow').css({
              left: arrowPos + '%'
            });
          }

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
