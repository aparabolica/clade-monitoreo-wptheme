(function($) {
  $(document).ready(function() {

    $('.data-table').each(function() {

      var $container = $(this);
      var $files = $container.find('.button-container');
      var $table = $container.find('.table');

      /* Fix row heads offset for thead */
      var rowHeads = $table.find('tbody tr:nth-child(1) th').length;
      for(var i = 0; i < rowHeads; i++) {
        if($table.find('thead').length)
          $table.find('thead tr').prepend($('<th/>'));
      }
      /* --- */

      var mapCol = {};
      if($table.find('thead').length) {
        $table.find('thead th').each(function() {
          if($(this).data('category')) {
            mapCol[$(this).index()] = $(this).data('category');
          }
        });
      }

      $table.find('.data-button').each(function() {
        var $td = $(this);
        var cats = $td.data('category').split(',');
        $files.each(function() {
          var $file = $(this);
          var check = 0;
          cats.forEach(function(cat) {
            if(fileHasCat($file, cat)) {
              check++;
            }
          });
          if(check == cats.length) {
            $file.appendTo($td);
          }
        });
      });
    });

    function fileHasCat($file, cat) {
      cats = $($file).data('categories').split(',');
      if(cats.indexOf(cat.toString()) !== -1)
        return true;
      else
        return false;
    }
  });
})(jQuery);
