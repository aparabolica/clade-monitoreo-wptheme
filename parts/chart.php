<?php
// ** FIX ** Support custom chart color based on theme
global $data_query, $theme_title, $term;
if($data_query->have_posts()) :
  while($data_query->have_posts()) :
    $data_query->the_post();
    $csv = get_field('csv');
    ?>
    <div id="chart_<?php the_ID(); ?>"></div>
    <script type="text/javascript">
      (function($) {
        $.get('<?php echo $csv['url']; ?>', function(csv) {
          cladeChart({
            element: '#chart_<?php the_ID(); ?>',
            data: csv,
            title: '<?php echo $theme_title; ?>',
            subtitle: '<?php echo $term->name; ?>',
            plotline: <?php echo get_field('plot_line_number'); ?>,
            plotlineText: '<?php echo get_field('plot_line_text'); ?>'
          });
        });
      })(jQuery);
    </script>
    <?php
    wp_reset_postdata();
  endwhile;
endif;
// wp_reset_query();
?>
